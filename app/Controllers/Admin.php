<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $request = \Config\Services::request();
        $data['seg1'] = $request->uri->getSegment(1);
        $data['title'] = 'Sistem Pendukung Keputusan Dosen Terbaik - STMIK ANTARBANGSA';
        return view('admin/index', $data);
    }
}
