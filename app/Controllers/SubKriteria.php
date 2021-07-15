<?php

namespace App\Controllers;


class SubKriteria extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Kriteria Penilaian',
            'subkriteria' => $this->subkriteriamodel->getDataSubKriteria(),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2)

        ];
        return view('subkriteria/index', $data);
    }
    public function edit($id_kriteria)
    {
        $data = [
            'title' => 'Tambah Data Kriteria Penilaian',
            'subkriteria' => $this->subkriteriamodel->getDataSubKriteria($id_kriteria),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2)

        ];
        return view('subkriteria/edit', $data);
    }
    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'bobot' => [
                    'rules' => 'numeric',
                    'errors' =>
                    [
                        'numeric' => 'bobot harus berupa angka'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'bobot' => $validation->getError('bobot')
                    ]
                ];
            } else {
                $ubahdata = [
                    'subkriteria' => $this->request->getVar('subkriteria'),
                    'bobot' => $this->request->getVar('bobot')
                ];
                $id_subkriteria = $this->request->getVar('id_subkriteria');
                $this->subkriteriamodel->update($id_subkriteria, $ubahdata);
                $msg = [
                    'sukses' => 'data berhasi di Update'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('mohon maaf data tidak bisa');
        }
    }
}
