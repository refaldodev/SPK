<?php

namespace App\Controllers;

class DataDosen extends BaseController
{

    public function index()
    {
        $data['title'] = 'ini data dosen';
        $request = \Config\Services::request();
        $data['seg1'] = $request->uri->getSegment(1);
        return view('data/dosen', $data);
    }
}
