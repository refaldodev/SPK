<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    // ...
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';

    protected $useTimestamps = true;
    protected $allowedFields = ['nidn', 'nama', 'prodi', 'jabatan', 'pendidikan', 'jurusan', 'asal_kampus'];

    public function getDataDosen($slug = false)
    {
        if ($slug == false) {
            return  $this->findAll();
        }
        return $this->where(['nidn' => $slug])->first();
    }
    public function getNilaiDosen($periode = false)
    {
        if ($periode != false) {

            return $this->db->table('dosen')
                ->join('nilai', 'nilai.id_dosen=dosen.nidn', 'left')
                ->where(['periode' => $periode])
                ->get()->getResultArray();
        } else {
            return $this->db->table('dosen')
                ->distinct()
                ->groupBy(['dosen.nama'])
                ->join('nilai', 'nilai.id_dosen=dosen.nidn', 'left')
                ->get()->getResultArray();
        }
    }
    public function getSudahNilaiDosen()
    {

        return $this->db->table('dosen')
            ->selectCount('nama')
            ->join('nilai', 'nilai.id_dosen=dosen.nidn')
            ->get()->getRowArray();
    }

    public function   getDataNilaiDosen($nidn)
    {
        return $this->db->table('dosen')
            ->join('nilai', 'nilai.id_dosen=dosen.nidn', 'left')
            ->where(['nidn' => $nidn])
            ->get()->getRowArray();
    }
    public function getPeriode($getperiode)
    {
        return $this->db->table('dosen')
            ->join('nilai', 'nilai.id_dosen=dosen.nidn', 'left')
            ->where(['nilai.id_periode' => $getperiode])
            ->get()->getResultArray();
    }
}
