<?php

namespace App\Models;

use CodeIgniter\Model;

class SakuImportModel extends Model
{
    protected $table            = 'saku_import';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['total_saldo', 'tanggal'];

    // Optional: auto set timestamps jika perlu
    protected $useTimestamps    = false;

    /**
     * Ambil saldo terakhir (record terbaru)
     */
    public function getLatest()
    {
        return $this->orderBy('tanggal', 'DESC')->first();
    }
}