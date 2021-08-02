<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'periode',];
    public function getDataPeriode($id = false)
    {

        if ($id == false) {

            return  $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}

// 1,2,3,6,8,9