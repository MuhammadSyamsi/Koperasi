<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table      = 'aset';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'jenis', 'jumlah', 'nilai'];

    public function search($keyword)
    {
        return $this->table('aset')->like('nama', $keyword);
    }
}
