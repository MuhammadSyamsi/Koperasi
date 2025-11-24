<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceItemModel extends Model
{
    protected $table            = 'invoice_items';
    protected $primaryKey       = 'id_item';
    protected $allowedFields    = [
        'id_invoice',
        'nama_barang',
        'jumlah',
        'harga',
        'subtotal'
    ];
    protected $returnType       = 'array';

    // Ambil semua item berdasarkan invoice
    public function getItemsByInvoice($id_invoice)
    {
        return $this->where('id_invoice', $id_invoice)->findAll();
    }
}