<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\InvoiceModel;
use App\Models\ProdukModel;
use App\Models\VoucherModel;
use DateTime;

class InvoiceController extends BaseController
{
    public function index(){
        
        $invoiceModel = new InvoiceModel();
        
        $voucherModel = new VoucherModel();

        // Fetch products using the model with pagination
        $data['vouchers']= $voucherModel->findAll(); 

        // Fetch products using the model with pagination
        $data['invoices']= $invoiceModel->findAll();

        $data['jumlah_voucher'] = count($data['vouchers']);

        
        $data['jumlah_invoice'] = count($data['invoices']);
          
        // Load the view and pass the data to it
        return view('invoice', $data);

    }

    public function checkout()
    {
        $session = session();
        $invoiceModel = new InvoiceModel();
        $produkModel = new ProdukModel();
        $voucherModel = new VoucherModel();

        $id_produk = $this->request->getVar('id_produk');
        $id_customer = $session->get('id_customer');        
        $produk = $produkModel->where('id_produk', $id_produk)->select('id_produk, nama_produk, kategori, harga, stok')->findAll();
        $harga_produk = intVal($produk[0]['harga']);
        $stok_produk = intVal($produk[0]['stok']);
        $kuantitas = $this->request->getVar('kuantitas');
        $total_invoice = $kuantitas * $harga_produk;

        $sisa_stok = $stok_produk - $kuantitas;
        $data_stok_update = [
            'stok' => $sisa_stok,
        ];
                    
        $current_datetime = new DateTime();

        if($total_invoice >= 2000000){
            $kode_voucher = $this->generateVoucher(14);

            // Add 30 days to the current date
            $expired_datetime = $current_datetime->modify('+30 days');

            // Get the formatted date and time as a string (in the desired format)
            $formatted_expired_datetime = $expired_datetime->format('Y-m-d H:i:s');

            $data_voucher = [
                'id_customer' => $id_customer,
                'kode_voucher' => $kode_voucher,
                'nilai_voucher' => 10000,
                'tgl_terbit' => $current_datetime->format('Y-m-d H:i:s'),
                'tgl_expired' => $formatted_expired_datetime,
            ];
            
            $data_invoice = [
                'id_customer' => $id_customer,
                'id_produk' => $id_produk,
                'total_invoice' => $total_invoice,
                'tgl_invoice' => $current_datetime->format('Y-m-d H:i:s'),
            ];

            //update stok produk
            $produkModel->update($id_produk, $data_stok_update);

            $invoiceModel->save($data_invoice);
            $voucherModel->save($data_voucher);
            
            return redirect()->to('/beranda');
        }else{
            
            
            $data_invoice = [
                'id_customer' => $id_customer,
                'id_produk' => $id_produk,
                'total_invoice' => $total_invoice,
                'tgl_invoice' => $current_datetime->format('Y-m-d H:i:s'),
            ];

            //update stok produk
            $produkModel->update($id_produk, $data_stok_update);

            $invoiceModel->save($data_invoice);

            return redirect()->to('/beranda');
        }
    }

    public function generateVoucher($lengthVoucher){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        $max = strlen($characters) - 1;
        
        for ($i = 0; $i < $lengthVoucher; $i++) {
            $code .= $characters[mt_rand(0, $max)];
        }

        if($this->isVoucherCodeUnique($code)){          
            return $code;
        }else{
            $this->generateVoucher($lengthVoucher);
        }
    }

    public function isVoucherCodeUnique($code){
        $voucherModel = new VoucherModel();
        $vouchers = $voucherModel->paginate(10, 'vouchers');
        $checkVoucher=false;
        
        if($vouchers == null){
            $checkVoucher = true;
        }else{            
            foreach ($vouchers as $voucher){
                if($code == $voucher['kode_voucher']){
                    $checkVoucher = false;
                }else{
                    $checkVoucher = true;
                }

            }

        }
        return $checkVoucher;
    }
}
