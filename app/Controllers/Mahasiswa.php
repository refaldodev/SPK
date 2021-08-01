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
        $nidn =  session()->get('nidn');
        $data = [
            'title' =>   'Penilaian Dosen',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'nilaidosen' => $this->penilaianmodel->getNilai(),
            'cek' => $this->penilaianmodel->getPenilaian($nidn)
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
            $nidn =   $this->request->getVar('id_dosen');
            $data['nilaiakhirq15'] = $this->penilaianmodel->getPenilaian1($nidn, 5);
            $data['nilaiakhirq14'] = $this->penilaianmodel->getPenilaian1($nidn, 4);
            $data['nilaiakhirq13'] = $this->penilaianmodel->getPenilaian1($nidn, 3);
            $data['nilaiakhirq12'] = $this->penilaianmodel->getPenilaian1($nidn, 2);
            $data['nilaiakhirq11'] = $this->penilaianmodel->getPenilaian1($nidn, 1);
            $data['nilaiakhirq25'] = $this->penilaianmodel->getPenilaian2($nidn, 5);
            $data['nilaiakhirq24'] = $this->penilaianmodel->getPenilaian2($nidn, 4);
            $data['nilaiakhirq23'] = $this->penilaianmodel->getPenilaian2($nidn, 3);
            $data['nilaiakhirq22'] = $this->penilaianmodel->getPenilaian2($nidn, 2);
            $data['nilaiakhirq21'] = $this->penilaianmodel->getPenilaian2($nidn, 1);
            $data['nilaiakhirq35'] = $this->penilaianmodel->getPenilaian3($nidn, 5);
            $data['nilaiakhirq34'] = $this->penilaianmodel->getPenilaian3($nidn, 4);
            $data['nilaiakhirq33'] = $this->penilaianmodel->getPenilaian3($nidn, 3);
            $data['nilaiakhirq32'] = $this->penilaianmodel->getPenilaian3($nidn, 2);
            $data['nilaiakhirq31'] = $this->penilaianmodel->getPenilaian3($nidn, 1);
            $data['nilaiakhirq45'] = $this->penilaianmodel->getPenilaian4($nidn, 5);
            $data['nilaiakhirq44'] = $this->penilaianmodel->getPenilaian4($nidn, 4);
            $data['nilaiakhirq43'] = $this->penilaianmodel->getPenilaian4($nidn, 3);
            $data['nilaiakhirq42'] = $this->penilaianmodel->getPenilaian4($nidn, 2);
            $data['nilaiakhirq41'] = $this->penilaianmodel->getPenilaian4($nidn, 1);
            $data['nilaiakhirq51'] = $this->penilaianmodel->getPenilaian4($nidn, 1);
            $data['nilaiakhirq55'] = $this->penilaianmodel->getPenilaian5($nidn, 5);
            $data['nilaiakhirq54'] = $this->penilaianmodel->getPenilaian5($nidn, 4);
            $data['nilaiakhirq53'] = $this->penilaianmodel->getPenilaian5($nidn, 3);
            $data['nilaiakhirq52'] = $this->penilaianmodel->getPenilaian5($nidn, 2);
            $data['nilaiakhirq51'] = $this->penilaianmodel->getPenilaian5($nidn, 1);
            $data['nilaiakhirq65'] = $this->penilaianmodel->getPenilaian6($nidn, 5);
            $data['nilaiakhirq64'] = $this->penilaianmodel->getPenilaian6($nidn, 4);
            $data['nilaiakhirq63'] = $this->penilaianmodel->getPenilaian6($nidn, 3);
            $data['nilaiakhirq62'] = $this->penilaianmodel->getPenilaian6($nidn, 2);
            $data['nilaiakhirq61'] = $this->penilaianmodel->getPenilaian6($nidn, 1);
            $data['nilaiakhirq75'] = $this->penilaianmodel->getPenilaian7($nidn, 5);
            $data['nilaiakhirq74'] = $this->penilaianmodel->getPenilaian7($nidn, 4);
            $data['nilaiakhirq73'] = $this->penilaianmodel->getPenilaian7($nidn, 3);
            $data['nilaiakhirq72'] = $this->penilaianmodel->getPenilaian7($nidn, 2);
            $data['nilaiakhirq71'] = $this->penilaianmodel->getPenilaian7($nidn, 1);
            $data['nilaiakhirq85'] = $this->penilaianmodel->getPenilaian8($nidn, 5);
            $data['nilaiakhirq84'] = $this->penilaianmodel->getPenilaian8($nidn, 4);
            $data['nilaiakhirq83'] = $this->penilaianmodel->getPenilaian8($nidn, 3);
            $data['nilaiakhirq82'] = $this->penilaianmodel->getPenilaian8($nidn, 2);
            $data['nilaiakhirq81'] = $this->penilaianmodel->getPenilaian8($nidn, 2);
            $data['nilaiakhirq91'] = $this->penilaianmodel->getPenilaian9($nidn, 1);
            $data['nilaiakhirq95'] = $this->penilaianmodel->getPenilaian9($nidn, 5);
            $data['nilaiakhirq94'] = $this->penilaianmodel->getPenilaian9($nidn, 4);
            $data['nilaiakhirq93'] = $this->penilaianmodel->getPenilaian9($nidn, 3);
            $data['nilaiakhirq92'] = $this->penilaianmodel->getPenilaian9($nidn, 2);
            $data['nilaiakhirq101'] = $this->penilaianmodel->getPenilaian9($nidn, 1);
            $data['nilaiakhirq105'] = $this->penilaianmodel->getPenilaian10($nidn, 5);
            $data['nilaiakhirq104'] = $this->penilaianmodel->getPenilaian10($nidn, 4);
            $data['nilaiakhirq103'] = $this->penilaianmodel->getPenilaian10($nidn, 3);
            $data['nilaiakhirq102'] = $this->penilaianmodel->getPenilaian10($nidn, 2);
            $data['nilaiakhirq101'] = $this->penilaianmodel->getPenilaian10($nidn, 1);
            $totalq15 = 0;
            $totalq14 = 0;
            $totalq13 = 0;
            $totalq12 = 0;
            $totalq11 = 0;
            $totalq25 = 0;
            $totalq24 = 0;
            $totalq23 = 0;
            $totalq22 = 0;
            $totalq21 = 0;
            $totalq35 = 0;
            $totalq34 = 0;
            $totalq33 = 0;
            $totalq32 = 0;
            $totalq31 = 0;
            $totalq45 = 0;
            $totalq44 = 0;
            $totalq43 = 0;
            $totalq42 = 0;
            $totalq41 = 0;
            $totalq55 = 0;
            $totalq54 = 0;
            $totalq53 = 0;
            $totalq52 = 0;
            $totalq51 = 0;
            $totalq65 = 0;
            $totalq64 = 0;
            $totalq63 = 0;
            $totalq62 = 0;
            $totalq61 = 0;
            $totalq75 = 0;
            $totalq74 = 0;
            $totalq73 = 0;
            $totalq72 = 0;
            $totalq71 = 0;
            $totalq85 = 0;
            $totalq84 = 0;
            $totalq83 = 0;
            $totalq82 = 0;
            $totalq81 = 0;
            $totalq95 = 0;
            $totalq94 = 0;
            $totalq93 = 0;
            $totalq92 = 0;
            $totalq91 = 0;
            $totalq105 = 0;
            $totalq104 = 0;
            $totalq103 = 0;
            $totalq102 = 0;
            $totalq101 = 0;
            foreach ($data['nilaiakhirq15'] as $row) {
                $update = $row['question1'];
                $totalq15 += $update;
            }

            foreach ($data['nilaiakhirq14'] as $rowq14) {
                $updateq14 = $rowq14['question1'];
                $totalq14 += $updateq14;
            }
            foreach ($data['nilaiakhirq13'] as $rowq13) {
                $updateq13 = $rowq13['question1'];
                $totalq13 += $updateq13;
            }
            foreach ($data['nilaiakhirq12'] as $rowq12) {
                $updateq12 = $rowq12['question1'];
                $totalq12 += $updateq12;
            }
            foreach ($data['nilaiakhirq11'] as $rowq11) {
                $updateq11 = $rowq11['question1'];
                $totalq11 += $updateq11;
            }


            // question 2
            foreach ($data['nilaiakhirq25'] as $row) {
                $update = $row['question2'];
                $totalq25 += $update;
            }

            foreach ($data['nilaiakhirq24'] as $row) {
                $update = $row['question2'];
                $totalq24 += $update;
            }

            foreach ($data['nilaiakhirq23'] as $row) {
                $update = $row['question2'];
                $totalq23 += $update;
            }

            foreach ($data['nilaiakhirq22'] as $row) {
                $update = $row['question2'];
                $totalq22 += $update;
            }

            foreach ($data['nilaiakhirq21'] as $row) {
                $update = $row['question2'];
                $totalq21 += $update;
            }


            //question3
            foreach ($data['nilaiakhirq35'] as $row) {
                $update = $row['question3'];
                $totalq35 += $update;
            }

            foreach ($data['nilaiakhirq34'] as $row) {
                $update = $row['question3'];
                $totalq34 += $update;
            }

            foreach ($data['nilaiakhirq33'] as $row) {
                $update = $row['question3'];
                $totalq33 += $update;
            }

            foreach ($data['nilaiakhirq32'] as $row) {
                $update = $row['question3'];
                $totalq32 += $update;
            }
            foreach ($data['nilaiakhirq31'] as $row) {
                $update = $row['question3'];
                $totalq31 += $update;
            }


            // question4
            foreach ($data['nilaiakhirq45'] as $row) {
                $update = $row['question4'];
                $totalq45 += $update;
            }

            foreach ($data['nilaiakhirq44'] as $row) {
                $update = $row['question4'];
                $totalq44 += $update;
            }
            foreach ($data['nilaiakhirq43'] as $row) {
                $update = $row['question4'];
                $totalq43 += $update;
            }

            foreach ($data['nilaiakhirq42'] as $row) {
                $update = $row['question4'];
                $totalq42 += $update;
            }

            foreach ($data['nilaiakhirq41'] as $row) {
                $update = $row['question4'];
                $totalq41 += $update;
            }


            // question 5

            foreach ($data['nilaiakhirq55'] as $row) {
                $update = $row['question5'];
                $totalq55 += $update;
            }
            foreach ($data['nilaiakhirq54'] as $row) {
                $update = $row['question5'];
                $totalq54 += $update;
            }
            // var_dump($totalq54);
            foreach ($data['nilaiakhirq53'] as $row) {
                $update = $row['question5'];
                $totalq53 += $update;
            }

            foreach ($data['nilaiakhirq52'] as $row) {
                $update = $row['question5'];
                $totalq52 += $update;
            }

            foreach ($data['nilaiakhirq51'] as $row) {
                $update = $row['question5'];
                $totalq51 += $update;
            }


            // question 6

            foreach ($data['nilaiakhirq65'] as $row) {
                $update = $row['question6'];
                $totalq65 += $update;
            }

            foreach ($data['nilaiakhirq64'] as $row) {
                $update = $row['question6'];
                $totalq64 += $update;
            }
            // var_dump($totalq64);
            foreach ($data['nilaiakhirq63'] as $row) {
                $update = $row['question6'];
                $totalq63 += $update;
            }

            foreach ($data['nilaiakhirq62'] as $row) {
                $update = $row['question6'];
                $totalq62 += $update;
            }

            foreach ($data['nilaiakhirq61'] as $row) {
                $update = $row['question6'];
                $totalq61 += $update;
            }

            // question 7

            foreach ($data['nilaiakhirq75'] as $row) {
                $update = $row['question7'];
                $totalq75 += $update;
            }

            foreach ($data['nilaiakhirq74'] as $row) {
                $update = $row['question7'];
                $totalq74 += $update;
            }
            // var_dump($totalq74);
            foreach ($data['nilaiakhirq73'] as $row) {
                $update = $row['question7'];
                $totalq73 += $update;
            }

            foreach ($data['nilaiakhirq72'] as $row) {
                $update = $row['question7'];
                $totalq72 += $update;
            }

            foreach ($data['nilaiakhirq71'] as $row) {
                $update = $row['question7'];
                $totalq71 += $update;
            }


            // question 8

            foreach ($data['nilaiakhirq85'] as $row) {
                $update = $row['question8'];
                $totalq85 += $update;
            }

            foreach ($data['nilaiakhirq84'] as $row) {
                $update = $row['question8'];
                $totalq84 += $update;
            }
            // var_dump($totalq84);
            foreach ($data['nilaiakhirq83'] as $row) {
                $update = $row['question8'];
                $totalq83 += $update;
            }

            foreach ($data['nilaiakhirq82'] as $row) {
                $update = $row['question8'];
                $totalq82 += $update;
            }

            foreach ($data['nilaiakhirq81'] as $row) {
                $update = $row['question8'];
                $totalq81 += $update;
            }


            // question 9 


            foreach ($data['nilaiakhirq95'] as $row) {
                $update = $row['question9'];
                $totalq95 += $update;
            }

            foreach ($data['nilaiakhirq94'] as $row) {
                $update = $row['question9'];
                $totalq94 += $update;
            }
            // var_dump($totalq94);
            foreach ($data['nilaiakhirq93'] as $row) {
                $update = $row['question9'];
                $totalq93 += $update;
            }

            foreach ($data['nilaiakhirq92'] as $row) {
                $update = $row['question9'];
                $totalq92 += $update;
            }

            foreach ($data['nilaiakhirq91'] as $row) {
                $update = $row['question9'];
                $totalq91 += $update;
            }


            // question 10

            foreach ($data['nilaiakhirq105'] as $row) {
                $update = $row['question10'];
                $totalq105 += $update;
            }

            foreach ($data['nilaiakhirq104'] as $row) {
                $update = $row['question10'];
                $totalq104 += $update;
            }
            foreach ($data['nilaiakhirq103'] as $row) {
                $update = $row['question10'];
                $totalq103 += $update;
            }

            foreach ($data['nilaiakhirq102'] as $row) {
                $update = $row['question10'];
                $totalq102 += $update;
            }

            foreach ($data['nilaiakhirq101'] as $row) {
                $update = $row['question10'];
                $totalq101 += $update;
            }
            $nilaiakhir5 = ($totalq15 + $totalq25 + $totalq35 + $totalq45 + $totalq55 + $totalq65 + $totalq75 + $totalq85  + $totalq95 + $totalq105);
            $nilaiakhir4 = ($totalq14 + $totalq24 + $totalq34 + $totalq44 + $totalq54 + $totalq64 + $totalq74 + $totalq84  + $totalq94 + $totalq104);
            $nilaiakhir3 = ($totalq13 + $totalq23 + $totalq33 + $totalq43 + $totalq53 + $totalq63 + $totalq73 + $totalq83  + $totalq93 + $totalq103);
            $nilaiakhir2 = ($totalq12 + $totalq22 + $totalq32 + $totalq42 + $totalq52 + $totalq62 + $totalq72 + $totalq82  + $totalq92 + $totalq102);
            $nilaiakhir1 = ($totalq11 + $totalq21 + $totalq31 + $totalq41 + $totalq51 + $totalq61 + $totalq71 + $totalq81  + $totalq91 + $totalq101);

            $value = (($nilaiakhir5 * 5) + ($nilaiakhir4 * 4) + ($nilaiakhir3 * 3) + ($nilaiakhir2 * 2) + ($nilaiakhir1 * 1)) / (100);
            $result = 0;
            if ($value > 4.1) {
                $result += 0.46;
            } else if ($value < 4.1 && $value >= 3.1) {
                $result += 0.26;
            } else if ($value < 3.1 && $value >= 2.1) {
                $result += 0.16;
            } else if ($value < 2.1 && $value >= 1.1) {
                $result += 0.09;
            } else {
                $result += 0.04;
            }
            $hasil = [
                'C3' => $result
            ];
            $this->nilaimodel->update($id, $hasil);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function insertData($nidn = 1744390001)
    {
        $data['nilaiakhirq15'] = $this->penilaianmodel->getPenilaian1($nidn, 5);
        $data['nilaiakhirq14'] = $this->penilaianmodel->getPenilaian1($nidn, 4);
        $data['nilaiakhirq13'] = $this->penilaianmodel->getPenilaian1($nidn, 3);
        $data['nilaiakhirq12'] = $this->penilaianmodel->getPenilaian1($nidn, 2);
        $data['nilaiakhirq11'] = $this->penilaianmodel->getPenilaian1($nidn, 1);
        $data['nilaiakhirq25'] = $this->penilaianmodel->getPenilaian2($nidn, 5);
        $data['nilaiakhirq24'] = $this->penilaianmodel->getPenilaian2($nidn, 4);
        $data['nilaiakhirq23'] = $this->penilaianmodel->getPenilaian2($nidn, 3);
        $data['nilaiakhirq22'] = $this->penilaianmodel->getPenilaian2($nidn, 2);
        $data['nilaiakhirq21'] = $this->penilaianmodel->getPenilaian2($nidn, 1);
        $data['nilaiakhirq35'] = $this->penilaianmodel->getPenilaian3($nidn, 5);
        $data['nilaiakhirq34'] = $this->penilaianmodel->getPenilaian3($nidn, 4);
        $data['nilaiakhirq33'] = $this->penilaianmodel->getPenilaian3($nidn, 3);
        $data['nilaiakhirq32'] = $this->penilaianmodel->getPenilaian3($nidn, 2);
        $data['nilaiakhirq31'] = $this->penilaianmodel->getPenilaian3($nidn, 1);
        $data['nilaiakhirq45'] = $this->penilaianmodel->getPenilaian4($nidn, 5);
        $data['nilaiakhirq44'] = $this->penilaianmodel->getPenilaian4($nidn, 4);
        $data['nilaiakhirq43'] = $this->penilaianmodel->getPenilaian4($nidn, 3);
        $data['nilaiakhirq42'] = $this->penilaianmodel->getPenilaian4($nidn, 2);
        $data['nilaiakhirq41'] = $this->penilaianmodel->getPenilaian4($nidn, 1);
        $data['nilaiakhirq51'] = $this->penilaianmodel->getPenilaian4($nidn, 1);
        $data['nilaiakhirq55'] = $this->penilaianmodel->getPenilaian5($nidn, 5);
        $data['nilaiakhirq54'] = $this->penilaianmodel->getPenilaian5($nidn, 4);
        $data['nilaiakhirq53'] = $this->penilaianmodel->getPenilaian5($nidn, 3);
        $data['nilaiakhirq52'] = $this->penilaianmodel->getPenilaian5($nidn, 2);
        $data['nilaiakhirq51'] = $this->penilaianmodel->getPenilaian5($nidn, 1);
        $data['nilaiakhirq65'] = $this->penilaianmodel->getPenilaian6($nidn, 5);
        $data['nilaiakhirq64'] = $this->penilaianmodel->getPenilaian6($nidn, 4);
        $data['nilaiakhirq63'] = $this->penilaianmodel->getPenilaian6($nidn, 3);
        $data['nilaiakhirq62'] = $this->penilaianmodel->getPenilaian6($nidn, 2);
        $data['nilaiakhirq61'] = $this->penilaianmodel->getPenilaian6($nidn, 1);
        $data['nilaiakhirq75'] = $this->penilaianmodel->getPenilaian7($nidn, 5);
        $data['nilaiakhirq74'] = $this->penilaianmodel->getPenilaian7($nidn, 4);
        $data['nilaiakhirq73'] = $this->penilaianmodel->getPenilaian7($nidn, 3);
        $data['nilaiakhirq72'] = $this->penilaianmodel->getPenilaian7($nidn, 2);
        $data['nilaiakhirq71'] = $this->penilaianmodel->getPenilaian7($nidn, 1);
        $data['nilaiakhirq85'] = $this->penilaianmodel->getPenilaian8($nidn, 5);
        $data['nilaiakhirq84'] = $this->penilaianmodel->getPenilaian8($nidn, 4);
        $data['nilaiakhirq83'] = $this->penilaianmodel->getPenilaian8($nidn, 3);
        $data['nilaiakhirq82'] = $this->penilaianmodel->getPenilaian8($nidn, 2);
        $data['nilaiakhirq81'] = $this->penilaianmodel->getPenilaian8($nidn, 2);
        $data['nilaiakhirq91'] = $this->penilaianmodel->getPenilaian9($nidn, 1);
        $data['nilaiakhirq95'] = $this->penilaianmodel->getPenilaian9($nidn, 5);
        $data['nilaiakhirq94'] = $this->penilaianmodel->getPenilaian9($nidn, 4);
        $data['nilaiakhirq93'] = $this->penilaianmodel->getPenilaian9($nidn, 3);
        $data['nilaiakhirq92'] = $this->penilaianmodel->getPenilaian9($nidn, 2);
        $data['nilaiakhirq101'] = $this->penilaianmodel->getPenilaian9($nidn, 1);
        $data['nilaiakhirq105'] = $this->penilaianmodel->getPenilaian10($nidn, 5);
        $data['nilaiakhirq104'] = $this->penilaianmodel->getPenilaian10($nidn, 4);
        $data['nilaiakhirq103'] = $this->penilaianmodel->getPenilaian10($nidn, 3);
        $data['nilaiakhirq102'] = $this->penilaianmodel->getPenilaian10($nidn, 2);
        $data['nilaiakhirq101'] = $this->penilaianmodel->getPenilaian10($nidn, 1);
        $totalq15 = 0;
        $totalq14 = 0;
        $totalq13 = 0;
        $totalq12 = 0;
        $totalq11 = 0;
        $totalq25 = 0;
        $totalq24 = 0;
        $totalq23 = 0;
        $totalq22 = 0;
        $totalq21 = 0;
        $totalq35 = 0;
        $totalq34 = 0;
        $totalq33 = 0;
        $totalq32 = 0;
        $totalq31 = 0;
        $totalq45 = 0;
        $totalq44 = 0;
        $totalq43 = 0;
        $totalq42 = 0;
        $totalq41 = 0;
        $totalq55 = 0;
        $totalq54 = 0;
        $totalq53 = 0;
        $totalq52 = 0;
        $totalq51 = 0;
        $totalq65 = 0;
        $totalq64 = 0;
        $totalq63 = 0;
        $totalq62 = 0;
        $totalq61 = 0;
        $totalq75 = 0;
        $totalq74 = 0;
        $totalq73 = 0;
        $totalq72 = 0;
        $totalq71 = 0;
        $totalq85 = 0;
        $totalq84 = 0;
        $totalq83 = 0;
        $totalq82 = 0;
        $totalq81 = 0;
        $totalq95 = 0;
        $totalq94 = 0;
        $totalq93 = 0;
        $totalq92 = 0;
        $totalq91 = 0;
        $totalq105 = 0;
        $totalq104 = 0;
        $totalq103 = 0;
        $totalq102 = 0;
        $totalq101 = 0;
        foreach ($data['nilaiakhirq15'] as $row) {
            $update = $row['question1'];
            $totalq15 += $update;
        }

        foreach ($data['nilaiakhirq14'] as $rowq14) {
            $updateq14 = $rowq14['question1'];
            $totalq14 += $updateq14;
        }
        foreach ($data['nilaiakhirq13'] as $rowq13) {
            $updateq13 = $rowq13['question1'];
            $totalq13 += $updateq13;
        }
        foreach ($data['nilaiakhirq12'] as $rowq12) {
            $updateq12 = $rowq12['question1'];
            $totalq12 += $updateq12;
        }
        foreach ($data['nilaiakhirq11'] as $rowq11) {
            $updateq11 = $rowq11['question1'];
            $totalq11 += $updateq11;
        }


        // question 2
        foreach ($data['nilaiakhirq25'] as $row) {
            $update = $row['question2'];
            $totalq25 += $update;
        }

        foreach ($data['nilaiakhirq24'] as $row) {
            $update = $row['question2'];
            $totalq24 += $update;
        }

        foreach ($data['nilaiakhirq23'] as $row) {
            $update = $row['question2'];
            $totalq23 += $update;
        }

        foreach ($data['nilaiakhirq22'] as $row) {
            $update = $row['question2'];
            $totalq22 += $update;
        }

        foreach ($data['nilaiakhirq21'] as $row) {
            $update = $row['question2'];
            $totalq21 += $update;
        }


        //question3
        foreach ($data['nilaiakhirq35'] as $row) {
            $update = $row['question3'];
            $totalq35 += $update;
        }

        foreach ($data['nilaiakhirq34'] as $row) {
            $update = $row['question3'];
            $totalq34 += $update;
        }

        foreach ($data['nilaiakhirq33'] as $row) {
            $update = $row['question3'];
            $totalq33 += $update;
        }

        foreach ($data['nilaiakhirq32'] as $row) {
            $update = $row['question3'];
            $totalq32 += $update;
        }
        foreach ($data['nilaiakhirq31'] as $row) {
            $update = $row['question3'];
            $totalq31 += $update;
        }


        // question4
        foreach ($data['nilaiakhirq45'] as $row) {
            $update = $row['question4'];
            $totalq45 += $update;
        }

        foreach ($data['nilaiakhirq44'] as $row) {
            $update = $row['question4'];
            $totalq44 += $update;
        }
        foreach ($data['nilaiakhirq43'] as $row) {
            $update = $row['question4'];
            $totalq43 += $update;
        }

        foreach ($data['nilaiakhirq42'] as $row) {
            $update = $row['question4'];
            $totalq42 += $update;
        }

        foreach ($data['nilaiakhirq41'] as $row) {
            $update = $row['question4'];
            $totalq41 += $update;
        }


        // question 5

        foreach ($data['nilaiakhirq55'] as $row) {
            $update = $row['question5'];
            $totalq55 += $update;
        }
        foreach ($data['nilaiakhirq54'] as $row) {
            $update = $row['question5'];
            $totalq54 += $update;
        }
        // var_dump($totalq54);
        foreach ($data['nilaiakhirq53'] as $row) {
            $update = $row['question5'];
            $totalq53 += $update;
        }

        foreach ($data['nilaiakhirq52'] as $row) {
            $update = $row['question5'];
            $totalq52 += $update;
        }

        foreach ($data['nilaiakhirq51'] as $row) {
            $update = $row['question5'];
            $totalq51 += $update;
        }


        // question 6

        foreach ($data['nilaiakhirq65'] as $row) {
            $update = $row['question6'];
            $totalq65 += $update;
        }

        foreach ($data['nilaiakhirq64'] as $row) {
            $update = $row['question6'];
            $totalq64 += $update;
        }
        // var_dump($totalq64);
        foreach ($data['nilaiakhirq63'] as $row) {
            $update = $row['question6'];
            $totalq63 += $update;
        }

        foreach ($data['nilaiakhirq62'] as $row) {
            $update = $row['question6'];
            $totalq62 += $update;
        }

        foreach ($data['nilaiakhirq61'] as $row) {
            $update = $row['question6'];
            $totalq61 += $update;
        }

        // question 7

        foreach ($data['nilaiakhirq75'] as $row) {
            $update = $row['question7'];
            $totalq75 += $update;
        }

        foreach ($data['nilaiakhirq74'] as $row) {
            $update = $row['question7'];
            $totalq74 += $update;
        }
        // var_dump($totalq74);
        foreach ($data['nilaiakhirq73'] as $row) {
            $update = $row['question7'];
            $totalq73 += $update;
        }

        foreach ($data['nilaiakhirq72'] as $row) {
            $update = $row['question7'];
            $totalq72 += $update;
        }

        foreach ($data['nilaiakhirq71'] as $row) {
            $update = $row['question7'];
            $totalq71 += $update;
        }


        // question 8

        foreach ($data['nilaiakhirq85'] as $row) {
            $update = $row['question8'];
            $totalq85 += $update;
        }

        foreach ($data['nilaiakhirq84'] as $row) {
            $update = $row['question8'];
            $totalq84 += $update;
        }
        // var_dump($totalq84);
        foreach ($data['nilaiakhirq83'] as $row) {
            $update = $row['question8'];
            $totalq83 += $update;
        }

        foreach ($data['nilaiakhirq82'] as $row) {
            $update = $row['question8'];
            $totalq82 += $update;
        }

        foreach ($data['nilaiakhirq81'] as $row) {
            $update = $row['question8'];
            $totalq81 += $update;
        }


        // question 9 


        foreach ($data['nilaiakhirq95'] as $row) {
            $update = $row['question9'];
            $totalq95 += $update;
        }

        foreach ($data['nilaiakhirq94'] as $row) {
            $update = $row['question9'];
            $totalq94 += $update;
        }
        // var_dump($totalq94);
        foreach ($data['nilaiakhirq93'] as $row) {
            $update = $row['question9'];
            $totalq93 += $update;
        }

        foreach ($data['nilaiakhirq92'] as $row) {
            $update = $row['question9'];
            $totalq92 += $update;
        }

        foreach ($data['nilaiakhirq91'] as $row) {
            $update = $row['question9'];
            $totalq91 += $update;
        }


        // question 10

        foreach ($data['nilaiakhirq105'] as $row) {
            $update = $row['question10'];
            $totalq105 += $update;
        }

        foreach ($data['nilaiakhirq104'] as $row) {
            $update = $row['question10'];
            $totalq104 += $update;
        }
        foreach ($data['nilaiakhirq103'] as $row) {
            $update = $row['question10'];
            $totalq103 += $update;
        }

        foreach ($data['nilaiakhirq102'] as $row) {
            $update = $row['question10'];
            $totalq102 += $update;
        }

        foreach ($data['nilaiakhirq101'] as $row) {
            $update = $row['question10'];
            $totalq101 += $update;
        }
        $nilaiakhir5 = ($totalq15 + $totalq25 + $totalq35 + $totalq45 + $totalq55 + $totalq65 + $totalq75 + $totalq85  + $totalq95 + $totalq105);
        $nilaiakhir4 = ($totalq14 + $totalq24 + $totalq34 + $totalq44 + $totalq54 + $totalq64 + $totalq74 + $totalq84  + $totalq94 + $totalq104);
        $nilaiakhir3 = ($totalq13 + $totalq23 + $totalq33 + $totalq43 + $totalq53 + $totalq63 + $totalq73 + $totalq83  + $totalq93 + $totalq103);
        $nilaiakhir2 = ($totalq12 + $totalq22 + $totalq32 + $totalq42 + $totalq52 + $totalq62 + $totalq72 + $totalq82  + $totalq92 + $totalq102);
        $nilaiakhir1 = ($totalq11 + $totalq21 + $totalq31 + $totalq41 + $totalq51 + $totalq61 + $totalq71 + $totalq81  + $totalq91 + $totalq101);

        $value = ((100  * 5) + (0 * 4) + (0 * 3) + (0 * 2) + (0 * 1)) / (100);
        echo $value;
        $result = 0;
        if ($value > 4.1) {
            $result += 0.46;
        } else if ($value < 4.1 && $value >= 3.1) {
            $result += 0.26;
        } else if ($value < 3.1 && $value >= 2.1) {
            $result += 0.16;
        } else if ($value < 2.1 && $value >= 1.1) {
            $result += 0.09;
        } else {
            $result += 0.04;
        }
        echo '<br>';
        echo $result;
    }
}
