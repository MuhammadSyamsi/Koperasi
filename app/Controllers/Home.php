<?php

namespace App\Controllers;

use App\Models\KeuanganModel;
use App\Models\BarangModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->keuanganModel = new KeuanganModel();
    }
    
  public function index(): string
  {
    $keuangan = new KeuanganModel();
    $data = ['data' => $keuangan->findAll()];
    return view('pages/home', $data);
  }

    public function info()
    {
        $request = service('request');

        $dari = $request->getGet('dari');
        $sampai = $request->getGet('sampai');
        $unit = $request->getGet('unit');

        $builder = $this->keuanganModel->orderBy('tanggal', 'DESC');

        if ($dari && $sampai) {
            $builder->where("tanggal >=", $dari)->where("tanggal <=", $sampai);
        } elseif ($dari) {
            $builder->where("tanggal >=", $dari);
        } elseif ($sampai) {
            $builder->where("tanggal <=", $sampai);
        }

        if ($unit) {
            $builder->where('unit', $unit);
        }

        $data = $builder->findAll(50); // batas tampilkan 50 data terbaru

        $shu_kantin = $this->keuanganModel->labaKantin() - $this->keuanganModel->rugiKantin();
        $shu_laundry = $this->keuanganModel->labaLaundry() - $this->keuanganModel->rugiLaundry();
        $shu_pembiayaan = $this->keuanganModel->labaPembiayaan() - $this->keuanganModel->rugiPembiayaan();
        $keuntungan = $shu_kantin + $shu_laundry + $shu_pembiayaan;

        return view('pages/info', [
            'data' => $data,
            'shu_kantin' => $shu_kantin,
            'shu_laundry' => $shu_laundry,
            'shu_pembiayaan' => $shu_pembiayaan,
            'keuntungan' => $keuntungan,
        ]);
    }

  public function simpan()
  {
    $keuangan = new KeuanganModel();
    $foto = $this->request->getFile('bukti');
    // $namaFoto = $foto->getRandomName();
    // $foto->move('images');

    $keuangan->insert([
      'id' => $this->request->getPost('id'),
      'catatan' => $this->request->getPost('catatan'),
      'keterangan' => $this->request->getPost('keterangan'),
      'nominal' => $this->request->getPost('nominal'),
      'unit' => $this->request->getPost('unit'),
      'tanggal' => $this->request->getPost('tanggal'),
    //   'bukti' => $namaFoto
    ]);
    return redirect()->to(base_url('/info'));
  }

  public function barang()
  {
    $barang = new BarangModel();

    $data = [
      'data' => $barang->orderBy('jenis', 'desc')->findAll(),
    ];
    return view('pages/barang', $data);
  }

  public function kulak()
  {
    $barang = new BarangModel();

    $barang->save([
      'id' => $this->request->getPost('id'),
      'stok' => $this->request->getPost('stok'),
    ]);

    return redirect()->to(base_url('/barang'));
  }

  public function listkulak()
  {
    $barang = new BarangModel();
    $data = [
      'data' => $barang->where('stok', 'req')->orderBy('jenis', 'asc')->findAll()
    ];

    return view('pages/kulak', $data);
  }
  
      public function update()
    {
        $id = $this->request->getPost('id');
        $this->keuanganModel->update($id, [
            'catatan' => $this->request->getPost('catatan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'nominal' => $this->request->getPost('nominal'),
            'unit' => $this->request->getPost('unit'),
            'tanggal' => $this->request->getPost('tanggal'),
            'bukti' => $this->request->getPost('bukti'),
        ]);
        return redirect()->to('/info')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->keuanganModel->delete($id);
        return redirect()->to('/info')->with('success', 'Data berhasil dihapus.');
    }
}
