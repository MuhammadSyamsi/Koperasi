<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table            = 'invoices';
    protected $primaryKey       = 'id_invoice';
    protected $allowedFields    = [
        'nomor_invoice',
        'tanggal',
        'total_tagihan',
        'status',
        'keterangan'
    ];

    // Optional: auto return array atau object
    protected $returnType       = 'array';

    // Untuk pencarian invoice by nomor
    public function findByNomor($nomor)
    {
        return $this->where('nomor_invoice', $nomor)->first();
    }

    // Untuk mendapatkan invoice dengan item
    public function getInvoiceWithItems($id_invoice)
    {
        return $this->select('invoices.*, invoice_items.*')
            ->join('invoice_items', 'invoice_items.id_invoice = invoices.id_invoice')
            ->where('invoices.id_invoice', $id_invoice)
            ->findAll();
    }
}