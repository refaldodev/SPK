<?php

namespace App\Controllers;


class Override extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Tidak ditemukan',

        ];

        return view('override', $data);
    }
}
