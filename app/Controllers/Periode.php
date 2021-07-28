<?php

namespace App\Controllers;



class Periode extends BaseController
{
    public function index()
    {
        $data = [
            'title' =>   'Periode',
            'periode' => $this->periodemodel->getDataPeriode(),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2)
        ];
        return view('periode/index', $data);
    }
    public function create()
    {
        $data = [
            'title' =>   'Tamnbah Periode',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2)
        ];
        return view('periode/create', $data);
    }
    public function save()
    {
        // validasi input
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'periode' => [
                    'rules' => 'required|is_unique[periode.periode]',
                    'label' => 'periode',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah terdaftar, silahkan ganti periode lain',

                    ]
                ],

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'periode' => $validation->getError('periode'),
                    ]
                ];
            } else {
                // $nama =  url_title($this->request->getVar('nama'), '-', TRUE);
                $simpandata = [
                    'periode' =>  $this->request->getVar('periode'),

                ];
                $this->periodemodel->insert($simpandata);
                $msg = [
                    'sukses' => 'data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
    public function edit($id)
    {
        $data = [
            'title' =>   'Edit Periode',
            'periode' => $this->periodemodel->getDataPeriode($id),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2)
        ];
        return view('periode/edit', $data);
    }

    public function update()
    {
        // validasi input
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'periode' => [
                    'rules' => 'required|is_unique[periode.periode]',
                    'label' => 'periode',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah terdaftar, silahkan ganti periode lain',
                    ]
                ],

            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'periode' => $validation->getError('periode'),
                    ]
                ];
            } else {
                // $nama =  url_title($this->request->getVar('nama'), '-', TRUE);
                $simpandata = [
                    'periode' =>  $this->request->getVar('periode'),

                ];
                $id = $this->request->getVar('id');
                $this->periodemodel->update($id, $simpandata);
                $msg = [
                    'sukses' => 'data berhasil diubah'
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
            $id = $this->request->getVar('id');
            $this->periodemodel->delete($id);
            $msg = [
                'sukses' => "data berhasil di hapus "

            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
}
