<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function check_login($nidn, $password)
    {
        return $this->db->table('users')
            ->where(array('nidn' =>  $nidn, 'password' => sha1($password)))
            ->get()->getRowArray();
    }
    public function getNidn($nidn = false)
    {
        if ($nidn === false) {
            return $this->findAll();
        }
        return $this->where(['nidn' => $nidn])->first();
    }
}
