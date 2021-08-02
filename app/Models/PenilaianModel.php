<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian_dosen';
    protected $primaryKey = 'id_penilaian';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_dosen', 'id_mahasiswa', 'question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10'];

    public function getNilai($id = false)


    {
        if ($id == false) {
            return $this->db->table('nilai')
                ->join('dosen', 'nilai.id_dosen=dosen.nidn', 'left')
                ->get()->getResultArray();
        } else {

            return $this->db->table('nilai')
                ->join('dosen', 'nilai.id_dosen=dosen.nidn', 'left')
                ->where(['nilai.id_nilai' => $id])
                ->get()->getRowArray();
        }
    }
    public function getPenilaian($idmahasiswa)
    {
        return $this->db->table('penilaian_dosen')
            ->where(['id_mahasiswa' => $idmahasiswa])
            ->get()
            ->getResultObject();
    }
    public function getJumlahPenilai($nidn)
    {
        return $this->db->table('penilaian_dosen')
            ->selectCount('id_dosen')
            ->where(['id_dosen' => $nidn])
            ->get()->getRowArray();
    }
    public function getJumlahDosen()
    {
        return $this->db->table('users')
            ->selectCount('level')
            ->where(['level' => 3])
            ->get()->getRowArray();
    }
    public function getJumlahMahasiswa()
    {
        return $this->db->table('users')
            ->selectCount('level')
            ->where(['level' => 2])
            ->get()->getRowArray();
    }
    public function getJumlahAdmin()
    {
        return $this->db->table('users')
            ->selectCount('level')
            ->where(['level' => 1])
            ->get()->getRowArray();
    }
    public function getPenilaian1($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question1')
                ->where(['id_dosen' => $id])
                ->where(['question1' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question1')
                ->where(['id_dosen' => $id])
                ->where(['question1' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai = 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question1')

                ->where(['id_dosen' => $id])
                ->where(['question1' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai = 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question1')

                ->where(['id_dosen' => $id])
                ->where(['question1' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai = 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question1')

                ->where(['id_dosen' => $id])
                ->where(['question1' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian2($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question2')
                ->where(['id_dosen' => $id])
                ->where(['question2' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question2')
                ->where(['id_dosen' => $id])
                ->where(['question2' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question2')

                ->where(['id_dosen' => $id])
                ->where(['question2' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question2')

                ->where(['id_dosen' => $id])
                ->where(['question2' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question2')

                ->where(['id_dosen' => $id])
                ->where(['question2' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian3($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question3')
                ->where(['id_dosen' => $id])
                ->where(['question3' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question3')
                ->where(['id_dosen' => $id])
                ->where(['question3' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question3')

                ->where(['id_dosen' => $id])
                ->where(['question3' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question3')

                ->where(['id_dosen' => $id])
                ->where(['question3' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question3')

                ->where(['id_dosen' => $id])
                ->where(['question3' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian4($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question4')
                ->where(['id_dosen' => $id])
                ->where(['question4' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question4')
                ->where(['id_dosen' => $id])
                ->where(['question4' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question4')

                ->where(['id_dosen' => $id])
                ->where(['question4' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question4')

                ->where(['id_dosen' => $id])
                ->where(['question4' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question4')

                ->where(['id_dosen' => $id])
                ->where(['question4' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian5($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question5')
                ->where(['id_dosen' => $id])
                ->where(['question5' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question5')
                ->where(['id_dosen' => $id])
                ->where(['question5' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question5')

                ->where(['id_dosen' => $id])
                ->where(['question5' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question5')

                ->where(['id_dosen' => $id])
                ->where(['question5' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question5')

                ->where(['id_dosen' => $id])
                ->where(['question5' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian6($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question6')
                ->where(['id_dosen' => $id])
                ->where(['question6' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question6')
                ->where(['id_dosen' => $id])
                ->where(['question6' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question6')

                ->where(['id_dosen' => $id])
                ->where(['question6' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question6')

                ->where(['id_dosen' => $id])
                ->where(['question6' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question6')

                ->where(['id_dosen' => $id])
                ->where(['question6' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian7($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question7')
                ->where(['id_dosen' => $id])
                ->where(['question7' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question7')
                ->where(['id_dosen' => $id])
                ->where(['question7' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question7')

                ->where(['id_dosen' => $id])
                ->where(['question7' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question7')

                ->where(['id_dosen' => $id])
                ->where(['question7' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question7')

                ->where(['id_dosen' => $id])
                ->where(['question7' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian8($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question8')
                ->where(['id_dosen' => $id])
                ->where(['question8' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question8')
                ->where(['id_dosen' => $id])
                ->where(['question8' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question8')

                ->where(['id_dosen' => $id])
                ->where(['question8' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question8')

                ->where(['id_dosen' => $id])
                ->where(['question8' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question8')

                ->where(['id_dosen' => $id])
                ->where(['question8' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian9($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question9')
                ->where(['id_dosen' => $id])
                ->where(['question9' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question9')
                ->where(['id_dosen' => $id])
                ->where(['question9' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question9')

                ->where(['id_dosen' => $id])
                ->where(['question9' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question9')

                ->where(['id_dosen' => $id])
                ->where(['question9' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question9')

                ->where(['id_dosen' => $id])
                ->where(['question9' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
    public function getPenilaian10($id, $nilai)
    {
        if ($id && $nilai == 5) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question10')
                ->where(['id_dosen' => $id])
                ->where(['question10' => $nilai])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 4) {

            return $this->db->table('penilaian_dosen')
                ->selectCount('question10')
                ->where(['id_dosen' => $id])
                ->where(['question10' => 4])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 3) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question10')

                ->where(['id_dosen' => $id])
                ->where(['question10' => 3])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 2) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question10')

                ->where(['id_dosen' => $id])
                ->where(['question10' =>  2])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
        if ($id && $nilai == 1) {
            return $this->db->table('penilaian_dosen')
                ->selectCount('question10')

                ->where(['id_dosen' => $id])
                ->where(['question10' => 1])
                ->limit(10)
                ->get()
                ->getResultArray();
        }
    }
}
