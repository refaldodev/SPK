<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaPendidikanModel extends Model {
    protected $table = 'kriteria_pendidikan';
    protected $primaryKey = 'id_kriteria';

    public function getDataPendidikan($slug = false){
        if($slug === false){
            return $this->findAll();

        }
        return $this->where(['id_kriteria' => $slug])->fist();
    }
}