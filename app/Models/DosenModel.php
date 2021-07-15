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
}
