<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new CustomerModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('nama_customer', $username)->first();
        if($data){
            $pass = $data['password'];
            if($password == $pass){
                $ses_data = [
                    'id_customer' => $data['id_customer'],
                    'username' => $data['nama_customer'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/beranda');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }
}
