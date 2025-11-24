<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'jenis', 'stok', 'harga_kulak', 'harga_jual', 'gambar', 'keterangan'];

    public function search($keyword)
    {
        return $this->table('barang')->like('nama', $keyword);
    }
}
