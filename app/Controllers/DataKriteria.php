<?php

namespace App\Controllers;


class DataKriteria extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Kriteria Penilaian',
            'datakriteria' => $this->datakriteria->getDataKriteria(),
            'kriteriaabdimas' => $this->kriteriabdimasamodel->getDataKriteriaAbdimas(),
            'kriteriakompetensi' => $this->kriteriakompetensimodel->getDataKompetensi(),
            'kriteriapendidikanmodel'  => $this->kriteriapendidikanmodel->getDataPendidikan(),
            'kriteriajabatanmodel' => $this->kriteriajabatanmodel->getDataJabatan(),
            'kriterialamamengajar' => $this->kriterialamamengajar->getDataLamaMengajar(),
            'seg1' => $this->request->uri->getSegment(1),
        ];
        return view('datakriteria/index', $data);
    }
}
