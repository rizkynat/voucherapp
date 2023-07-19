<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_produk', 'kategori', 'harga', 'stok'];

}