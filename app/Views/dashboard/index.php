<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class=" mb-4 col-12">
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
                                    Jumlah Penilai</div>
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
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
<?php endif; ?>


<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pending Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">

    <div class="col-lg-6">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Default Card Example
            </div>
            <div class="card-body">
                This card uses Bootstrap's default styling with no utility classes added. Global
                styles are the only things modifying the look and feel of this default card example.
            </div>
        </div>

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                The styling for this basic card example is created by using default Bootstrap
                utility classes. By using utility classes, the style of the card component can be
                easily modified with no need for any custom CSS!
            </div>
        </div>

    </div>

    <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                Dropdown menus can be placed in the card header in order to extend the functionality
                of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                icon in the card header can be clicked on in order to toggle a dropdown menu.
            </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse
                    functionality. <strong>Click on the card header</strong> to see the card body
                    collapse and expand!
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<div class="text-center">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Page Not Found</p>
    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
    <a href="index.html">&larr; Back to Dashboard</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection('') ?>