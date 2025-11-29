<?php

namespace App\Controllers;

use App\Models\PembiayaanModel;
use App\Models\Bayar_pembiayaanModel;
use CodeIgniter\Controller;

class Pembiayaan extends Controller
{
    protected $pembiayaan;
    protected $bayar;

    public function __construct()
    {
        $this->pembiayaan = new PembiayaanModel();
        $this->bayar = new Bayar_pembiayaanModel();
    }

    public function index()
    {
        $dataPembiayaan = $this->pembiayaan->findAll();

        // Hitung saldo masuk per pembiayaan
        foreach ($dataPembiayaan as &$p) {
            $saldo = $this->bayar
                ->where('id_cust', $p['id'])
                ->selectSum('saldoMasuk')
                ->first();

            $saldoMasuk = $saldo['saldoMasuk'] ?? 0;

            $p['saldoMasuk'] = $saldoMasuk;
            $p['keuntungan'] = $p['hargaJual'] - $p['modalKeluar'];
            $p['kekurangan'] = $p['hargaJual'] - $saldoMasuk;
        }

        return view('pembiayaan/index', [
            'pembiayaan' => $dataPembiayaan
        ]);
    }

    public function create()
    {
        return view('pembiayaan/create');
    }

    public function store()
    {
        $this->pembiayaan->save([
            'customer' => $this->request->getPost('customer'),
            'modalKeluar' => $this->request->getPost('modalKeluar'),
            'hargaJual' => $this->request->getPost('hargaJual'),
            'tanggalAngsuran' => $this->request->getPost('tanggalAngsuran'),
            'jatuhTempo' => $this->request->getPost('jatuhTempo')
        ]);

        return redirect()->to('/pembiayaan');
    }

    public function edit($id)
    {
        return view('pembiayaan/edit', [
            'data' => $this->pembiayaan->find($id)
        ]);
    }

    public function update($id)
    {
        $this->pembiayaan->update($id, [
            'customer' => $this->request->getPost('customer'),
            'modalKeluar' => $this->request->getPost('modalKeluar'),
            'hargaJual' => $this->request->getPost('hargaJual'),
            'tanggalAngsuran' => $this->request->getPost('tanggalAngsuran'),
            'jatuhTempo' => $this->request->getPost('jatuhTempo')
        ]);

        return redirect()->to('/pembiayaan');
    }

    public function delete($id)
    {
        $this->pembiayaan->delete($id);
        return redirect()->to('/pembiayaan');
    }
}
