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

        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        // $seg1 = $request->uri->getSegment(1);
        // $datadosen = $this->dosenModel->findAll();
        $data = [
            'title' =>   'Data Dosen',
            'dosen' => $this->dosenModel->getDataDosen(),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2)
        ];
        return view('dosen/index', $data);
    }

    public function detail($slug)
    {
        // $seg1 = $request->uri->getSegment(1);
        $data = [
            'title' =>   'Detail Data Dosen',
            'dosen' =>  $this->dosenModel->getDataDosen($slug),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),

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
            'validation' => \Config\Services::validation(),
            'seg2' => $this->request->uri->getSegment(2),
            'nidn' => $this->usersmodel->getDataUsers(),



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
                'prodi' => [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nidn harus di isi',
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
                // $nama =  url_title($this->request->getVar('nama'), '-', TRUE);
                $simpandata = [
                    'nidn' =>  $this->request->getVar('nidn'),
                    'nama' =>  $this->request->getVar('nama'),
                    'prodi' =>  $this->request->getVar('prodi'),
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
    }
    public function edit($nidn)
    {

        $data = [
            'title' =>   'Data Dosen',
            'dosen' => $this->dosenModel->getDataDosen($nidn),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),

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
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nama harus di isi'
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
                    'prodi' =>  $this->request->getVar('prodi'),
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
    public function penilaianDosen()
    {

        $data = [
            'title' =>   'Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'nilaidosen' => $this->dosenModel->getNilaiDosen(),
            'periode' => $this->periodemodel->getDataPeriode(),

        ];


        return view('dosen/penilaiandosen', $data);
    }
    public function tambahnilai($id_dosen)
    {


        $data = [
            'title' =>   'Tambah Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'dosen' => $this->dosenModel->getDataDosen($id_dosen),
            'subkriteria1' => $this->subkriteriamodel->getSubKriteria1(),
            'subkriteria2' => $this->subkriteriamodel->getSubKriteria2(),
            'periode' => $this->periodemodel->getDataPeriode(),


        ];
        // foreach ($data['subkriteria1'] as $row) {
        //     var_dump($row['bobot']);
        // }

        return view('dosen/tambahnilai', $data);
    }
    public function savepenilaian()
    {
        $subkriteria2 =  $this->subkriteriamodel->getSubKriteria2();
        $subbobotabdimas1 = $subkriteria2[0]['bobot'];
        $subbobotabdimas2 = $subkriteria2[1]['bobot'];
        $subbobotabdimas3 = $subkriteria2[2]['bobot'];
        $subkriteria3 =  $this->subkriteriamodel->getSubKriteria3();
        $subbobotKompetensi1 = $subkriteria3[0]['bobot'];
        $subbobotKompetensi2 = $subkriteria3[1]['bobot'];
        $subbobotKompetensi3 = $subkriteria3[2]['bobot'];
        $subbobotKompetensi4 = $subkriteria3[3]['bobot'];
        $subbobotKompetensi5 = $subkriteria3[4]['bobot'];

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'C1' => [
                    'rules' => 'required',
                    'label' => 'Penelitian Bermutu',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                    ]
                ],
                'C2' => [
                    'rules' => 'required|numeric',
                    'label' => 'Pengabdian Masyarakat',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                        'numeric' => '{field} harus berupa angka'
                    ]
                ],

                'C4' => [
                    'rules' => 'required',
                    'label' => 'Pendidikan',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'C5' => [
                    'rules' => 'required',
                    'label' => 'Lama Mengajar',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'C6' => [
                    'rules' => 'required',
                    'label' => 'Lama Mengajar',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'periode' => [
                    'rules' => 'required',
                    'label' => 'Periode',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'C1' => $validation->getError('C1'),
                        'C2' => $validation->getError('C2'),
                        'C3' => $validation->getError('C3'),
                        'C4' => $validation->getError('C4'),
                        'C5' => $validation->getError('C5'),
                        'C6' => $validation->getError('C6'),
                    ]
                ];
            } else {


                $simpandata = [
                    'id_dosen' => $this->request->getVar('id_dosen'),
                    'id_periode' => $this->request->getVar('periode'),
                    'C1' => $this->request->getVar('C1'),
                    'C2' =>  $this->request->getVar('C2'),
                    'C4' => $this->request->getVar('C4'),
                    'C5' => $this->request->getVar('C5'),
                    'C6' => $this->request->getVar('C6'),

                ];

                $this->nilaimodel->insert($simpandata);
                $msg = [
                    'sukses' => 'Penilaian berhasil ditambah',
                    'berhasil' => 'Sudah di nilai'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('data tidak ditemukan');
        }
    }
    public function editnilai($id_dosen)
    {

        $data = [
            'title' =>   'Edit Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'nilai' => $this->dosenModel->getDataNilaiDosen($id_dosen),
            'subkriteria1' => $this->subkriteriamodel->getSubKriteria1(),
            'subkriteria2' => $this->subkriteriamodel->getSubKriteria2(),
            'periode' => $this->periodemodel->getDataPeriode(),

        ];
        // foreach ($data['subkriteria1'] as $row) {
        //     var_dump($row['bobot']);
        //  
        return view('dosen/editnilai', $data);
    }
    public function editpenilaian()
    {

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'C1' => [
                    'rules' => 'required',
                    'label' => 'Penelitian Bermutu',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                    ]
                ],
                'C2' => [
                    'rules' => 'required|numeric',
                    'label' => 'Pengabdian Masyarakat',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                        'numeric' => '{field} harus berupa angka'
                    ]
                ],

                'C4' => [
                    'rules' => 'required',
                    'label' => 'Pendidikan',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'C5' => [
                    'rules' => 'required',
                    'label' => 'Lama Mengajar',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'C6' => [
                    'rules' => 'required',
                    'label' => 'Lama Mengajar',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'periode' => [
                    'rules' => 'required',
                    'label' => 'Periode',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'C1' => $validation->getError('C1'),
                        'C2' => $validation->getError('C2'),
                        'C4' => $validation->getError('C4'),
                        'C5' => $validation->getError('C5'),
                        'C6' => $validation->getError('C6'),
                    ]
                ];
            } else {


                $simpandata = [

                    'id_periode' => $this->request->getVar('periode'),
                    'C1' => $this->request->getVar('C1'),
                    'C2' =>  $this->request->getVar('C2'),
                    'C4' => $this->request->getVar('C4'),
                    'C5' => $this->request->getVar('C5'),
                    'C6' => $this->request->getVar('C6'),

                ];
                $id_nilai = $this->request->getVar('id_nilai');


                $this->nilaimodel->update($id_nilai, $simpandata);
                $msg = [
                    'sukses' => 'Penilaian berhasil di update',
                    'berhasil' => 'Sudah di nilai'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('data tidak ditemukan');
        }
    }
}
