<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nidn';
    protected $useTimestamps = true;

    protected $allowedFields = ['nidn', 'nama', 'password', 'level'];

    public function getDataUsers($nidn = false)
    {
        if ($nidn === false) {
            return $this->findAll();
        }
        return $this->where(['nidn' => $nidn])->first();
    }
}
