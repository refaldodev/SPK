<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Kriteria extends BaseController
{
    public function __construct()
    {
    }
    public function index()
    {
        $data = [
            'title' => 'data kriteria',
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('kriteria/index', $data);
    }
}
