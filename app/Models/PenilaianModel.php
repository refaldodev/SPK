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
    public function getPenilaian($id)
    {
        if ($id) {

            return $this->db->table('penilaian_dosen')
                ->where(['id_dosen' => $id])
                ->get()
                ->getResultArray();
        }
    }
}
