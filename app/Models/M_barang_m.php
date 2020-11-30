<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_barang_m extends Model
{
    protected $table = 't_barang_material';
    protected $primaryKey = 'code_material';
    protected $useTimestamps = true;
    protected $allowedFields = ['code_material','nama','vendor','keterangan','img','deadline_date','date_recived','creat_at','update_at'];
    public function getBarangMaterial($id = false)
    {
        if($id === false){
            return $this->orderBy('created_at','desc')->findAll();
        }else{
            return $this->where(['code_material' => $id])->first();
        }   
    }
    public function saveBarang($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateItemMaterial($data,$id){
        $query = $this->db->table($this->table)->update($data, ['code_material' => $id]);
        return $query;
    }
    public function countMaterial(){
        $query = $this->db->table($this->table)->countAll();
        return $query;
    }
}