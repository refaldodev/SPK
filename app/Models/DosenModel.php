<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    // ...
    protected $table = 'data_dosen';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'jabatan', 'lama_mengajar', 'pendidikan', 'program_studi', 'asal_kampus'];

    public function getDosen($slug = false)
    {
        if ($slug == false) {
            return  $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
