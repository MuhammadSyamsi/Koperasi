<?php
namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\BarangModel;
use App\Models\InvoiceModel;
use App\Models\KeuanganModel;
use App\Models\SakuImportModel;
use App\Models\PaymentModel;

class Laporan extends BaseController
{
    protected $asetModel;
    protected $barangModel;
    protected $invoiceModel;
    protected $keuanganModel;
    protected $sakuImportModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->asetModel      = new AsetModel();
        $this->barangModel    = new BarangModel();
        $this->invoiceModel   = new InvoiceModel();
        $this->keuanganModel  = new KeuanganModel();
        $this->sakuImportModel= new SakuImportModel();
        $this->paymentModel   = new PaymentModel();
    }

    public function index()
    {
        // Aset
        $totalAset = $this->asetModel->selectSum('nilai')->first()['nilai'] ?? 0;

        // Barang
        $totalBarang = $this->barangModel->countAllResults();

        // Invoice
        $totalInvoice = $this->invoiceModel->countAllResults();
        $tagihan      = $this->invoiceModel->selectSum('total_tagihan')->first()['total_tagihan'] ?? 0;

        // Pembayaran invoice (total sudah dibayar)
        $dibayar = 0;
        $allInvoice = $this->invoiceModel->findAll();
        foreach ($allInvoice as $inv) {
            $dibayar += $this->paymentModel->getTotalBayar($inv['id_invoice']);
        }

        // Keuangan (laba rugi koperasi)
        $labaKantin     = $this->keuanganModel->labaKantin() - $this->keuanganModel->rugiKantin();
        $labaLaundry    = $this->keuanganModel->labaLaundry() - $this->keuanganModel->rugiLaundry();
        $labaPembiayaan = $this->keuanganModel->labaPembiayaan() - $this->keuanganModel->rugiPembiayaan();
        $omset          = $this->keuanganModel->omset();
        $biaya          = $this->keuanganModel->biaya();

        // Saku Import (saldo terakhir)
        $saku = $this->sakuImportModel->getLatest();

        $data = [
            'totalAset'       => $totalAset,
            'totalBarang'     => $totalBarang,
            'totalInvoice'    => $totalInvoice,
            'tagihan'         => $tagihan,
            'dibayar'         => $dibayar,
            'sisaTagihan'     => $tagihan - $dibayar,
            'labaKantin'      => $labaKantin,
            'labaLaundry'     => $labaLaundry,
            'labaPembiayaan'  => $labaPembiayaan,
            'omset'           => $omset,
            'biaya'           => $biaya,
            'saku'            => $saku,
        ];

        return view('laporan/index', $data);
    }
    
    public function createAset()
    {
        return view('aset/create');
    }
    
    public function storeAset()
    {
        $data = [
            'nama_aset' => $this->request->getPost('nama_aset'),
            'nilai'     => $this->request->getPost('nilai'),
        ];
        $this->asetModel->insert($data);
        return redirect()->to('/laporan')->with('success', 'Aset berhasil ditambahkan');
    }
    
    public function createBarang()
    {
        return view('barang/create');
    }
    
    public function storeBarang()
    {
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok'        => $this->request->getPost('stok'),
        ];
        $this->barangModel->insert($data);
        return redirect()->to('/laporan')->with('success', 'Barang berhasil ditambahkan');
    }
    
    public function createSaku()
    {
        return view('saku/create');
    }
    
    public function storeSaku()
    {
        $data = [
            'tanggal'     => $this->request->getPost('tanggal'),
            'total_saldo' => $this->request->getPost('total_saldo'),
        ];
        $this->sakuImportModel->insert($data);
        return redirect()->to('/laporan')->with('success', 'Saldo Saku berhasil ditambahkan');
    }
    
    public function createKeuangan()
    {
        return view('keuangan/create');
    }
    
    public function storeKeuangan()
    {
        ['id', 'catatan', 'keterangan', 'unit', 'tanggal', 'bukti', 'nominal'];
        $data = [
            'unit'   => $this->request->getPost('unit'),
            'catatan'   => $this->request->getPost('catatan'),
            'nominal' => preg_replace('/[^0-9]/', '', $this->request->getPost('jumlah')),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];
        $this->keuanganModel->insert($data);
        return redirect()->to('/laporan')->with('success', 'Transaksi Keuangan berhasil ditambahkan');
    }
    
    public function createMultipleKeuangan()
    {
        return view('keuangan/create_multiple');
    }
    
    public function storeMultipleKeuangan()
    {
        $units       = $this->request->getPost('unit');
        $catatans    = $this->request->getPost('catatan');
        $tanggal     = $this->request->getPost('tanggal');
        $jumlahs     = $this->request->getPost('jumlah');
        $keterangans = $this->request->getPost('keterangan');
    
        if ($units && is_array($units)) {
            foreach ($units as $i => $unit) {
                $data = [
                    'unit'       => $unit,
                    'catatan'    => $catatans[$i],
                    'nominal'    => preg_replace('/[^0-9]/', '', $jumlahs[$i]), // bersihkan format ribuan
                    'keterangan' => $keterangans[$i],
                    'tanggal'    => $tanggal[$i],
                ];
                $this->keuanganModel->insert($data);
            }
        }
    
        return redirect()->to('/laporan')->with('success', 'Multiple Transaksi Keuangan berhasil ditambahkan');
    }


}