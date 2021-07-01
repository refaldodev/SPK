<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';

    protected $useTimestamps = true;
    protected $allowedFields = ['nim', 'nama', 'jurusan'];

    // protected $allowedFields = ['nama', 'slug', 'jabatan', 'lama_mengajar', 'pendidikan', 'program_studi', 'asal_kampus'];
    // public function getMahasiswa($slug  = false)
    // {
    //     if ($slug === false) {
    //         return  $this->findAll();
    //     } else {
    //         return $this->where(['slug' => $slug])->first();
    //     }
    // }
}
