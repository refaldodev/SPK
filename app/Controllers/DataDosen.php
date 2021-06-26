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
        // $seg1 = $request->uri->getSegment(1);
        // $datadosen = $this->dosenModel->findAll();
        $data = [
            'title' =>   'ini data dosen',
            'dosen' => $this->dosenModel->getDosen(),
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('dosen/index', $data);
    }
    public function detail($slug)
    {
        // $seg1 = $request->uri->getSegment(1);
        $data = [
            'title' =>   'Detail Data Dosen',
            'dosen' =>  $this->dosenModel->getDosen($slug),
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('dosen/detail', $data);
        // d($data['dosen']['nama']);
    }
}
