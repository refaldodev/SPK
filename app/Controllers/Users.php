<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Users extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Data User',
                'users' => $this->usersmodel->getDataUsers(),
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2)
            ];
        return view('users/index', $data);
    }
    public function create()
    {
        $data =
            [
                'title' => 'Tambah User',
                'users' => $this->usersmodel->getDataUsers(),
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2)
            ];
        return view('users/create', $data);
    }
    public function save()
    {

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nidn' => [
                    'rules' => 'required|is_unique[users.nidn]|max_length[10]|numeric',
                    'errors' =>
                    [
                        'required' => 'Nidn harus di isi',
                        'is_unique' => 'Nidn sudah terdaftar',
                        'max_length' => 'Nidn Maksimal 10 karakter',
                        'numeric' => 'Nidn harus berupa angka'

                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nama harus di isi',
                        'is_unique' => 'Nama sudah terdaftar'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'password harus di isi',
                        'min_length' => 'password minimal 5',
                    ]
                ],
                'password2' => [
                    'rules' => 'required|min_length[5]|matches[password]',
                    'errors' => [
                        'required' => 'password harus di isi',
                        'min_length' => 'password minimal 5',
                        'matches' => 'password tidak sesuai'
                    ]
                ],
                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'level harus di isi',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nidn' => $validation->getError('nidn'),
                        'nama' => $validation->getError('nama'),
                        'password' => $validation->getError('password'),
                        'password2' => $validation->getError('password2'),
                        'level' => $validation->getError('level'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nidn' =>  $this->request->getVar('nidn'),
                    'nama' =>  $this->request->getVar('nama'),
                    'password' =>  sha1($this->request->getVar('password')),
                    'level' => $this->request->getVar('level'),
                ];
                $this->usersmodel->insert($simpandata);
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
        $query = $this->usersmodel->getDataUsers($nidn);
        if ($query > 0) {
            $data =
                [
                    'title' => 'Edit User',
                    'users' => $this->usersmodel->getDataUsers($nidn),
                    'seg1' => $this->request->uri->getSegment(1),
                    'seg2' => $this->request->uri->getSegment(2)
                ];
            return view('users/edit', $data);
        } else {
            echo "<script>alert('data tidak ditemukan');";
            echo "window.location='" . site_url('users') . "'; 
            </script>";
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid['password']  = $validation->setRule('password', 'password', 'min_length[5]');

            $valid = $this->validate([
                'nidn' => [
                    'rules' => 'required|max_length[10]|numeric',
                    'errors' =>
                    [
                        'required' => 'Nidn harus di isi',
                        'max_length' => 'Nidn Maksimal 10 karakter',
                        'numeric' => 'Nidn harus berupa angka'

                    ]
                ],

                'nama' => [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nama harus di isi',
                        'is_unique' => 'Nama sudah terdaftar'
                    ]
                ],



            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nidn' => $validation->getError('nidn'),
                        'nama' => $validation->getError('nama'),
                        'password' => $validation->getError('password'),
                    ]
                ];
            } else {
                $ubahdata['nidn'] = $this->request->getVar('nidn');
                $ubahdata['nama'] = $this->request->getVar('nama');
                if (!empty($this->request->getVar('password'))) {
                    $ubahdata['password'] = sha1($this->request->getVar('password'));
                }
                $ubahdata['level'] = $this->request->getVar('level');
                $nidn = $this->request->getVar('nidnhidden');
                $this->usersmodel->update($nidn, $ubahdata);
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
            $this->usersmodel->delete($nidn);
            $msg = [
                'sukses' => "Data dengan nidn $nidn berhasil di hapus "

            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat di proses');
        }
    }
}
