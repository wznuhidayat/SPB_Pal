<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_barang_keluar extends Model
{
    protected $table = 't_barang_keluar';
    protected $primaryKey = 'code_item_out';
    public function getBarangKeluar($id = false)
    {
        if($id === false){
            return $this->db->table($this->table)->orderBy('created_at','desc')
            ->join('t_code_divisi','t_code_divisi.id_divisi='.$this->table.'.id_divisi')
            ->get()->getResultArray();
        }else{
            return $this->where(['code_item_out' => $id])->first();
        }   
    }
    public function saveBarangKeluar($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateBarangKeluar($data,$id){
        $query = $this->db->table($this->table)->update($data, ['code_item_out' => $id]);
        return $query;
    }
    public function countBarangKeluar(){
        $query = $this->db->table($this->table)->countAll();
        return $query;
    }
}