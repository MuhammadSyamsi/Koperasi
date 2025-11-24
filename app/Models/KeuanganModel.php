<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table      = 'keuangan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'catatan', 'keterangan', 'unit', 'tanggal', 'bukti', 'nominal'];

    public function labaKantin()
    {
        return $this->where('unit', 'kantin')->where('catatan', 'pemasukan')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function labaLaundry()
    {
        return $this->where('unit', 'laundry')->where('catatan', 'pemasukan')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function labaPembiayaan()
    {
        return $this->where('unit', 'pembiayaan')->where('catatan', 'pemasukan')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function rugiKantin()
    {
        return $this->where('unit', 'kantin')->where('catatan', 'pengeluaran')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function rugiLaundry()
    {
        return $this->where('unit', 'laundry')->where('catatan', 'pengeluaran')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function rugiPembiayaan()
    {
        return $this->where('unit', 'pembiayaan')->where('catatan', 'pengeluaran')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function omset()
    {
        return $this->where('catatan', 'pemasukan')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function biaya()
    {
        return $this->where('catatan', 'pengeluaran')->selectSum('nominal')->first()['nominal'] ?? 0;
    }
    public function getFilteredData($dari = null, $sampai = null, $unit = null)
{
    $builder = $this->orderBy('tanggal', 'DESC');

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

    return $builder->findAll();
}
}
