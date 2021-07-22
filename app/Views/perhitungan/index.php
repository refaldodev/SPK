<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

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
                                <td><?= $nilai['C3'] ?></td>
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
                                <td>
                                    <?php $cekc3 =  $nilai['C3'] - $C3Min; ?>
                                    <?= $cekc3 != 0  ? round(($nilai['C3'] - $C3Min) / ($C3Max - $C3Min) * (100 / 100), 3) : 0 ?>
                                </td>
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
                            <th>Nilai Akhir</th>


                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; ?>
                        <?php foreach ($nilaidosen as $nilai) :  ?>
                            <?php
                            $cekc1 =  $nilai['C1'] - $C1Min;
                            $cekc2 =  $nilai['C2'] - $C2Min;
                            $cekc3 =  $nilai['C3'] - $C3Min;
                            $cekc4 =  $nilai['C4'] - $C4Min;
                            $cekc5 =  $nilai['C5'] - $C5Min;
                            $cekc6 =  $nilai['C6'] - $C6Min;
                            $jumlahC1 = $cekc1 != 0  ? round(($nilai['C1'] - $C1Min) / ($C1Max - $C1Min) * (100 / 100) * $kriteriaC1, 3) : 0;
                            $jumlahC2 = $cekc2 != 0  ? round(($nilai['C2'] - $C2Min) / ($C2Max - $C2Min) * (100 / 100) * $kriteriaC2, 3) : 0;
                            $jumlahC3 = $cekc3 != 0  ? round(($nilai['C3'] - $C3Min) / ($C3Max - $C3Min) * (100 / 100) * $kriteriaC3, 3) : 0;
                            $jumlahC4 = $cekc4 != 0  ? round(($nilai['C4'] - $C4Min) / ($C4Max - $C4Min) * (100 / 100) * $kriteriaC4, 3) : 0;
                            $jumlahC5 = $cekc5 != 0  ? round(($nilai['C5'] - $C5Min) / ($C5Max - $C5Min) * (100 / 100) * $kriteriaC5, 3) : 0;
                            $jumlahC6 = $cekc6 != 0  ? round(($nilai['C6'] - $C6Min) / ($C6Max - $C6Min) * (100 / 100) * $kriteriaC6, 3) : 0;
                            $nilaiakhir = $jumlahC1 + $jumlahC2 + $jumlahC3 + $jumlahC4 + $jumlahC5 + $jumlahC6;


                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
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
                                <td>
                                    <?php $cekc3 =  $nilai['C3'] - $C3Min; ?>
                                    <?= $cekc3 != 0  ? round(($nilai['C3'] - $C3Min) / ($C3Max - $C3Min) * (100 / 100) * $kriteriaC3, 3) : 0 ?>
                                </td>
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
                                <td>
                                    <?= round($nilaiakhir, 3) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $(document).ready(function() {
        $('#dataTableUtility').DataTable();
        $('#dataTableNilaiAkhir').DataTable();
    });
</script>
<?= $this->endSection('') ?>