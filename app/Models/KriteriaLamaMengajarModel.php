<?php

namespace App\Models;

use CodeIgniter\Model;

 class KriteriaLamaMengajarModel extends Model
 {

    protected $table = 'kriteria_lamamengajar';
    protected $primaryKey = 'id_kriteria';

    public function getDataLamaMengajar($slug = false) 
    {
        if($slug === false)
        {
            return $this->findAll();

        }
        return $this->where(['id_kriteria' => $slug])->first();

    }
 }