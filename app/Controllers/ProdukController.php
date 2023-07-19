<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProdukModel;
use App\Models\InvoiceModel;
use App\Models\VoucherModel;
use DateTime;

class ProdukController extends Controller
{

    public function show($id_produk)
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

        // Get the detailed data from the model
        $data['produk'] = $produkModel->where('id_produk', $id_produk)->select('id_produk, nama_produk, kategori, harga, stok')->findAll();

        $data_vouchers = array();

        foreach($data['vouchers'] as $voucher){
            if(!$this->isExpiredVoucher($voucher['tgl_expired'])){
                array_push($data_vouchers, $voucher['kode_voucher']);
            }
        }
        
        $data['voucher_aktifs'] = $data_vouchers;

        // Load the view and pass the data to it
        return view('detail_produk', $data);
    }

    public function isExpiredVoucher($tgl_voucher){
        $currentDateTime = new DateTime();        
        
        $voucherModel = new VoucherModel();
        $isExpired = false;

        // Fetch products using the model with pagination
        $data['vouchers'] = $voucherModel->findAll();

        // Step 2: Initialize a counter for expired vouchers
        $expiredVoucherCount = 0;
        

        $expiryDate = new DateTime($tgl_voucher);
            
        if ($expiryDate < $currentDateTime) {
            $isExpired = true;
        }else{
            $isExpired = false;
        }
        

        return $isExpired;

    }
}
