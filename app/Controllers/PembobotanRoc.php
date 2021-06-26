<?php

namespace App\Controllers;

class PembobotanRoc extends BaseController
{

    public function index()
    {
        $data['title'] = 'ini Pembobotan Roc';
        // $request = \Config\Services::request();
        $data['seg1'] = $this->request->uri->getSegment(1);
        return view('data/pembobotanRoc', $data);
    }
}
