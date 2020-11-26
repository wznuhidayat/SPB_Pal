<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_petugas extends Model
{
    protected $table = 't_petugas';
    protected $primaryKey = 'nip';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip','nama','gender','password','img'];
    
    public function getPetugas($id = false)
    {
        if($id === false){
            return $this->orderBy('created_at','desc')->findAll();
        }else{
            return $this->where(['nip' => $id])->first();
        }   
    }
    public function savePetugas($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updatePetugas($data,$id){
        $query = $this->db->table($this->table)->update($data,['nip' => $id]);
        return $query;
    }
}