<?php 

namespace App\Models;

use CodeIgniter\Model;

class KriteriaJabatanModel extends Model 
{
    protected $table = 'kriteria_jabatan';
    protected $primarykey = 'id_penelitian';
    public function getDataJabatan($slug = false) {
        if($slug === false){
            return $this->findAll();
        }
        return $this->where(['id_kriteria' => $slug])->first();

    }

}