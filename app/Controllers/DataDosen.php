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
            'title' =>   'Data Dosen',
            'dosen' => $this->dosenModel->getDataDosen(),
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('dosen/index', $data);
    }

    public function detail($slug)
    {
        // $seg1 = $request->uri->getSegment(1);
        $data = [
            'title' =>   'Detail Data Dosen',
            'dosen' =>  $this->dosenModel->getDataDosen($slug),
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
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nidn' => [
                    'rules' => 'required|is_unique[dosen.nidn]|max_length[10]|numeric',
                    'errors' =>
                    [
                        'required' => 'Nidn harus di isi',
                        'is_unique' => 'Nidn sudah terdaftar',
                        'max_length' => 'Nidn Maksimal 10 karakter',
                        'numeric' => 'Nidn harus berupa angka'

                    ]
                ],
                'nama' => [
                    'rules' => 'required|is_unique[dosen.nama]',
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
                'jurusan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jurusan harus di isi'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nidn' => $validation->getError('nidn'),
                        'nama' => $validation->getError('nama'),
                        'jabatan' => $validation->getError('jabatan'),
                        'pendidikan' => $validation->getError('pendidikan'),

                        'jurusan' => $validation->getError('jurusan'),
                        'asal_kampus' => $validation->getError('asal_kampus'),
                    ]
                ];
            } else {
                $nama =  url_title($this->request->getVar('nama'), '-', TRUE);
                $simpandata = [
                    'nidn' =>  $this->request->getVar('nidn'),
                    'nama' =>  $nama,
                    'jabatan' => $this->request->getVar('jabatan'),
                    'pendidikan' => $this->request->getVar('pendidikan'),
                    'jurusan' => $this->request->getVar('jurusan'),
                    'asal_kampus' => $this->request->getVar('asal_kampus'),
                ];
                $this->dosenModel->insert($simpandata);
                $msg = [
                    'sukses' => 'data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
        // dd($data);
        // session()->setFlashdata('pesan', 'Data berhasil di tambah.');

        // return redirect()->to('/datadosen');
    }
    public function edit($nidn)
    {

        $data = [
            'title' =>   'Data Dosen',
            'dosen' => $this->dosenModel->getDataDosen($nidn),
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('dosen/edit', $data);
    }
    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nidn' => [
                    'rules' => 'max_length[10]|numeric',
                    'errors' =>
                    [
                        'max_length' => 'Nidn Maksimal 10 karakter',
                        'numeric' => 'Nidn harus berupa angka'

                    ]
                ],
                'nama' => [
                    'rules' => 'is_unique[dosen.nama]',
                    'errors' =>
                    [
                        'is_unique' => 'Nama sudah terdaftar'
                    ]
                ]

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nidn' => $validation->getError('nidn'),
                        'nama' => $validation->getError('nama'),
                    ]
                ];
            } else {
                $ubahdata = [
                    'nidn' =>  $this->request->getVar('nidn'),
                    'nama' =>  $this->request->getVar('nama'),
                    'jabatan' => $this->request->getVar('jabatan'),
                    'pendidikan' => $this->request->getVar('pendidikan'),
                    'jurusan' => $this->request->getVar('jurusan'),
                    'asal_kampus' => $this->request->getVar('asal_kampus'),
                ];
                $nidn = $this->request->getVar('nidnhidden');
                $this->dosenModel->update($nidn, $ubahdata);
                $msg = [
                    'sukses' => 'data berhasil di ubah'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function hapus()
    {
        if ($this->request->isAjax()) {
            $nidn = $this->request->getVar('nidn');
            $this->dosenModel->delete($nidn);
            $msg = [
                'sukses' => "data dengan berhasil di hapus "

            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
}
