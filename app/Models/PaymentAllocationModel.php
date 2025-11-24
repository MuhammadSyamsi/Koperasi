<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentAllocationModel extends Model
{
    protected $table      = 'payment_allocations';
    protected $primaryKey = 'id_alloc';
    protected $allowedFields = [
        'id_payment',
        'id_invoice',
        'jumlah_dialok'
    ];
    protected $returnType = 'array';

    public function getAllocationsByInvoice($id_invoice)
    {
        return $this->where('id_invoice', $id_invoice)->findAll();
    }
}