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
            'seg1' => $this->request->uri->getSegment(1),
            'validation' => \Config\Services::validation()

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
    public function create()
    {

        $data = [
            'title' => 'Tambah data Kriteria',
            'seg1' => $this->request->uri->getSegment(1),
            'validation' => \Config\Services::validation()

        ];
        return view('kriteria/create', $data);
    }
    public function save()
    {
        // validation
        if (!$this->validate([
            'kriteria' => [
                'rules' => 'required|is_unique[kriteria.kriteria]',
                'errors' => [
                    'required' => 'Kriteria harus di isi',
                    'is_unique' => 'Kriteria sudah terdaftar'
                ]
            ],
            'peringkat' => [
                'rules' => 'required|is_unique[kriteria.peringkat]',
                'errors' => [
                    'required' => 'Peringkat harus di isi',
                    'is_unique' => 'Kriteria sudah ada'
                ]
            ],
            'bobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bobot harus di isi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kriteria/create')->withInput()->with('validation', $validation);
            // return
        }
        $this->kriteriamodel->save([
            'kriteria' => $this->request->getVar('kriteria'),
            'peringkat' => $this->request->getVar('peringkat'),
            'bobot' => $this->request->getVar('bobot')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambah.');
        return redirect()->to('/kriteria');
    }
}
