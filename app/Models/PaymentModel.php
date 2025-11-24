<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table      = 'payments';
    protected $primaryKey = 'id_payment';
    protected $allowedFields = [
        'tanggal_bayar',
        'metode',
        'jumlah_bayar',
        'keterangan'
    ];
    protected $returnType = 'array';

    // Ambil semua allocations by invoice (join ke payment_allocations)
    public function getPaymentsByInvoice($id_invoice)
    {
        return $this->db->table('payment_allocations pa')
            ->select('p.id_payment, p.tanggal_bayar, p.metode, pa.jumlah_dialok')
            ->join('payments p', 'p.id_payment = pa.id_payment')
            ->where('pa.id_invoice', $id_invoice)
            ->get()
            ->getResultArray();
    }

    // Total bayar per invoice
    public function getTotalBayar($id_invoice)
    {
        return $this->db->table('payment_allocations')
            ->selectSum('jumlah_dialok')
            ->where('id_invoice', $id_invoice)
            ->get()
            ->getRow('jumlah_dialok') ?? 0;
    }
}