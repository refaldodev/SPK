<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $request = \Config\Services::request();
        $data['seg1'] = $request->uri->getSegment(1);

        $data['title'] = 'Sistem Pendukung Keputusan Dosen Terbaik - STMIK ANTARBANGSA';
        echo view('admintemplate/v_header', $data);
        echo view('admintemplate/v_sidebar', $data);
        echo view('admintemplate/v_topbar');
        echo view('admin/index');
        echo view('admintemplate/v_footer');
    }
}
