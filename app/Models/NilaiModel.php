<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_dosen', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'periode'];
    public function getDataNilai($slug = false)
    {
        if ($slug == false) {
            return  $this->findAll();
        }
        return $this->where(['id_nilai' => $slug])->first();
    }
}
