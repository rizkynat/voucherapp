<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProdukModel;

class ProdukController extends Controller
{

    public function show($id_produk)
    {
        $produkModel = new ProdukModel();

        // Get the detailed data from the model
        $produk = $produkModel->where('id_produk', $id_produk)->select('id_produk, nama_produk, kategori, harga, stok')->findAll();

        // Load the view and pass the data to it
        return view('detail_produk', ['produk' => $produk]);
    }
}
