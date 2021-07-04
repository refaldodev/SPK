<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKriteriaModel extends Model
{
    protected $table = 'kriteria_penelitian';
    protected $primarykey = 'id_penelitian';
    
    // protected $useTimestamps = true;
    // protected $allowedFields = ['nama', 'slug', 'jabatan', 'lama_mengajar', 'pendidikan', 'program_studi', 'asal_kampus'];
    public function getDataKriteria($slug = false){
        if($slug === false) {
            return  $this->findAll();

        }
        return $this->where(['id_penelitian' => $slug])->first();

    }

}