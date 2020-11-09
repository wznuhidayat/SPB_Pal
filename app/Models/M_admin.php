<?php namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table = 't_admin';
    protected $primaryKey = 'id_admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip','nama','jenis_kelamin','password','img'];
    public function getAdmin($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->where(['id_admin' => $id])->first();
        }   
    }
    public function saveAdmin($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}