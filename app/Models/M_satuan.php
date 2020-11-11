<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_satuan extends Model
{
    protected $table = 't_satuan';
    protected $primaryKey = 'id_satuan';
    protected $allowedFields = ['code_satuan','nama'];
    
}