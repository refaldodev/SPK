<?php

namespace App\Controllers;

use App\Models\DosenModel;
use PhpParser\Node\Stmt\Echo_;

class Perhitungan extends BaseController
{

    public function index()
    {
        // var_dump($_GET['filter']);
        if (isset($_GET['periode'])) {
            $periode = $this->request->getVar('periode');
            $NilaiMinC1 =  $this->nilaimodel->getDataNilaMinC1($periode);
            $NilaiMaxC1 =  $this->nilaimodel->getDataNilaMaxC1($periode);
            $NilaiMinC2 =  $this->nilaimodel->getDataNilaMinC2($periode);
            $NilaiMaxC2 =  $this->nilaimodel->getDataNilaMaxC2($periode);
            $NilaiMinC3 =  $this->nilaimodel->getDataNilaMinC3($periode);
            $NilaiMaxC3 =  $this->nilaimodel->getDataNilaMaxC3($periode);
            $NilaiMinC4 =  $this->nilaimodel->getDataNilaMinC4($periode);
            $NilaiMaxC4 =  $this->nilaimodel->getDataNilaMaxC4($periode);
            $NilaiMinC5 =  $this->nilaimodel->getDataNilaMinC5($periode);
            $NilaiMaxC5 =  $this->nilaimodel->getDataNilaMaxC5($periode);
            $NilaiMinC6 =  $this->nilaimodel->getDataNilaMinC6($periode);
            $NilaiMaxC6 =  $this->nilaimodel->getDataNilaMaxC6($periode);
            $NilaiKriteriaC1 = $this->nilaimodel->getKriteriaC1($periode);
            $NilaiKriteriaC2 = $this->nilaimodel->getKriteriaC2($periode);
            $NilaiKriteriaC3 = $this->nilaimodel->getKriteriaC3($periode);
            $NilaiKriteriaC4 = $this->nilaimodel->getKriteriaC4($periode);
            $NilaiKriteriaC5 = $this->nilaimodel->getKriteriaC5($periode);
            $NilaiKriteriaC6 = $this->nilaimodel->getKriteriaC6($periode);

            $min = '';
            $max = '';
            $kriteria = '';
            function toDouble($type = '', $var)
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
                } else {
                    foreach ($var as $value) {
                        $kriteria = $value;
                    }
                    return $kriteria;
                }
            }
            $Minc1 = toDouble('min', $NilaiMinC1);
            $MaxC1 = toDouble('max', $NilaiMaxC1);
            $MinC2 = toDouble('min', $NilaiMinC2);
            $MaxC2 = toDouble('max', $NilaiMaxC2);
            $MinC3 = toDouble('min', $NilaiMinC3);
            $MaxC3 = toDouble('max', $NilaiMaxC3);
            $MinC4 = toDouble('min', $NilaiMinC4);
            $MaxC4 = toDouble('max', $NilaiMaxC4);
            $MinC5 = toDouble('min', $NilaiMinC5);
            $MaxC5 = toDouble('max', $NilaiMaxC5);
            $MinC6 = toDouble('min', $NilaiMinC6);
            $MaxC6 = toDouble('max', $NilaiMaxC6);
            $MaxC6 = toDouble('max', $NilaiMaxC6);
            $kriteriaC1 = toDouble('', $NilaiKriteriaC1);
            $kriteriaC2 = toDouble('', $NilaiKriteriaC2);
            $kriteriaC3 = toDouble('', $NilaiKriteriaC3);
            $kriteriaC4 = toDouble('', $NilaiKriteriaC4);
            $kriteriaC5 = toDouble('', $NilaiKriteriaC5);
            $kriteriaC6 = toDouble('', $NilaiKriteriaC6);

            $data = [
                'title' => 'Data Perhitungan Smarter',
                'nilaidosen' => $this->nilaimodel->getDataNilaiDosen($periode),
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2),
                'C1Max' => $MaxC1,
                'C1Min' => $Minc1,
                'C2Max' => $MaxC2,
                'C2Min' => $MinC2,
                'C3Max' => $MaxC3,
                'C3Min' => $MinC3,
                'C4Max' => $MaxC4,
                'C4Min' => $MinC4,
                'C5Max' => $MaxC5,
                'C5Min' => $MinC5,
                'C6Max' => $MaxC6,
                'C6Min' => $MinC6,
                'kriteriaC1' => $kriteriaC1,
                'kriteriaC2' => $kriteriaC2,
                'kriteriaC3' => $kriteriaC3,
                'kriteriaC4' => $kriteriaC4,
                'kriteriaC5' => $kriteriaC5,
                'kriteriaC6' => $kriteriaC6,
                'periode' => $this->periodemodel->getDataPeriode(),
            ];
            return view('perhitungan/index', $data);
        } else {
            $periode = $this->request->getVar('periode');
            $NilaiMinC1 =  $this->nilaimodel->getDataNilaMinC1($periode);
            $NilaiMaxC1 =  $this->nilaimodel->getDataNilaMaxC1($periode);
            $NilaiMinC2 =  $this->nilaimodel->getDataNilaMinC2($periode);
            $NilaiMaxC2 =  $this->nilaimodel->getDataNilaMaxC2($periode);
            $NilaiMinC3 =  $this->nilaimodel->getDataNilaMinC3($periode);
            $NilaiMaxC3 =  $this->nilaimodel->getDataNilaMaxC3($periode);
            $NilaiMinC4 =  $this->nilaimodel->getDataNilaMinC4($periode);
            $NilaiMaxC4 =  $this->nilaimodel->getDataNilaMaxC4($periode);
            $NilaiMinC5 =  $this->nilaimodel->getDataNilaMinC5($periode);
            $NilaiMaxC5 =  $this->nilaimodel->getDataNilaMaxC5($periode);
            $NilaiMinC6 =  $this->nilaimodel->getDataNilaMinC6($periode);
            $NilaiMaxC6 =  $this->nilaimodel->getDataNilaMaxC6($periode);
            $NilaiKriteriaC1 = $this->nilaimodel->getKriteriaC1($periode);
            $NilaiKriteriaC2 = $this->nilaimodel->getKriteriaC2($periode);
            $NilaiKriteriaC3 = $this->nilaimodel->getKriteriaC3($periode);
            $NilaiKriteriaC4 = $this->nilaimodel->getKriteriaC4($periode);
            $NilaiKriteriaC5 = $this->nilaimodel->getKriteriaC5($periode);
            $NilaiKriteriaC6 = $this->nilaimodel->getKriteriaC6($periode);

            $min = '';
            $max = '';
            $kriteria = '';
            function toDouble($type = '', $var)
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
                } else {
                    foreach ($var as $value) {
                        $kriteria = $value;
                    }
                    return $kriteria;
                }
            }
            $Minc1 = toDouble('min', $NilaiMinC1);
            $MaxC1 = toDouble('max', $NilaiMaxC1);
            $MinC2 = toDouble('min', $NilaiMinC2);
            $MaxC2 = toDouble('max', $NilaiMaxC2);
            $MinC3 = toDouble('min', $NilaiMinC3);
            $MaxC3 = toDouble('max', $NilaiMaxC3);
            $MinC4 = toDouble('min', $NilaiMinC4);
            $MaxC4 = toDouble('max', $NilaiMaxC4);
            $MinC5 = toDouble('min', $NilaiMinC5);
            $MaxC5 = toDouble('max', $NilaiMaxC5);
            $MinC6 = toDouble('min', $NilaiMinC6);
            $MaxC6 = toDouble('max', $NilaiMaxC6);
            $MaxC6 = toDouble('max', $NilaiMaxC6);
            $kriteriaC1 = toDouble('', $NilaiKriteriaC1);
            $kriteriaC2 = toDouble('', $NilaiKriteriaC2);
            $kriteriaC3 = toDouble('', $NilaiKriteriaC3);
            $kriteriaC4 = toDouble('', $NilaiKriteriaC4);
            $kriteriaC5 = toDouble('', $NilaiKriteriaC5);
            $kriteriaC6 = toDouble('', $NilaiKriteriaC6);

            $data = [
                'title' => 'Data Perhitungan Smarter',
                'nilaidosen' => $this->nilaimodel->getDataNilaiDosen($periode),
                'seg1' => $this->request->uri->getSegment(1),
                'seg2' => $this->request->uri->getSegment(2),
                'C1Max' => $MaxC1,
                'C1Min' => $Minc1,
                'C2Max' => $MaxC2,
                'C2Min' => $MinC2,
                'C3Max' => $MaxC3,
                'C3Min' => $MinC3,
                'C4Max' => $MaxC4,
                'C4Min' => $MinC4,
                'C5Max' => $MaxC5,
                'C5Min' => $MinC5,
                'C6Max' => $MaxC6,
                'C6Min' => $MinC6,
                'kriteriaC1' => $kriteriaC1,
                'kriteriaC2' => $kriteriaC2,
                'kriteriaC3' => $kriteriaC3,
                'kriteriaC4' => $kriteriaC4,
                'kriteriaC5' => $kriteriaC5,
                'kriteriaC6' => $kriteriaC6,
                'periode' => $this->periodemodel->getDataPeriode(),

            ];
        }
        return view('perhitungan/index', $data);
    }
    public function hitung()
    {
        $data = $this->nilaimodel->getDataNilaiDosen();
        $NilaiMinC1 =  $this->nilaimodel->getDataNilaMinC1();
        $NilaiMaxC1 =  $this->nilaimodel->getDataNilaMaxC1();
        $NilaiMinC2 =  $this->nilaimodel->getDataNilaMinC2();
        $NilaiMaxC2 =  $this->nilaimodel->getDataNilaMaxC2();
        $NilaiMinC3 =  $this->nilaimodel->getDataNilaMinC3();
        $NilaiMaxC3 =  $this->nilaimodel->getDataNilaMaxC3();
        $NilaiMinC4 =  $this->nilaimodel->getDataNilaMinC4();
        $NilaiMaxC4 =  $this->nilaimodel->getDataNilaMaxC4();
        $NilaiMinC5 =  $this->nilaimodel->getDataNilaMinC5();
        $NilaiMaxC5 =  $this->nilaimodel->getDataNilaMaxC5();
        $NilaiMinC6 =  $this->nilaimodel->getDataNilaMinC6();
        $NilaiMaxC6 =  $this->nilaimodel->getDataNilaMaxC6();

        $min = '';
        $max = '';
        $kriteria = '';
        function toDoubleHitung($type = '', $var)
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
            } else {
                foreach ($var as $value) {
                    $kriteria = $value;
                }
                return $kriteria;
            }
        }
        $MinC1 = toDoubleHitung('min', $NilaiMinC1);
        $MaxC1 = toDoubleHitung('max', $NilaiMaxC1);
        $MinC2 = toDoubleHitung('min', $NilaiMinC2);
        $MaxC2 = toDoubleHitung('max', $NilaiMaxC2);
        $MinC3 = toDoubleHitung('min', $NilaiMinC3);
        $MaxC3 = toDoubleHitung('max', $NilaiMaxC3);
        $MinC4 = toDoubleHitung('min', $NilaiMinC4);
        $MaxC4 = toDoubleHitung('max', $NilaiMaxC4);
        $MinC5 = toDoubleHitung('min', $NilaiMinC5);
        $MaxC5 = toDoubleHitung('max', $NilaiMaxC5);
        $MinC6 = toDoubleHitung('min', $NilaiMinC6);
        $MaxC6 = toDoubleHitung('max', $NilaiMaxC6);
        $MaxC6 = toDoubleHitung('max', $NilaiMaxC6);
        var_dump(floatval($MinC1));
        foreach ($data as $result) {
            $cek1 = ($result['C1'] - $MinC1) / ($MaxC1 - $MinC1) * (100 / 100);
        }
    }
    public function latihan()
    {
        $data = [
            'title' => 'Data Perhitungan Smarter',
            'seg1' => $this->request->uri->getSegment(1),
            'seg2' => $this->request->uri->getSegment(2),
            'nilaidosen' => $this->nilaimodel->getDataNilaiDosen(),
        ];


        return view('perhitungan/latihan', $data);
    }
    public function datajson()
    {

        $filter = $this->request->getVar('filter');

        $dosen =  $this->nilaimodel->getDataNilaiDosen($filter);
        $tes = json_encode($dosen);
        return $tes;
    }
    public function utility()
    {
    }
}
