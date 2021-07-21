<?php



function check_not_login()
{
    if (session()->get('nidn') == '') {
        return redirect()->to('/');
    }
    return;
}
