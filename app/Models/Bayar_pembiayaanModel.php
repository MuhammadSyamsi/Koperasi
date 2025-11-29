<?php

namespace App\Models;

use CodeIgniter\Model;

class Bayar_pembiayaanModel extends Model
{
    protected $table      = 'bayar_pembiayaan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'id_cust', 'saldoMasuk', 'tanggal', 'keterangan'];
}
