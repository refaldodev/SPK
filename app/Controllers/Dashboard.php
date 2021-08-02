<?php

namespace App\Controllers;

use App\Models\DosenModel;


class Dashboard extends BaseController
{

    protected $dosenModel;

    public function __construct()
    {
        // cara konek db
        // $db = \Config\Database::connect();
        $this->dosenModel = new DosenModel();

        $this->db =  \Config\Database::connect();
    }
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
                'getdatadosen' => $this->dosenModel->getSudahNilaiDosen(),


            ];
        return view('dashboard/index', $data);
    }
    public function datajson()
    {
        $dosen =  $this->nilaimodel->getDataNilaiDosen();
        $tes = json_encode($dosen);
        return $tes;
    }
}
