<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter</h6>
        </div>
        <div class="card-body">
            <form action="" method="GET">
                <div class="form-group row">
                    <label for="C1" class="col-4 col-form-label">Filter Berdasarkan Semester dan Periode </label>
                    <div class="col-8">
                        <select class="form-control periode" id="periode" name="periode">
                            <option value="null" selected="true" disabled="disabled"> -- Pilih ---</option>
                            <?php foreach ($periode as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['periode'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorperiode">

                        </div>
                    </div>
                </div>
                <div class="form-group row mr-2">
                    <div class="col-sm-12 text-right ">
                        <button type="submit" class="btn btn-primary btnsimpan ">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($nilaidosen as $nilai) :  ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $nilai['nama'] ?></td>
                                <td><?= $nilai['pendidikan'] ?></td>
                                <td><?= $nilai['jabatan'] ?></td>
                                <td><?= $nilai['C1'] ?></td>
                                <td><?= $nilai['C2'] ?></td>
                                <?php if ($nilai['C3'] == 0) { ?>
                                    <td>Belum di nilai oleh mahasiswa </td>
                                <?php } else { ?>
                                    <td><?= $nilai['C3'] ?></td>
                                <?php } ?>
                                <td><?= $nilai['C4'] ?></td>
                                <td><?= $nilai['C5'] ?></td>
                                <td><?= $nilai['C6'] ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- data penilaian dosen -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan Nilai Utility </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableUtility" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; ?>
                        <?php foreach ($nilaidosen as $nilai) :  ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $nilai['nama'] ?></td>
                                <td><?= $nilai['pendidikan'] ?></td>
                                <td><?= $nilai['jabatan'] ?></td>
                                <td>
                                    <?php $cekc1 =  $nilai['C1'] - $C1Min; ?>
                                    <?= $cekc1 != 0  ? round(($nilai['C1'] - $C1Min) / ($C1Max - $C1Min) * (100 / 100), 3) : 0 ?>
                                </td>
                                <td>
                                    <?php $cekc2 =  $nilai['C2'] - $C2Min; ?>
                                    <?= $cekc2 != 0  ? round(($nilai['C2'] - $C2Min) / ($C2Max - $C2Min) * (100 / 100), 3) : 0 ?>
                                </td>
                                <?php if ($nilai['C3'] == 0) { ?>
                                    <td>Belum di nilai oleh mahasiswa</td>

                                <?php } else { ?>
                                    <td>

                                        <?php $cekc3 =  $nilai['C3'] - $C3Min; ?>
                                        <?= $cekc3 != 0  ? round(($nilai['C3'] - $C3Min) / ($C3Max - $C3Min) * (100 / 100), 3) : 0 ?>
                                    </td>
                                <?php } ?>
                                <td>
                                    <?php $cekc4 =  $nilai['C4'] - $C4Min; ?>
                                    <?= $cekc4 != 0  ? round(($nilai['C4'] - $C4Min) / ($C4Max - $C4Min) * (100 / 100), 3) : 0 ?>
                                </td>

                                <td>
                                    <?php $cekc5 =  $nilai['C5'] - $C5Min; ?>
                                    <?= $cekc5 != 0  ? round(($nilai['C5'] - $C5Min) / ($C5Max - $C5Min) * (100 / 100), 3)  : 0 ?>
                                </td>

                                <td>
                                    <?php $cekc6 =  $nilai['C6'] - $C6Min; ?>
                                    <?= $cekc6 != 0  ? round(($nilai['C6'] - $C6Min) / ($C6Max - $C6Min) * (100 / 100), 3) : 0 ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan Nilai Akhir Menggunakan SMARTER </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableNilaiAkhir" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; ?>
                        <?php foreach ($nilaidosen as $nilai) :  ?>

                            <?php $cekc1 = $nilai['C1'] - $C1Min;
                            $cekc2 = $nilai['C2'] - $C2Min;
                            $cekc3 = $nilai['C3'] - $C3Min;
                            $cekc4 = $nilai['C4'] - $C4Min;
                            $cekc5 = $nilai['C5'] - $C5Min;
                            $cekc6 = $nilai['C6'] - $C6Min;
                            $jumlahC1 = $cekc1 != 0 ? round(($nilai['C1'] - $C1Min) / ($C1Max - $C1Min) * (100 / 100) * $kriteriaC1, 3) : 0;
                            $jumlahC2 = $cekc2 != 0 ? round(($nilai['C2'] - $C2Min) / ($C2Max - $C2Min) * (100 / 100) * $kriteriaC2, 3) : 0;
                            $jumlahC3 = $cekc3 != 0 ? round(($nilai['C3'] - $C3Min) / ($C3Max - $C3Min) * (100 / 100) * $kriteriaC3, 3) : 0;
                            $jumlahC4 = $cekc4 != 0 ? round(($nilai['C4'] - $C4Min) / ($C4Max - $C4Min) * (100 / 100) * $kriteriaC4, 3) : 0;
                            $jumlahC5 = $cekc5 != 0 ? round(($nilai['C5'] - $C5Min) / ($C5Max - $C5Min) * (100 / 100) * $kriteriaC5, 3) : 0;
                            $jumlahC6 = $cekc6 != 0 ? round(($nilai['C6'] - $C6Min) / ($C6Max - $C6Min) * (100 / 100) * $kriteriaC6, 3) : 0;
                            $nilaiakhir = $jumlahC1 + $jumlahC2 + $jumlahC3 + $jumlahC4 + $jumlahC5 + $jumlahC6;
                            ?>
                            <tr>

                                <td><?= $nilai['nama'] ?></td>
                                <td><?= $nilai['pendidikan'] ?></td>
                                <td><?= $nilai['jabatan'] ?></td>
                                <td>
                                    <?php $cekc1 =  $nilai['C1'] - $C1Min; ?>
                                    <?= $cekc1 != 0  ? round(($nilai['C1'] - $C1Min) / ($C1Max - $C1Min) * (100 / 100) * $kriteriaC1, 3) : 0 ?>
                                </td>
                                <td>
                                    <?php $cekc2 =  $nilai['C2'] - $C2Min; ?>
                                    <?= $cekc2 != 0  ? round(($nilai['C2'] - $C2Min) / ($C2Max - $C2Min) * (100 / 100) * $kriteriaC2, 3) : 0 ?>
                                </td>
                                <?php if ($nilai['C3'] == 0) { ?>
                                    <td>Belum di nilai oleh mahasiswa </td>

                                <?php } else { ?>
                                    <td>
                                        <?php $cekc3 =  $nilai['C3'] - $C3Min; ?>
                                        <?= $cekc3 != 0  ? round(($nilai['C3'] - $C3Min) / ($C3Max - $C3Min) * (100 / 100) * $kriteriaC3, 3) : 0 ?>
                                    </td>
                                <?php } ?>
                                <td>
                                    <?php $cekc4 =  $nilai['C4'] - $C4Min; ?>
                                    <?= $cekc4 != 0  ? round(($nilai['C4'] - $C4Min) / ($C4Max - $C4Min) * (100 / 100) * $kriteriaC4, 3) : 0 ?>
                                </td>
                                <td>
                                    <?php $cekc5 =  $nilai['C5'] - $C5Min; ?>
                                    <?= $cekc5 != 0  ? round(($nilai['C5'] - $C5Min) / ($C5Max - $C5Min) * (100 / 100) * $kriteriaC5, 3)  : 0 ?>
                                </td>
                                <td>
                                    <?php $cekc6 =  $nilai['C6'] - $C6Min; ?>
                                    <?= $cekc6 != 0  ? round(($nilai['C6'] - $C6Min) / ($C6Max - $C6Min) * (100 / 100) * $kriteriaC6, 3) : 0 ?>
                                </td>
                                <?php

                                ?>
                                <td style="background:yellow;">
                                    <?= round($nilaiakhir, 3) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nilai tertinggi</h6>
        </div>
        <div class="card-body">
            <p>dari hasi perhitungan di atas nilai tertinggi adalah <span class="result bg-warning"></span></p>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $(document).ready(function() {
        $('#dataTableUtility').DataTable();
        $('#dataTableNilaiAkhir').DataTable({
            "order": [
                [9, "desc"]
            ],
            dom: 'Bfrtip',
            buttons: [
                'print'
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
    let tabel = document.getElementById('dataTableNilaiAkhir');
    let btn = document.querySelector('#buttonih');




    $.getJSON('/dashboard/datajson', function(result) {
        const c1 = result.map(data => {
            return parseFloat(data.C1)
        })
        const c2 = result.map(data => {
            return data.C2
        })
        const c3 = result.map(data => {
            return data.C3
        })
        const c4 = result.map(data => {
            return data.C4
        })
        const c5 = result.map(data => {
            return data.C5
        })
        const c6 = result.map(data => {
            return data.C6
        })
        let nama = [];
        result.forEach(element => {
            nama.push(element.nama)

        });
        const maxc1 = Math.max.apply(null, c1);
        const minc1 = Math.min.apply(null, c1);
        const maxc2 = Math.max.apply(null, c2);
        const minc2 = Math.min.apply(null, c2);
        const maxc3 = Math.max.apply(null, c3);
        const minc3 = Math.min.apply(null, c3);
        const maxc4 = Math.max.apply(null, c4);
        const minc4 = Math.min.apply(null, c4);
        const maxc5 = Math.max.apply(null, c5);
        const minc5 = Math.min.apply(null, c5);
        const maxc6 = Math.max.apply(null, c6);
        const minc6 = Math.min.apply(null, c6);
        let hasilfix = [];
        result.forEach(element => {
            let resultC1 = ((parseFloat(element.C1) - minc1) / (maxc1 - minc1) * 100 / 100) * 0.408;
            let resultC2 = ((parseFloat(element.C2) - minc2) / (maxc2 - minc2) * 100 / 100) * 0.24;

            // console.log(((parseFloat(element.C3) - minc3) / (maxc3 - minc3) * 100 / 100) * 0.158);
            if ((element.C3 - minc3) == 0) {
                resultC3 = 0;
            } else {
                let resultC3 = ((parseFloat(element.C3) - minc3) / (maxc3 - minc3) * 100 / 100) * 0.158;
            }

            let resultC4 = ((parseFloat(element.C4) - minc4) / (maxc4 - minc4) * 100 / 100) * 0.103;
            let resultC5 = ((parseFloat(element.C5) - minc5) / (maxc5 - minc5) * 100 / 100) * 0.061;
            let resultC6 = ((parseFloat(element.C6) - minc6) / (maxc6 - minc6) * 100 / 100) * 0.028;
            let hasil = resultC1 + resultC2 + resultC3 + resultC4 + resultC5 + resultC6
            hasilfix.push(hasil)

        });
        let perhitunganC1 = [];
        let perhitunganC2 = [];
        let perhitunganC3 = [];
        let perhitunganC4 = [];
        let perhitunganC5 = [];
        let perhitunganC6 = [];
        let arr = [];

        result.forEach(element => {
            let resultC1 = ((parseFloat(element.C1) - minc1) / (maxc1 - minc1) * 100 / 100) * 0.408;
            let resultC2 = ((parseFloat(element.C2) - minc2) / (maxc2 - minc2) * 100 / 100) * 0.24;
            if ((parseFloat(element.C3) - minc3) == 0) {
                resultC3 = 0;
            } else {
                let resultC3 = ((parseFloat(element.C3) - minc3) / (maxc3 - minc3) * 100 / 100) * 0.158;
            }
            let resultC4 = ((parseFloat(element.C4) - minc4) / (maxc4 - minc4) * 100 / 100) * 0.103;
            let cek5 = (parseFloat(element.C5) - minc5);

            let resultC5 = ((parseFloat(element.C5) - minc5) / (maxc5 - minc5) * 100 / 100) * 0.061;
            let cek = (parseFloat(element.C6) - minc6);
            let resultC6 = 0;
            if (cek != 0) {

                resultC6 = ((parseFloat(element.C6) - minc6) / (maxc6 - minc6) * 100 / 100) * 0.061;
            } else {
                resultC6 = 0;
            }
            let hasil = resultC1 + resultC2 + resultC3 + resultC4 + resultC5 + resultC6
            perhitunganC1.push(parseFloat(resultC1))
            perhitunganC2.push(parseFloat(resultC2))
            perhitunganC3.push(parseFloat(resultC3))
            perhitunganC4.push(parseFloat(resultC4))
            perhitunganC5.push(parseFloat(resultC5))
            perhitunganC6.push(parseFloat(resultC6))
            let nilaiakhir = Math.round(hasil * 100) / 100;
            arr.push(nilaiakhir)
        });
        var max_of_array = Math.max.apply(Math, arr);

        let tes = document.querySelector('.result');
        tes.innerHTML = max_of_array;
        console.log(max_of_array)
    });
</script>
<?= $this->endSection('') ?>