<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Users extends BaseController
{
    public function __construct()
    {
        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('level') ==  1) {

            $data =
                [
                    'title' => 'Data User',
                    'users' => $this->usersmodel->getDataUsers(),
                    'seg1' => $this->request->uri->getSegment(1),
                    'seg2' => $this->request->uri->getSegment(2)
                ];
            return view('users/index', $data);
        } else {
            return redirect()->to('dashboard');
        }
    }
    public function create()
    {
        if (session()->get('level') ==  1) {

            $data =
                [
                    'title' => 'Tambah User',
                    'users' => $this->usersmodel->getDataUsers(),
                    'seg1' => $this->request->uri->getSegment(1),
                    'seg2' => $this->request->uri->getSegment(2)
                ];
            return view('users/create', $data);
        } else {
            return redirect()->to('dashboard');
        }
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
        if (session()->get('level') ==  1) {

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
        } else {
            return redirect()->to('dashboard');
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
                        'numeric' => 'Nidn harus berupa angka',

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
    public function gantipassword()
    {
        $data =
            [
                'title' => 'Ganti Password',
                'users' => $this->usersmodel->getDataUsers(),
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2)
            ];
        return view('users/gantipassword', $data);
    }
    public function ubahpassword()
    {

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'opwd' => [
                    'label' => 'Old Password',
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',

                    ]
                ],
                'npwd' => [
                    'label' => 'New Password',
                    'rules' => 'required|min_length[5]|max_length[16]',
                    'errors' =>
                    [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah terdaftar'
                    ]
                ],

                'cnpwd' => [
                    'label' => 'Confirm New Password',

                    'rules' => 'required|matches[npwd]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'matches' => '{field} Harus sama dengan New Password',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'opwd' => $validation->getError('opwd'),
                        'npwd' => $validation->getError('npwd'),
                        'cnpwd' => $validation->getError('cnpwd'),

                    ]
                ];
            } else {
                $password = session()->get('password');
                $nidn = session()->get('nidn');
                $opwd = sha1($this->request->getVar('opwd'));
                $npwd = sha1($this->request->getVar('npwd'));
                $data['password'] = $npwd;
                $query = $this->db->query("SELECT * FROM users WHERE nidn ='$nidn'");
                $result = $query->getResult();
                if (count($result) > 0) {
                    $querypass = $this->db->query("SELECT * FROM users WHERE nidn ='$nidn' && password ='$opwd'");
                    $resultpass = $querypass->getResult();
                    if (count($resultpass) > 0) {
                        $this->usersmodel->update($nidn, $data);
                        $msg = [
                            'sukses' => 'Password berhasil di ubah'
                        ];
                    } else {
                        $msg = [
                            'salah' => 'password salah'
                        ];
                    }
                } else {
                    $msg = [
                        'gagal' => 'data gagal di ubah'
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit('data tidak ada');
        }
    }
    public function dataprofile()
    {
        $nidn = session()->get('nidn');
        $query = $this->usersmodel->getDataUsers($nidn);
        if ($query > 0) {
            $data =
                [
                    'title' => 'Edit Data Profile',
                    'users' => $this->usersmodel->getDataUsers($nidn),
                    'seg1' => $this->request->uri->getSegment(1),
                    'seg2' => $this->request->uri->getSegment(2)
                ];
            return view('users/editdataprofile', $data);
        } else {
            echo "<script>alert('data tidak ditemukan');";
            echo "window.location='" . site_url('users') . "'; 
        </script>";
        }
    }
    public function updatedataprofile()
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
                        'numeric' => 'Nidn harus berupa angka',

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
                    ]
                ];
            } else {
                $ubahdata['nidn'] = $this->request->getVar('nidn');
                $ubahdata['nama'] = $this->request->getVar('nama');

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
}
