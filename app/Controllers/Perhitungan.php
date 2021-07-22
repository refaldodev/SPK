<?php

namespace App\Controllers;

use App\Models\DosenModel;
use PhpParser\Node\Stmt\Echo_;

class Perhitungan extends BaseController
{

    public function index()
    {
        $NilaiMinC1 =  $this->nilaimodel->getDataNilaMinC1();
        $NilaiMaxC1 =  $this->nilaimodel->getDataNilaMaxC1();
        $NilaiMinC2 =  $this->nilaimodel->getDataNilaMinC2();
        $NilaiMaxC2 =  $this->nilaimodel->getDataNilaMaxC2();
        $min = '';
        $max = '';
        function toDouble($type, $var)
        {
            if ($type == 'min') {
                foreach ($var as $value) {
                    $min = $value;
                }
                return $min;
            } else if ($type == 'max') {
                foreach ($var as $value) {
                    $max = $value;
                }
                return $max;
            }
        }
        $Minc1 = toDouble('min', $NilaiMinC1);
        $MaxC1 = toDouble('max', $NilaiMaxC1);
        $Minc2 = toDouble('min', $NilaiMinC2);
        $MaxC2 = toDouble('max', $NilaiMaxC2);
        $data = [
            'title' => 'Data Perhitungan Smarter',
            'nilaidosen' => $this->nilaimodel->getDataNilaiDosen(),
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'C1Max' => $MaxC1,
            'C1Min' => $Minc1,
            'C2Max' => $MaxC2,
            'C2Min' => $Minc2,

        ];

        return view('perhitungan/index', $data);
    }
}
