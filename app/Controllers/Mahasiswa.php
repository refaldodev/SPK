<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;

class Mahasiswa extends BaseController
{
    // protected $mahasiswaModel;

    // public function __construct()
    // {
    //     $this->mahasiswaModel = new MahasiswaModel();
    // }
    public function __construct()
    {
        // cara konek db
        // $db = \Config\Database::connect();
        $this->dosenModel = new DosenModel();

        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        $tes = [
            'title' =>   'Data Mahasiswa',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),

        ];
        return view('mahasiswa/index', $tes);
    }

    public function ambildata()
    {
        if ($this->request->isAjax()) {
            $data = [
                'tampildata' =>  $this->mhs->findAll()
            ];
            $msg = [
                'data' => view('mahasiswa/datamahasiswa', $data)
            ];
            // dd($msg);
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function formtambah()
    {
        if ($this->request->isAjax()) {
            $msg = [
                'data' => view('mahasiswa/modaltambah')
            ];
            // dd($msg);
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function save()
    {
        if ($this->request->isAjax()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nim' => [
                    'label' => 'Nim',
                    'rules' => 'required|is_unique[mahasiswa.nim]',
                    'errors'  => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'jurusan' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nim' => $validation->getError('nim'),
                        'nama' => $validation->getError('nama'),
                        'jurusan' => $validation->getError('jurusan')
                    ]
                ];
            } else {
                $simpandata = [
                    'nim' => $this->request->getVar('nim'),
                    'nama' => $this->request->getVar('nama'),
                    'jurusan' => $this->request->getVar('jurusan')
                ];
                $mhs = new MahasiswaModel;
                $mhs->insert($simpandata);
                $msg = [
                    'sukses' => 'data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function formedit()
    {
        if ($this->request->isAjax()) {
            $nim = $this->request->getVar('nim');
            $mhs = new MahasiswaModel;
            $row = $mhs->find($nim);
            $data =  [
                'nim' => $row['nim'],
                'nama' => $row['nama'],
                'jurusan' => $row['jurusan']
            ];
            $msg = [
                'sukses' => view('mahasiswa/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function updatedata()
    {
        if ($this->request->isAjax()) {
            $validation = \Config\Services::validation();

            $simpandata = [
                'nama' => $this->request->getVar('nama'),
                'jurusan' => $this->request->getVar('jurusan')
            ];
            $nim = $this->request->getVar('nim');
            $this->mhs->update($nim, $simpandata);
            $msg = [
                'sukses' => 'data berhasil di ubah '
            ];

            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function hapus()
    {
        if ($this->request->isAjax()) {

            $nim = $this->request->getVar('nim');
            $this->mhs->delete($nim);
            $msg = [
                'sukses' => "data dengan nim $nim berhasil di hapus "
            ];

            echo json_encode($msg);
        }
    }
    public function nilai()
    {
        $data = [
            'title' =>   'Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'nilaidosen' => $this->penilaianmodel->getNilai(),

        ];
        return view('mahasiswa/nilai', $data);
    }
    public function penilaiandosen($id)
    {
        $data = [
            'title' => 'Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'nilaidosen' => $this->penilaianmodel->getNilai($id),
        ];
        return view('mahasiswa/penilaiandosen', $data);
    }

    public function savepenilaian()
    {
        if ($this->request->isAjax()) {

            // $masuk = [
            //     'C3' => $this->request->getVar('question1') + $this->request->getVar('question2') + $this->request->getVar('question3') + $this->request->getVar('question4') + $this->request->getVar('question5') + $this->request->getVar('question6') + $this->request->getVar('question7') + $this->request->getVar('question8') + $this->request->getVar('question9') + $this->request->getVar('question10'),
            // ];
            $simpandata = [
                'id_penilaian' =>   $this->request->getVar('id_nilai'),
                'id_mahasiswa' =>  $this->request->getVar('nidn'),
                'id_dosen' =>  $this->request->getVar('id_dosen'),
                'question1' => $this->request->getVar('question1'),
                'question2' => $this->request->getVar('question2'),
                'question3' => $this->request->getVar('question3'),
                'question4' => $this->request->getVar('question4'),
                'question5' => $this->request->getVar('question5'),
                'question6' => $this->request->getVar('question6'),
                'question7' => $this->request->getVar('question7'),
                'question8' => $this->request->getVar('question8'),
                'question9' => $this->request->getVar('question9'),
                'question10' => $this->request->getVar('question10'),
            ];
            // $this->nilaimodel->update($id, $masuk);


            $this->penilaianmodel->insert($simpandata);

            $msg = [
                'sukses' => 'data berhasil di tambah '
            ];
            echo json_encode($msg);

            $id =   $this->request->getVar('id_nilai');
            $id_dosen =   $this->request->getVar('id_dosen');
            $data['nilaiakhir'] = $this->penilaianmodel->getPenilaian($id_dosen);
            $total = 0;
            foreach ($data['nilaiakhir'] as $row) {



                $update = $row['question1'] + $row['question2'] + $row['question3'] + $row['question4'] + $row['question5'] + $row['question6'] + $row['question7'] + $row['question8'] +  $row['question9'] + $row['question10'];

                $total += $update;

                // $id =  81;
            }
            $hasil = [
                'C3' => $total
            ];
            $this->nilaimodel->update($id, $hasil);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function insertData()
    {
        $data['nilaiakhir'] = $this->penilaianmodel->getPenilaian(1744390003);
        $total = 0;
        foreach ($data['nilaiakhir'] as $row) {


            $update = $row['question1'] + $row['question2'] + $row['question3'] + $row['question4'] + $row['question5'] + $row['question6'] + $row['question7'] + $row['question8'] +  $row['question9'] + $row['question10'];
            $total += $update;

            // $id =  81;
            // $this->penilaianmodel->update($id, $update);
        }
        echo $total;
    }
}
