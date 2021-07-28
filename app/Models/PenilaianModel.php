<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian_dosen';
    protected $primaryKey = 'id_penilaian';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_dosen', 'question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10'];

    public function getPerhitungan()
    {
    }
}
