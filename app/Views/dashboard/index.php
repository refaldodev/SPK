<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class=" mb-2 col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Selamat datang <?php
                                if (session()->get("level") == 1) {
                                    echo 'Admin';
                                } else if (session()->get("level") == 2) {
                                    echo 'Mahasiswa';
                                } else {
                                    echo 'Dosen';
                                }
                                ?> <strong><?= session()->get('namauser')  ?>.</strong> Semoga sehat selalu dan selalu diberkahi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <?php if (session()->get('level') ==  3) : ?>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary border-top-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Penilai Mahasiswa </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahpenilai['id_dosen'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success border-top-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Status Penilaian</div>
                                <?php if ($jumlahpenilai['id_dosen'] == 10) { ?>

                                    <div class="h5 mb-0 font-weight-bold text-success">Sudah Selesai</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-success-300"></i>
                            </div>
                        <?php } else { ?>

                            <div class="h5 mb-0 font-weight-bold text-gray">Belum Selesai</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-2x text-gray-300"></i>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>


    </div>
<?php endif; ?>
<!-- Earnings (Annual) Card Example -->
<?php if (session()->get('level') ==  1) : ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary border-top-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Dosen</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahdosen['level'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahmahasiswa['level'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahadmin['level'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if (session()->get('level') ==  3) : ?>

    <!-- Tasks Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progress Penilaian
                        </div>
                        <?php
                        $totalakhirprogres = 0;
                        if ($jumlahpenilai['id_dosen']  == 1) {
                            $totalakhirprogres = 10;
                        } else if ($jumlahpenilai['id_dosen']  == 2) {
                            $totalakhirprogres = 20;
                        } else if ($jumlahpenilai['id_dosen']  == 3) {
                            $totalakhirprogres = 30;
                        } else if ($jumlahpenilai['id_dosen']  == 4) {
                            $totalakhirprogres = 40;
                        } else if ($jumlahpenilai['id_dosen']  == 5) {
                            $totalakhirprogres = 50;
                        } else if ($jumlahpenilai['id_dosen']  == 6) {
                            $totalakhirprogres = 60;
                        } else if ($jumlahpenilai['id_dosen']  == 7) {
                            $totalakhirprogres = 70;
                        } else if ($jumlahpenilai['id_dosen']  == 8) {
                            $totalakhirprogres = 80;
                        } else if ($jumlahpenilai['id_dosen']  == 9) {
                            $totalakhirprogres = 90;
                        } else if ($jumlahpenilai['id_dosen']  == 10) {
                            $totalakhirprogres = 100;
                        } else {
                            $totalakhirprogres = 0;
                        }
                        ?>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $totalakhirprogres; ?>%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style=" width:<?= $totalakhirprogres; ?>%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            <a href="/perhitungan" style="text-decoration:none" class=" text-danger"> Data Perhitungan SMARTER</a>
                        </div>

                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calculator fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->get('level') ==  2) : ?>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary border-top-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="/nilai" style="text-decoration: none; " class="text-primary"> Penilaian Dosen</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-edit fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success border-top-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <a href="/dataprofile" style="text-decoration: none; " class="text-success">Data Profile</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info border-top-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <a href="/dataprofile" style="text-decoration: none; " class="text-info">Ganti Password</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-edit fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->get('level') ==  1) : ?>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            <a href="/datadosen/penilaiandosen" style="text-decoration: none; color:#E74A3B"> Penilaian Dosen</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <a href="/datadosen/penilaiandosen" style="text-decoration: none; color:#5A5C69"><?= $getdatadosen['nama'] ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calculator fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
<?php if (session()->get('level') ==  1 || session()->get('level') == 3) : ?>

    <div class="row">
        <div class="col-6">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>


        </div>
    </div>
<?php endif; ?>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
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

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nama,
                datasets: [{
                    label: 'Bar Perhitungan Smarter',
                    data: arr,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<?= $this->endSection('') ?>