<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    // ...
    protected $table = 'data_dosen';
    protected $useTimestamps = true;

    public function getDosen($slug = false)
    {
        if ($slug == false) {
            return  $this->findAll();
        }
        return $this->where(['nama' => $slug])->first();
    }
}
