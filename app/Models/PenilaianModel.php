<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian_dosen';
    protected $primaryKey = 'id_penilaian';

    protected $useTimestamps = true;
    protected $allowedFields = ['question1', 'question2', 'question3', 'question4', 'question5'];
}
