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
    public function getDataNilaMaxC3()
    {
        return $this->db->table('nilai')
            ->select('MAX(C3)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMinC3()
    {
        return $this->db->table('nilai')
            ->select('MIN(C3)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMaxC4()
    {
        return $this->db->table('nilai')
            ->select('MAX(C4)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMinC4()
    {
        return $this->db->table('nilai')
            ->select('MIN(C4)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMaxC5()
    {
        return $this->db->table('nilai')
            ->select('MAX(C5)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMinC5()
    {
        return $this->db->table('nilai')
            ->select('MIN(C5)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMaxC6()
    {
        return $this->db->table('nilai')
            ->select('MAX(C6)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getDataNilaMinC6()
    {
        return $this->db->table('nilai')
            ->select('MIN(C6)')
            ->join('dosen', 'dosen.nidn = nilai.id_dosen')
            ->get()->getRowArray();
    }
    public function getKriteriaC1()
    {
        return $this->db->table('kriteria')
            ->select('bobot')
            ->where(['peringkat' => 1])
            ->get()->getRowArray();
    }
    public function getKriteriaC2()
    {
        return $this->db->table('kriteria')
            ->select('bobot')
            ->where(['peringkat' => 2])
            ->get()->getRowArray();
    }
    public function getKriteriaC3()
    {
        return $this->db->table('kriteria')
            ->select('bobot')
            ->where(['peringkat' => 3])
            ->get()->getRowArray();
    }
    public function getKriteriaC4()
    {
        return $this->db->table('kriteria')
            ->select('bobot')
            ->where(['peringkat' => 4])
            ->get()->getRowArray();
    }
    public function getKriteriaC5()
    {
        return $this->db->table('kriteria')
            ->select('bobot')
            ->where(['peringkat' => 5])
            ->get()->getRowArray();
    }
    public function getKriteriaC6()
    {
        return $this->db->table('kriteria')
            ->select('bobot')
            ->where(['peringkat' => 6])
            ->get()->getRowArray();
    }
}
