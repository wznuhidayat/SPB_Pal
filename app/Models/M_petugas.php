<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_petugas extends Model
{
    protected $table = 't_petugas';
    protected $primaryKey = 'id_petugas';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip','nama','gender','password','img'];
    public function getPetugas($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id_petugas' => $id])->first();
        }   
    }
}