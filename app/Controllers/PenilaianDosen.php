<?php

namespace App\Controllers;

// use App\Models\KriteriaModel;

class PenilaianDosen extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
        ];
        return view('mahasiswa/penilaiandosen', $data);
    }
}
