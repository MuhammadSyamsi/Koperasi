<?php

namespace App\Models;

use CodeIgniter\Model;

class PembiayaanModel extends Model
{
    protected $table      = 'pembiayaan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'customer', 'modalKeluar', 'hargaJual', 'tanggalAngsuran', 'jatuhTempo'];
}
