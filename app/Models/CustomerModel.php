<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'id_customer';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_customer', 'password'];

}