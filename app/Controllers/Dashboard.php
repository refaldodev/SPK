<?php

namespace App\Controllers;


class Dashboard extends BaseController
{

    public function index()
    {
        $nidn = session()->get('nidn');
        $data =
            [
                'title' => 'Dashboard',
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2),
                'jumlahpenilai' => $this->penilaianmodel->getJumlahPenilai($nidn),
                'jumlahdosen' => $this->penilaianmodel->getJumlahDosen(),
                'jumlahmahasiswa' => $this->penilaianmodel->getJumlahMahasiswa(),
                'jumlahadmin'  => $this->penilaianmodel->getJumlahAdmin(),
            ];

        return view('dashboard/index', $data);
    }
}
