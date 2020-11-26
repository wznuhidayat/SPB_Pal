<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_barang_p extends Model
{
    protected $table = 't_barang_pribadi';
    protected $primaryKey = 'qr_code';
    protected $useTimestamps = true;
    protected $allowedFields = ['qr_code','nama','nama_pemilik','keterangan','img'];
    public function getBarangPersonal($id = false)
    {
        if($id === false){
            return $this->orderBy('created_at','desc')->findAll();
        }else{
            return $this->where(['qr_code' => $id])->first();
        }   
    }
    public function saveBarang($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateItemPerson($data,$id){
        $query = $this->db->table($this->table)->update($data, ['qr_code' => $id]);
        return $query;
    }
}