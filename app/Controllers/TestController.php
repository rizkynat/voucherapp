<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProdukModel;
use App\Models\InvoiceModel;
use App\Models\VoucherModel;
use DateTime;

class TestController extends BaseController
{
    public function index()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';
        $max = strlen($characters) - 1;
        $lengthVoucher = 14;
        
        for ($i = 0; $i < $lengthVoucher; $i++) {
            $code .= $characters[mt_rand(0, $max)];
        }

        var_dump($this->isVoucherCodeUnique($code));
        echo($code);
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
