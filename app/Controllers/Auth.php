<?php

namespace App\Controllers;

use App\Models\M_admin;


class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_admin = new M_admin();
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        echo view('admin/login', $data);
    }
    public function authLogin(){
        $session = session();
        $nip = $this->request->getVar('nip');
        $password = md5($this->request->getVar('password'));
        $data = $this->M_admin->where('nip', $nip)->first();
        if($data){
            $pass = $data['password'];
            if($password == $pass){
                $ses_data = [
                    'nip'    => $data['nip'],
                    'nama'     => $data['nama'],
                    'img'   => $data['img'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/administator');
            }else{
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'NIP tidak terdaftar');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session->destroy();
        return redirect()->to('/login');
    }
}