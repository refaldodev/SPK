<?php

namespace App\Controllers;

class DataDosen extends BaseController
{
    public function index()
    {
        $data['title'] = 'ini data dosen';
        $request = \Config\Services::request();
        $data['seg1'] = $request->uri->getSegment(1);
        echo view('admintemplate/v_header', $data);
        echo view('admintemplate/v_sidebar', $data);
        echo view('admintemplate/v_topbar');
        echo view('data/dosen');
        echo view('admintemplate/v_footer');
    }
}
