<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;
use App\Models\PaymentModel;
use App\Models\PaymentAllocationModel;
use CodeIgniter\Controller;

class InvoiceController extends Controller
{
    protected $invoiceModel;
    protected $itemModel;
    protected $paymentModel;
    protected $allocationModel;

    public function __construct()
    {
        $this->invoiceModel     = new InvoiceModel();
        $this->itemModel        = new InvoiceItemModel();
        $this->paymentModel     = new PaymentModel();
        $this->allocationModel  = new PaymentAllocationModel();
        helper(['url', 'form']);
    }

    /**
     * 📌 Halaman daftar invoice
     */
    public function index()
    {
        return view('invoice/index');
    }

    /**
     * 📌 API: Ambil semua invoice (dengan total bayar & status terbaru)
     */
    public function getData()
    {
        $invoices = $this->invoiceModel->findAll();
        foreach ($invoices as &$inv) {
            $inv['total_bayar'] = $this->allocationModel
                ->selectSum('jumlah_dialok')
                ->where('id_invoice', $inv['id_invoice'])
                ->first()['jumlah_dialok'] ?? 0;
        }
        return $this->response->setJSON($invoices);
    }

    /**
     * 📌 Form tambah invoice
     */
    public function create()
    {
        return view('invoice/create');
    }

    /**
     * 📌 Proses simpan invoice baru
     */
    public function store()
    {
        $data = $this->request->getJSON(true);

        $id_invoice = $this->invoiceModel->insert([
            'nomor_invoice' => $data['nomor_invoice'],
            'tanggal'       => $data['tanggal'],
            'total_tagihan' => $data['total_tagihan'],
            'status'        => 'UNPAID',
            'keterangan'    => $data['keterangan'] ?? null
        ], true);

        return $this->response->setJSON([
            'status' => 'success',
            'id_invoice' => $id_invoice
        ]);
    }

    /**
     * 📌 Tambah pembayaran + alokasi ke invoice
     */
    public function addPaymentWithAllocations()
    {
        $data = $this->request->getJSON(true);

        // 1. Simpan payment global
        $id_payment = $this->paymentModel->insert([
            'tanggal_bayar' => $data['tanggal_bayar'],
            'metode'        => $data['metode'],
            'jumlah_bayar'  => $data['jumlah_bayar'],
            'keterangan'    => $data['keterangan'] ?? null
        ], true);

        // 2. Simpan allocations
        foreach ($data['allocations'] as $alloc) {
            $this->allocationModel->insert([
                'id_payment'   => $id_payment,
                'id_invoice'   => $alloc['id_invoice'],
                'jumlah_dialok'=> $alloc['jumlah_dialok']
            ]);

            // 3. Update status invoice
            $this->updateInvoiceStatus($alloc['id_invoice']);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    /**
     * 📌 Update status invoice berdasarkan alokasi
     */
    protected function updateInvoiceStatus($id_invoice)
    {
        $invoice = $this->invoiceModel->find($id_invoice);

        $totalAlloc = $this->allocationModel
            ->selectSum('jumlah_dialok')
            ->where('id_invoice', $id_invoice)
            ->first()['jumlah_dialok'] ?? 0;

        $status = 'UNPAID';
        if ($totalAlloc == 0) {
            $status = 'UNPAID';
        } elseif ($totalAlloc < $invoice['total_tagihan']) {
            $status = 'PARTIAL';
        } elseif ($totalAlloc >= $invoice['total_tagihan']) {
            $status = 'PAID';
        }

        $this->invoiceModel->update($id_invoice, ['status' => $status]);
    }

    /**
     * 📌 Lihat detail invoice
     */
    public function view($id_invoice)
    {
        $invoiceModel = new \App\Models\InvoiceModel();
$itemModel = new \App\Models\InvoiceItemModel();
$paymentModel = new \App\Models\PaymentModel();
$allocModel = new \App\Models\PaymentAllocationModel();

$invoice = $invoiceModel->find($id_invoice);
$items   = $itemModel->getItemsByInvoice($id_invoice);
$payments = $paymentModel->getPaymentsByInvoice($id_invoice);
$totalBayar = $paymentModel->getTotalBayar($id_invoice);

//        $invoice   = $this->invoiceModel->find($id_invoice);
//        $items     = $this->itemModel->getItemsByInvoice($id_invoice);

        // Ambil total teralokasi
        $totalBayar = $this->allocationModel
            ->selectSum('jumlah_dialok')
            ->where('id_invoice', $id_invoice)
            ->first()['jumlah_dialok'] ?? 0;

        $payments = $this->allocationModel
            ->select('payment_allocations.*, payments.tanggal_bayar, payments.metode')
            ->join('payments', 'payments.id_payment = payment_allocations.id_payment')
            ->where('payment_allocations.id_invoice', $id_invoice)
            ->findAll();

return view('invoice/view', compact('invoice','items','payments','totalBayar'));
    }
}
