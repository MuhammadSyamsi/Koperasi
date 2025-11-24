<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;
use App\Models\PaymentModel;
use App\Models\PaymentAllocationModel;

class Invoice extends BaseController
{
    protected $invoiceModel;
    protected $itemModel;
    protected $paymentModel;
    protected $allocationModel;

    public function __construct()
    {
        $this->invoiceModel = new InvoiceModel();
        $this->itemModel    = new InvoiceItemModel();
        $this->paymentModel     = new PaymentModel();
        $this->allocModel  = new PaymentAllocationModel();
    }

    // Form tambah item
    public function addItem($id_invoice)
    {
        $invoice = $this->invoiceModel->find($id_invoice);

        if (!$invoice) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Invoice tidak ditemukan");
        }

        return view('invoice/add_item', [
            'invoice' => $invoice
        ]);
    }

    // Simpan item
    public function saveItem()
    {
        $id_invoice  = $this->request->getPost('id_invoice');
        $nama_barang = $this->request->getPost('nama_barang');
        $jumlah      = (int)$this->request->getPost('jumlah');
        $harga       = (int)$this->request->getPost('harga');
        $subtotal    = $jumlah * $harga;

        $this->itemModel->insert([
            'id_invoice'  => $id_invoice,
            'nama_barang' => $nama_barang,
            'jumlah'      => $jumlah,
            'harga'       => $harga,
            'subtotal'    => $subtotal,
        ]);

        // update total tagihan invoice
        $items = $this->itemModel->getItemsByInvoice($id_invoice);
        $total = array_sum(array_column($items, 'subtotal'));

        $this->invoiceModel->update($id_invoice, [
            'total_tagihan' => $total
        ]);

        return redirect()->to(base_url('invoice/view/'.$id_invoice))
                         ->with('success', 'Item berhasil ditambahkan');
    }
    
    public function edit($id_invoice)
{
    $invoice = $this->invoiceModel->find($id_invoice);

    if (!$invoice) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Invoice tidak ditemukan");
    }

    return view('invoice/edit', [
        'invoice' => $invoice
    ]);
}

public function update($id_invoice)
{
    $data = $this->request->getPost();

    $this->invoiceModel->update($id_invoice, [
        'nomor_invoice' => $data['nomor_invoice'],
        'tanggal'       => $data['tanggal'],
        'keterangan'    => $data['keterangan'],
        'status'        => $data['status']
    ]);

    return redirect()->to(base_url('invoice/view/'.$id_invoice))
                     ->with('success', 'Invoice berhasil diperbarui');
}

    public function addPayment($id_invoice)
    {
        $invoice = $this->invoiceModel->find($id_invoice);

        if (!$invoice) {
            return redirect()->back()->with('error', 'Invoice tidak ditemukan');
        }

        return view('invoice/add_payment', [
            'invoice' => $invoice
        ]);
    }

    public function savePayment($id_invoice)
    {
        $invoice = $this->invoiceModel->find($id_invoice);

        if (!$invoice) {
            return redirect()->back()->with('error', 'Invoice tidak ditemukan');
        }

        // Insert payment utama
        $id_payment = $this->paymentModel->insert([
            'tanggal_bayar' => $this->request->getPost('tanggal_bayar'),
            'metode'        => $this->request->getPost('metode'),
            'jumlah_bayar'  => $this->request->getPost('jumlah'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ], true);

        // Alokasi pembayaran ke invoice
        $this->allocModel->insert([
            'id_payment'    => $id_payment,
            'id_invoice'    => $id_invoice,
            'jumlah_dialok' => $this->request->getPost('jumlah')
        ]);

        return redirect()->to(base_url('invoice/view/'.$id_invoice))
                         ->with('success', 'Pembayaran berhasil ditambahkan');
    }

}