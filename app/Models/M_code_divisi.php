<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_code_divisi extends Model
{
    protected $table = 't_code_divisi';
    protected $primaryKey = 'id_divisi';
    protected $allowedFields = ['code_divisi','nama_divisi','keterangan'];

    public function getDivisi($id = false)
    {
        if($id === false){
            return $this->orderBy('id_divisi','desc')->findAll();
        }else{
            return $this->where(['id_divisi' => $id])->first();
        }   
    }
}