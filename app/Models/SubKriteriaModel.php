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
    public function getSubKriteria1()
    {
        return $this->db->table('subkriteria')
            ->select('bobot')
            ->where(['id_kriteria' => 1])
            ->get()->getResultArray();
    }
    public function getSubKriteria2()
    {
        return $this->db->table('subkriteria')
            ->select('*')
            ->where(['id_kriteria' => 2])
            ->get()->getResultArray();
    }
    public function getSubKriteria3()
    {
        return $this->db->table('subkriteria')
            ->select('bobot')
            ->where(['id_kriteria' => 3])
            ->get()->getResultArray();
    }
}
