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
        // jika datadosen tidak ada ditabel
        if (empty($data['dosen'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Dosen ' . $slug . ' tidak ditemukan');
        }
        return view('dosen/detail', $data);
        // d($data['dosen']['nama']);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah data',
            'seg1' => $this->request->uri->getSegment(1),
            'validation' => \Config\Services::validation()

        ];
        return view('dosen/create', $data);
    }
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[data_dosen.nama]',
                'errors' =>
                [
                    'required' => 'Nama harus di isi',
                    'is_unique' => 'Nama sudah terdaftar'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan harus di isi'
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan harus di isi'
                ]
            ],
            'asal_kampus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Kampus harus di isi'
                ]
            ],
            'program_studi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Program Studi harus di isi'
                ]
            ],
            'lama_mengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lama Mengajar harus di isi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/datadosen/create')->withInput()->with('validation', $validation);
        }

        $slug =  url_title($this->request->getVar('nama'), '-', TRUE);
        $this->dosenModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'jabatan' => $this->request->getVar('jabatan'),
            'lama_mengajar' => $this->request->getVar('lama_mengajar'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'program_studi' => $this->request->getVar('program_studi'),
            'asal_kampus' => $this->request->getVar('asal_kampus'),

        ]);
        // dd($data);
        session()->setFlashdata('pesan', 'Data berhasil di tambah.');

        return redirect()->to('/datadosen');
    }
}
