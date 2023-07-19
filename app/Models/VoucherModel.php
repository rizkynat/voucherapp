<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table      = 'voucher';
    protected $primaryKey = 'id_voucher';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_voucher', 'id_customer', 'kode_voucher', 'nilai_voucher', 'tgl_terbit', 'tgl_expired'];

}