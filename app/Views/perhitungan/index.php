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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan Nilai Utility </h6>
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
                                <td>
                                    <?= ($nilai['C1'] - $C1Min) / ($C1Max - $C1Min) * (100 / 100)  ?>
                                </td>
                                <td>
                                    <?php $cekc2 =  $nilai['C2'] - $C2Min; ?>
                                    <?= $cekc2 != 0  ? ($nilai['C2'] - $C2Min) / ($C2Max - $C2Min) * (100 / 100) : 0 ?>

                                </td>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection('') ?>