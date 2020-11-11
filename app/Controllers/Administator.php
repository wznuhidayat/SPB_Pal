<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_satuan;
use App\Models\M_petugas;

class Administator extends BaseController
{
    public function __construct()
    {
        $this->M_admin = new M_admin();
        $this->M_satuan = new M_satuan();
        $this->M_petugas = new M_petugas();
        helper('url', 'form');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        echo view('admin/dashboard', $data);
    }
    public function Admin()
    {
        $data = [
            'title' => 'Admin',
            'admin' => $this->M_admin->getAdmin(),
        ];
        // dd($data);
        echo view('admin/list_admin', $data);
    }
    public function addAdmin()
    {
        $data = [
            'title' => 'Tambah Admin',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/tambah_admin', $data);
    }
    public function saveAdmin()
    {
        // dd($this->request->getVar());
        if (!$this->validate([
            'name' => 'required',
            'nip' => 'required|is_unique[t_admin.nip]|min_length[8]',
            'password' => 'required|min_length[8]',
            'passconf' => 'required|matches[password]',
            'gender' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('addAdmin')->withInput()->with('validation', $validation);
        }
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => 'null'
        ];
        $this->M_admin->save($data);
        return redirect()->to('admin');
    }
    public function editAdmin($id)
    {
            $data = [
                'title' => 'Admin',
                'validation' => \Config\Services::validation(),
                'admin' => $this->M_admin->getAdmin($id)
            ];
        echo view('admin/edit_admin', $data);
    }
    public function updateAdmin($id)
    {
        $oldNip = $this->M_admin->getAdmin($this->request->getVar('id_admin'));
        // dd($oldNip["nip"]); 
        if ($oldNip["nip"] == $this->request->getVar('nip')){
            $rule_nip = 'required';
        }else{
            $rule_nip = 'required|is_unique[t_admin.nip]';
         }
        
        if (!$this->validate([
            'name' => 'required',
            'nip' => $rule_nip,
            'passconf' => 'matches[password]',

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/administator/editAdmin/' . $this->request->getVar('id_admin'))->withInput()->with('validation', $validation);
        }
        $data = array(
            'id_admin' => $id,
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => 'null'
        );
        $this->M_admin->save($data);
        return redirect()->to('/administator/admin');
    }
    public function delAdmin($id_admin)
    {
        $this->M_admin->delete($id_admin);
        return redirect()->to('/administator/admin');
    }


    //petugas
    public function petugas()
    {
        $data = [
            'title' => 'Petugas',
            'petugas' => $this->M_petugas->findAll()
        ];
        echo view('admin/petugas/list_petugas', $data);
    }
    public function addPetugas(){
        $data = [
            'title' => 'Tambah Petugas',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/petugas/add_petugas',$data);
    }
    public function savePetugas()
    {
        // dd($this->request->getVar());
        if (!$this->validate([
            'name' => 'required',
            'nip' => 'required|alpha_numeric_punct|is_unique[t_petugas.nip]|min_length[8]',
            'password' => 'required|min_length[8]',
            'passconf' => 'required|matches[password]',
            'gender' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('addpetugas')->withInput()->with('validation', $validation);
        }
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => 'null'
        ];
        $this->M_petugas->save($data);
        return redirect()->to('/administator/petugas');
    }
    public function delPetugas($id_petugas)
    {
        $this->M_petugas->delete($id_petugas);
        return redirect()->to('/administator/petugas');
    }
    public function editPetugas($id_petugas){
        $data = [
            'title' => 'Admin',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->M_petugas->getPetugas($id_petugas)
        ];
        echo view('admin/petugas/edit_petugas', $data);
    }
    public function updatePetugas($id)
    {
        $oldNip = $this->M_petugas->getpetugas($this->request->getVar('id_petugas'));
        // dd($oldNip["nip"]); 
        if ($oldNip["nip"] == $this->request->getVar('nip')){
            $rule_nip = 'required';
        }else{
            $rule_nip = 'required|is_unique[t_petugas.nip]';
         }
        
        if (!$this->validate([
            'name' => 'required',
            'nip' => $rule_nip,
            'passconf' => 'matches[password]',

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/edit/' . $this->request->getVar('id_petugas'))->withInput()->with('validation', $validation);
        }
        $data = array(
            'id_petugas' => $id,
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => 'null'
        );
        $this->M_admin->save($data);
        return redirect()->to('/administator/petugas');
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        echo view('admin/login', $data);
    }
    public function itemPerson()
    {
        $data = [
            'title' => 'Barang Pribadi',
        ];
        echo view('administator/barang', $data);
    }


    // satuan
    public function satuan()
    {
        $data = [
            'title' => 'Satuan',
            'satuan' => $this->M_satuan->findAll()
        ];
        echo view('admin/satuan/list_satuan', $data);
    }
    public function addSatuan()
    {
        $data = [
            'title' => 'Add Satuan',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/satuan/add_satuan', $data);
    }
    public function saveSatuan()
    {
        // dd($this->request->getPost());
        if (!$this->validate([
            'name' => 'required'

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('addSatuan')->withInput()->with('validation', $validation);
        }
        $data = [
            'code_satuan' => 'A' . rand(100, 999),
            'nama' => $this->request->getPost('name')
        ];
        $this->M_satuan->save($data);
        return redirect()->to('/administator/satuan');
    }
    public function delSatuan($id_satuan)
    {
        $this->M_satuan->delete($id_satuan);
        return redirect()->to('/administator/satuan');
    }
}
