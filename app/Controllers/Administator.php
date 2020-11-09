<?php namespace App\Controllers;
use App\Models\M_admin;
class Administator extends BaseController
{

    public function __construct()
    {
        $this->M_admin = new M_admin();
        helper('url','form');
    }
	public function index()
	{
		$data = [
            'title' => 'Dashboard'
        ];
        echo view('admin/dashboard',$data);
    }
    public function Admin(){
        $data = [
            'title' => 'Admin',
            'admin' => $this->M_admin->getAdmin(),
        ];
        // dd($data);
        echo view('admin/list_admin',$data);
    }
    public function addAdmin(){
        $data = [
            'title' => 'Tambah Admin',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/tambah_admin',$data);
    }
    public function saveAdmin(){
        // dd($this->request->getVar());
        if(!$this->validate([
            'name' => 'required',
            'nip' => 'required|alpha_numeric_punct|is_unique[t_admin.nip]',
            'password' => 'required|min_length[8]',
            'passconf' => 'required|matches[password]',
            'gender' => 'required'
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('addAdmin')->withInput()->with('validation', $validation);
        }
        
        $data = array(
            'id_admin' => (int)floor(microtime(true)),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => 'null'
        );
        $this->M_admin->saveAdmin($data);
        return redirect()->to('admin');
    }
    public function editAdmin($id){
        // if(!$this->validate([
        //     'name' => 'required',
        //     'nip' => 'required|is_unique[t_user.email]',
            
        // ])){
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/administator/editAdmin')->withInput()->with('validation', $validation);
        // }
        $data = [
            'title' => 'Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->M_admin->getAdmin($id)
        ];
        // dd($data);
        echo view('admin/edit_admin',$data);
    }
    public function delAdmin($id_admin){
        $this->M_admin->delete($id_admin);
        return redirect()->to('/administator/admin');
    }
    public function petugas(){
        $data = [
            'title' => 'Petugas'
        ];
        echo view('admin/list_petugas',$data);
    }
    public function login(){
        $data = [
            'title' => 'Login',
        ];
        echo view('admin/login',$data);
    }
    public function itemPerson(){
        $data = [
            'title' => 'Barang Pribadi',
        ];
        echo view('administator/barang',$data);

        
    }


    // satuan
    public function satuan(){

    }

}
