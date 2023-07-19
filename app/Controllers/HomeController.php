<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProdukModel;
use App\Models\InvoiceModel;
use App\Models\VoucherModel;
use DateTime;

class HomeController extends BaseController
{
    public function index()
        
    {
        $produkModel = new ProdukModel();

        $invoiceModel = new InvoiceModel();
        
        $voucherModel = new VoucherModel();

        // Fetch products using the model with pagination
        $data['vouchers']= $voucherModel->findAll(); 

        // Fetch products using the model with pagination
        $data['invoices']= $invoiceModel->findAll();

        $data['jumlah_voucher'] = count($data['vouchers']);

        
        $data['jumlah_invoice'] = count($data['invoices']);
        

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
