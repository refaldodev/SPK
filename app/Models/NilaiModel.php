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
    public function getDataNilaiDosen()
    {
        return $this->db->table('nilai')
            ->join('dosen', 'dosen.nidn=nilai.id_dosen')
            ->get()->getResultArray();
    }
    public function getDataNilaMaxC1()
    {
        return $this->db->table('nilai')
            ->select('MAX(C1)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMinC1()
    {
        return $this->db->table('nilai')
            ->select('MIN(C1)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMaxC2()
    {
        return $this->db->table('nilai')
            ->select('MAX(C2)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMinC2()
    {
        return $this->db->table('nilai')
            ->select('MIN(C2)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
}
