<?php

namespace App\Controllers;

class DataDosen extends BaseController
{
    public function index()
    {
        echo view('admintemplate/v_header');
        echo view('admintemplate/v_sidebar');
        echo view('admintemplate/v_topbar');
        echo view('data/dosen');
        echo view('admintemplate/v_footer');
       
    }
}
