<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Auth extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Login',

            ];
        return view('auth/login', $data);
    }
    public function check_login()
    {

        if ($this->request->getPost('login') !== null) {
            $nidn = $this->request->getVar('nidn');
            $password =  $this->request->getVar('password');
            $query = $this->authmodel->check_login($nidn, $password);

            if ($query > 0) {

                session()->set('nidn',  $query['nidn']);
                session()->set('nama',  $query['nama']);
                session()->set('level',  $query['level']);

                echo "<script>
                    alert('Login berhasil');
                    window.location='" . site_url('/dashboard') . "';
                     </script>";
            } else {
                session()->setFlashdata('gagal',  'Username atau password salah!!');
                return redirect()->to('auth');
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}
