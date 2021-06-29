<?php

namespace App\Models;

use CodeIgniter\Model;


class KriteriaModel extends Model
{

    // ...
    protected $table = 'kriteria';
    protected $useTimestamps = true;
    protected $allowedFields = ['kriteria', 'peringkat', 'bobot'];

    public function getKriteria($slug = false)
    {
        if ($slug == false) {
            return  $this->findAll();
        }
        return $this->where(['kriteria' => $slug])->first();
    }
}
