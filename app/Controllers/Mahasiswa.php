<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    // protected $mahasiswaModel;

    // public function __construct()
    // {
    //     $this->mahasiswaModel = new MahasiswaModel();
    // }
    public function index()
    {
        $tes = [
            'title' =>   'ini data mahasiswa',
            'seg1' => $this->request->uri->getSegment(1)
        ];
        return view('mahasiswa/index', $tes);
    }

    public function ambildata()
    {
        if ($this->request->isAjax()) {
            $mhs = new MahasiswaModel;
            $data = [
                'tampildata' => $mhs->findAll()
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
}
