<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProdukModel;

class HomeController extends Controller
{
    public function index()
        
    {
        $produkModel = new ProdukModel();
        

        // Fetch products using the model with pagination
        $data['produks']= $produkModel->paginate(10, 'produks'); // 'bootstrap' is the pagination theme
        
        // Create the pagination links
        $data['pagers'] = $produkModel->pager;
          
        // Load the view and pass the data to it
        return view('home', $data);
    }

    public function welcome()
    {
        $produkModel = new ProdukModel();
        

        // Fetch products using the model with pagination
        $data['produks']= $produkModel->paginate(10, 'produks'); // 'bootstrap' is the pagination theme
        
        // Create the pagination links
        $data['pagers'] = $produkModel->pager;
          
        // Load the view and pass the data to it
        return view('welcome', $data);
    }
}
