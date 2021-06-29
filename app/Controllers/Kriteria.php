<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    protected $kriteriamodel;

    public function __construct()
    {
        // cara konek db
        // $db = \Config\Database::connect();
        $this->kriteriamodel = new KriteriaModel();
    }
    public function index()
    {
        // $seg1 = $request->uri->getSegment(1);
        // $datadosen = $this->dosenModel->findAll();
        $data = [
            'title' =>   'ini data dosen',
            'kriteria' => $this->kriteriamodel->getKriteria(),
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('kriteria/index', $data);
    }
    public function subkriteria($slug)
    {
        $data = [
            'title' =>   'ini data kriteria detail',
            'subkriteria' => $this->kriteriamodel->getKriteria($slug),
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('kriteria/subkriteria', $data);
    }
    public function save()
    {
        $this->kriteriamodel->save([
            'kriteria' => $this->request->getVar('kriteria'),
            'peringkat' => $this->request->getVar('peringkat'),
            'bobot' => $this->request->getVar('bobot')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambah.');
        return redirect()->to('/kriteria');
    }
}
