<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        if (session('login')) {
            return redirect()->to('dashboard');
        } else {
            $data =
                [
                    'title' => 'Login',

                ];
            return view('auth/login', $data);
        }
    }
    public function check_login()
    {

        if ($this->request->isAJAX()) {
            $nidn = $this->request->getVar('nidn');
            $password = sha1($this->request->getVar('password'));
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nidn' => [
                    'rules' => 'required|numeric',
                    'errors' =>
                    [
                        'required' => 'Nidn harus di isi',
                        'numeric' => 'Nidn harus berupa angka'

                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Password harus di isi',

                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nidn' => $validation->getError('nidn'),
                        'password' => $validation->getError('password')
                    ]

                ];
            } else {
                // cek user di database;
                $query = $this->db->query("SELECT * FROM users WHERE nidn ='$nidn'");
                $result = $query->getResult();
                if (count($result) > 0) {
                    // lanjutkan
                    $row = $query->getRow();
                    $querypassword = $this->db->query("SELECT * FROM users WHERE nidn ='$nidn' && password ='$password' ");
                    $result = $querypassword->getResult();

                    // $password_user = $row->password
                    if (count($result) > 0) {
                        // buat session
                        $simpansession = [
                            'login' => true,
                            'nidn' => $nidn,
                            'namauser' => $row->nama,
                            'level' => $row->level,
                            'password' => $row->password

                        ];
                        $this->session->set($simpansession);
                        $msg = [
                            'sukses' => [
                                'link' => '/dashboard',
                                'teks' => 'Anda Berhasil Login'
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'password' => 'maaf password salah'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'nidn' => 'maaf nidn tidak ditemukan'
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit('data tidak ditemukan');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}
