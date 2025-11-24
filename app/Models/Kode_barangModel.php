<?php

namespace App\Models;

use CodeIgniter\Model;

class Kode_barangModel extends Model
{
    protected $table      = 'kode_barang';
    protected $allowedFields = ['jenis', 'tempat'];
}
