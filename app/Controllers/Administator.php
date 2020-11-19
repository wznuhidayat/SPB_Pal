<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_satuan;
use App\Models\M_petugas;
use App\Models\M_barang_p;
use CodeIgniter\Validation\Rules;

class Administator extends BaseController
{
    public function __construct()
    {

        $this->M_admin = new M_admin();
        $this->M_satuan = new M_satuan();
        $this->M_petugas = new M_petugas();
        $this->M_barang_p = new M_barang_p();
        helper('url', 'form');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        echo view('admin/dashboard', $data);
    }

    //admin
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
            'nip' => [
                'rules' => 'required|is_unique[t_admin.nip]|min_length[8]',
                'errors' => [
                    'is_unique' => 'NIP telah digunakan',
                    'min_length' => 'NIP kurang dari 8 angka'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Paswword belum diisi',
                    'min_length' => 'Password kurang dari 8'
                ]

            ],
            'passconf' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Paswword belum diisi',
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'gender' => 'required',
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'mime_in' => 'Format yang dilakukan salah',
                ]
            ]
        ])) {
            return redirect()->to('addAdmin')->withInput();
        }
        $fileImg = $this->request->getFile('gambar');
        if ($fileImg->getError() == 4) {
            $nameImg = 'default.png';
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/admin/', $nameImg);
        }
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => $nameImg,
            'created_at' => date('Y/m/d h:i:s'),
            'updated_at' => date('Y/m/d h:i:s')
        ];
        $this->M_admin->saveAdmin($data);
        session()->setFLashdata('success', 'Data berhasil disimpan');
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
        $oldNip = $this->M_admin->getAdmin($id);
        // dd($oldNip["nip"]); 
        if ($oldNip["nip"] == $this->request->getVar('nip')) {
            $rule_nip = 'required';
        } else {
            $rule_nip = 'required|is_unique[t_admin.nip]';
        }

        if (!$this->validate([
            'name' => 'required',
            'nip' => $rule_nip,
            'passconf' => 'matches[password]',

        ])) {
            return redirect()->to('/administator/editAdmin/')->withInput();
        }
        $fileImg = $this->request->getFile('gambar');
        if ($fileImg->getError() == 4) {
            $nameImg = $this->request->getVar('oldimg');
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/admin', $nameImg);
            if ($this->request->getVar('oldimg') != 'default.png') {
                unlink('img/admin/' . $this->request->getVar('oldimg'));
            }
        }
        $data = array(
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => $nameImg,
            'created_at' => $oldNip["created_at"],
            'updated_at' => date('Y/m/d h:i:s')
        );

        $this->M_admin->updateAdmin($data, $id);
        session()->setFLashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/administator/admin');
    }
    public function delAdmin($id_admin)
    {
        $item = $this->M_admin->getAdmin($nip);
        if ($item['img'] != 'default.png') {
            unlink('img/admin/' . $item['img']);
        }
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
    public function addPetugas()
    {
        $data = [
            'title' => 'Tambah Petugas',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/petugas/add_petugas', $data);
    }
    public function savePetugas()
    {
        // dd($this->request->getVar());
        if (!$this->validate([
            'name' => 'required',
            'nip' => [
                'rules' => 'required|is_unique[t_petugas.nip]|min_length[8]',
                'errors' => [
                    'is_unique' => 'NIP telah digunakan',
                    'min_length' => 'NIP kurang dari 8 angka'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Paswword belum diisi',
                    'min_length' => 'Password kurang dari 8'
                ]

            ],
            'passconf' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Paswword belum diisi',
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin belum diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'mime_in' => 'format yang dilakukan salah',

                ]
            ]

        ])) {
            return redirect()->to('addpetugas/')->withInput();
        }
        $fileImg = $this->request->getFile('gambar');
        if ($fileImg->getError() == 4) {
            $nameImg = 'default.png';
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/petugas', $nameImg);
        }
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => $nameImg,
            'created_at' => date('Y/m/d h:i:s'),
            'updated_at' => date('Y/m/d h:i:s')
        ];
        $this->M_petugas->savePetugas($data);
        session()->setFLashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/administator/petugas');
    }
    public function delPetugas($nip)
    {
        $item = $this->M_petugas->getPetugas($nip);
        if ($item['img'] != 'default.png') {
            unlink('img/petugas/' . $item['img']);
        }
        $this->M_petugas->delete($nip);
        return redirect()->to('/administator/petugas');
    }
    public function editPetugas($nip)
    {
        $data = [
            'title' => 'Edit Petugas',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->M_petugas->getPetugas($nip)
        ];
        echo view('admin/petugas/edit_petugas', $data);
    }
    public function updatePetugas($id)
    {
        $oldNip = $this->M_petugas->getPetugas($id);
        // dd($oldNip['nip']);
        if ($oldNip['nip'] == $this->request->getVar('nip')) {
            $rule_nip = 'required|min_length[8]';
        } else {
            $rule_nip = [
                'rules' => 'required|is_unique[t_petugas.nip]|min_length[8]',
                'errors' => [
                    'is_unique' => 'NIP telah digunakan',
                    'min_length' => 'NIP kurang dari 8 angka'
                ]
            ];
        }

        if (!$this->validate([
            'name' => 'required',
            'nip' => $rule_nip,
            'password' => [
                'rules' => 'min_length[8]',
                'errors' => [
                    'min_length' => 'Password kurang dari 8'
                ]

            ],
            'passconf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin belum diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'mime_in' => 'format yang dilakukan salah',

                ]
            ]

        ])) {

            return redirect()->to('/petugas/edit/' . $id)->withInput();
        }
        $fileImg = $this->request->getFile('gambar');
        if ($fileImg->getError() == 4) {
            $nameImg = $this->request->getVar('oldimg');
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/petugas', $nameImg);
            if ($this->request->getVar('oldimg') != 'default.png') {
                unlink('img/petugas/' . $this->request->getVar('oldimg'));
            }
        }
        $data = array(
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('name'),
            'password' => md5($this->request->getPost('password')),
            'gender' => $this->request->getPost(('gender')),
            'img' => $nameImg,
            'created_at' => $oldNip["created_at"],
            'updated_at' => date('Y/m/d h:i:s')
        );
        $this->M_petugas->updatePetugas($data, $oldNip['nip']);
        session()->setFLashdata('success', 'Data berhasil diubah');
        return redirect()->to('/administator/petugas');
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
            return redirect()->to('addSatuan' . $this->request->getVar('id_satuan'))->withInput()->with('validation', $validation);
        }
        $str = "";
        $characters = array_merge(range('0', '3'));
        $max = count($characters) - 1;
        for ($i = 0; $i < 3; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        $data = [
            'code_satuan' => 'A' . $str,
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


    //barang
    public function itemPerson()
    {
        $data = [
            'title' => 'Barang Pribadi',
            'barang' => $this->M_barang_p->findAll()
        ];
        echo view('admin/barang/list_barang_p', $data);
    }
    public function addItemPerson()
    {
        $data = [
            'title' => 'Add barang personal',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/barang/add_barang', $data);
    }
    public function delItemPerson($id)
    {
        $item = $this->M_barang_p->getBarangPersonal($id);
        if ($item['img'] != 'default.png') {
            unlink('img/barang/' . $item['img']);
        }
        $this->M_barang_p->delete($id);
        return redirect()->to('/administator/itemPerson');
    }
    public function saveItemPerson()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang harus diisi'
                ]
            ],
            'name_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pemilik harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'Format gambar salah',
                    'max_size' => 'Ukuran gambar terlalu besar'
                ]
            ],
        ])) {
            // return redirect()->to('addItemPerson'. $this->request->getVar('id_barang_p'))->withInput()->with('validation', $validation);
            return redirect()->to('addItemPerson')->withInput();
        }
        $fileImg = $this->request->getFile('gambar');
        if ($fileImg->getError() == 4) {
            $nameImg = 'default.png';
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/barang', $nameImg);
        }
        $str = "";
        $characters = array_merge(range('0', '6'));
        $max = count($characters) - 1;
        for ($i = 0; $i < 6; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        $data = [
            'qr_code' => 'BP' . $str,
            'nama' => $this->request->getVar('name'),
            'nama_pemilik' => $this->request->getVar('name_user'),
            'keterangan' => $this->request->getVar(('keterangan')),
            'img' => $nameImg,
            'created_at' => date('Y/m/d h:i:s'),
            'updated_at' => date('Y/m/d h:i:s')
        ];
        $this->M_barang_p->saveBarang($data);
        session()->setFLashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/administator/itemPerson');
    }
    public function editItemPerson($qr_code)
    {

        $data = [
            'title' => 'Edit Petugas',
            'validation' => \Config\Services::validation(),
            'barang' => $this->M_barang_p->getBarangPersonal($qr_code)
        ];
        echo view('admin/barang/edit_item_person', $data);
    }
    public function updateItemPerson($id)
    {
        $oldNip = $this->M_barang_p->getBarangPersonal($this->request->getVar('qr_code'));
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang harus diisi'
                ]
            ],
            'name_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pemilik harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'mime_in' => 'Format gambar salah',
                    'max_size' => 'Ukuran gambar terlalu besar'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/barangperson/edit/' . $id)->withInput();
        }
        $fileImg = $this->request->getFile('gambar');
        if ($fileImg->getError() == 4) {
            $nameImg = $this->request->getVar('oldimg');
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/barang', $nameImg);
            if ($this->request->getVar('oldimg') != 'default.png') {
                unlink('img/barang/' . $this->request->getVar('oldimg'));
            }
        }
        $data = array(
            'nama' => $this->request->getPost('name'),
            'nama_pemilik' => $this->request->getPost('name_user'),
            'keterangan' => $this->request->getPost(('keterangan')),
            'img' => $nameImg,
            'created_at' => $oldNip["created_at"],
            'updated_at' => date('Y/m/d h:i:s')
        );
        $this->M_barang_p->updateItemPerson($data, $this->request->getPost('qr_code'));
        return redirect()->to('/administator/itemperson');
    }
}
