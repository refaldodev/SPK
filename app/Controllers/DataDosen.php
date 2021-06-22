<?php

namespace App\Controllers;

use App\Models\DosenModel;

class DataDosen extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        // cara konek db
        // $db = \Config\Database::connect();
        $this->dosenModel = new DosenModel();
    }
    public function index()
    {

        $request = \Config\Services::request();
        $seg1 = $request->uri->getSegment(1);
        $datadosen = $this->dosenModel->findAll();
        $data = [
            'title' =>   'ini data dosen',
            'dosen' => $datadosen,
            'seg1' => $seg1

        ];
        return view('data/dosen', $data);
    }
}
