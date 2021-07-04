<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaKompetensiModel extends Model
{

    protected $table = 'kriteria_kompetensi';
    protected $primaryKey = 'id_kriteria';
    public function getDataKompetensi($slug = false)
    {

        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['id_kriteria' => $slug])->first();
    }
}
