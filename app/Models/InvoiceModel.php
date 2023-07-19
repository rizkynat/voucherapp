<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table      = 'invoice';
    protected $primaryKey = 'id_invoice';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_customer', 'id_produk', 'total_invoice', 'tgl_invoice'];

}