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
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2)
            ];
        return view('users/index', $data);
    }
}
