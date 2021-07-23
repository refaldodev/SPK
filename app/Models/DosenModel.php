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
    public function getNilaiDosen()
    {
        return $this->db->table('dosen')
            ->join('nilai', 'nilai.id_dosen=dosen.nidn', 'left')
            ->get()->getResultArray();
    }
    public function   getDataNilaiDosen($nidn)
    {
        return $this->db->table('dosen')
            ->join('nilai', 'nilai.id_dosen=dosen.nidn', 'left')
            ->where(['nidn' => $nidn])
            ->get()->getRowArray();
    }
}
