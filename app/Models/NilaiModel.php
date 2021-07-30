<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_dosen', 'id_periode', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6'];
    public function getDataNilai($slug = false)
    {
        if ($slug == false) {
            return  $this->findAll();
        }
        return $this->where(['id_nilai' => $slug])->first();
    }
    public function getDataNilaiDosen($periode = false)
    {
        if ($periode) {
            return $this->db->table('nilai')
                ->join('dosen', 'dosen.nidn=nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getResultArray();
        }
        return $this->db->table('nilai')
            ->join('dosen', 'dosen.nidn=nilai.id_dosen')
            ->join('periode', 'periode.id=nilai.id_periode')
            ->get()->getResultArray();
    }

    public function getDataNilaMaxC1($periode = false)
    {
        if ($periode) {
            return $this->db->table('nilai')
                ->select('MAX(C1)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MAX(C1)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMinC1($periode = false)
    {
        if ($periode) {
            return $this->db->table('nilai')
                ->select('MIN(C1)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MIN(C1)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMaxC2($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MAX(C2)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MAX(C2)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMinC2($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MIN(C2)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MIN(C2)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMaxC3($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MAX(C3)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MAX(C3)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMinC3($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MIN(C3)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MIN(C3)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMaxC4($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MAX(C4)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MAX(C4)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMinC4($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MIN(C4)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MIN(C4)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMaxC5($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MAX(C5)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MAX(C5)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMinC5($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MIN(C5)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MIN(C5)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMaxC6($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MAX(C6)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])
                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MAX(C6)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
    }
    public function getDataNilaMinC6($periode = false)
    {
        if ($periode) {

            return $this->db->table('nilai')
                ->select('MIN(C6)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->join('periode', 'periode.id=nilai.id_periode')
                ->where(['periode.id' => $periode])

                ->get()->getRowArray();
        } else {
            return $this->db->table('nilai')
                ->select('MIN(C6)')
                ->join('dosen', 'dosen.nidn = nilai.id_dosen')
                ->get()->getRowArray();
        }
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
    public function insertData()
    {
        $data['nilaiakhir'] = $this->penilaianmodel->getPenilaian(1744390003);
        $total = 0;
        foreach ($data['nilaiakhir'] as $row) {
            $update = $row['question1'] + $row['question2'] + $row['question3'] + $row['question4'] + $row['question5'] + $row['question6'] + $row['question7'] + $row['question8'] +  $row['question9'] + $row['question10'];
            $total += $update;
            // $id =  81;
            // $this->penilaianmodel->update($id, $update);
        }
        echo $total;
    }
}
