<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKriteriaModel extends Model
{
    protected  $table = 'subkriteria';
    protected $primaryKey = 'id_subkriteria';
    protected $useTimestamps = true;

    protected $allowedFields = ['id_subkriteria',  'subkriteria', 'bobot'];

    public function getDataSubKriteria($slug = false)
    {
        if ($slug === false) {
            return  $this->findAll();
        } else {
            return $this->where(['id_subkriteria' => $slug])->first();
        }
    }
}
