<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {

        echo view('admintemplate/v_header');
        echo view('admintemplate/v_sidebar');
        echo view('admintemplate/v_topbar');
        echo view('admin/index');
        echo view('admintemplate/v_footer');
    }
}
