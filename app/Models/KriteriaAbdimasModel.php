<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaAbdimasModel extends model
{

    protected $table = 'kriteria_abdimas';
    protected $primarykey = 'id_penelitian';
    public function getDataKriteriaAbdimas($slug = false)
    {
        if ($slug === false) {
            return  $this->findAll();
        }
      return  $this->where(['id_penelitian' => $slug])->fist();
    }
}
