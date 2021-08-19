<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- datatables -->
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="/assets/css/buttons.dataTables.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">STMIK ANTARBANGSA </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item
            <?= $seg1 == 'dashboard'  ? 'active' : '' ?>
             ">
                <a class=" nav-link " href=" <?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Heading -->
            <div class="sidebar-heading">
                Smarter
            </div>
            <?php if (session()->get('level') ==  1) : ?>
                <li class="nav-item 
         
         <?= $seg1 == 'users'  ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('users') ?>">
                        <i class="fas fa-user-cog"></i>
                        <span>Users</span></a>
                </li>


            <?php endif; ?>
            <!-- Nav Item - Charts -->
            <?php if (session()->get('level') ==  1) : ?>

                <li class="nav-item 
            <?= $seg1 == 'kriteria'  ? 'active' : '' ?> ">
                    <a class="nav-link" href="<?= base_url('kriteria') ?>">
                        <i class="fas fa-database"></i> <span>Kriteria</span></a>
                </li>
            <?php endif; ?>
            <?php if (session()->get('level') ==  1) : ?>

                <li class="nav-item
            <?= $seg1 == 'subkriteria'  ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('subkriteria') ?>">
                        <i class="fas fa-database"></i> <span>Sub Kriteria</span></a>
                </li>
            <?php endif; ?>
            <!-- <?php if (session()->get('level') ==  1) : ?>

                <li class="nav-item
            <?= $seg1 == 'periode'  ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('periode') ?>">
                        <i class="fas fa-database"></i> <span>Periode</span></a>
                </li>
            <?php endif; ?> -->
            <?php if (session()->get('level') ==  1) : ?>

                <li class=" nav-item <?= $seg1 == 'datadosen'  ? 'active' : '' ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-user-tie"></i> <span>Dosen</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item 
                        <?php if ($seg1 === 'datadosen') : ?>
                        <?= $seg2 === ''  ? 'active' : '' ?>
                        <?php endif; ?>
                        " href="<?= base_url('datadosen') ?>">
                                Data Dosen</a>
                            <?php if (session()->get('level') ==  1) : ?>

                                <a class="collapse-item 
                        <?php if ($seg1 === 'datadosen') : ?>
                        <?= $seg2 === 'penilaiandosen'  ? 'active' : '' ?>
                        <?php endif; ?>
                        " href="<?= base_url('datadosen/penilaiandosen') ?>">
                                    Penilaian Dosen</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <?php if (session()->get('level') ==  1) : ?>
                <!-- 
                <li class="nav-item  <?= $seg1 == 'mahasiswa'  ? 'active' : '' ?>">
                    <a class="nav-link " href="<?= base_url('mahasiswa') ?>">
                        <i class="fas fa-user-graduate"></i> <span>Data Mahasiswa</span></a>
                </li> -->
            <?php endif; ?>
            <?php if (session()->get('level') ==  1 || session()->get('level') ==  3) : ?>
                <li class="nav-item <?= $seg1 == 'perhitungan'  ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('perhitungan') ?>">
                        <i class="fas fa-calculator"></i>
                        <span>Data Perhitungan SMARTER</span></a>
                </li>
            <?php endif; ?>
            <?php if (session()->get('level') ==  2) : ?>

                <li class="nav-item <?= $seg1 == 'nilai' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('nilai') ?>">
                        <i class="fas fa-edit"></i>
                        <span>Penilaian Dosen</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Tables -->
            <li class="nav-item  <?= $seg1 == 'dataprofile'    ? 'active' : '' ?>">
                <a class="nav-link " href="<?= base_url('dataprofile') ?>">
                    <i class="far fa-user"></i>
                    <span>Data Profile</span></a>
            </li>

            <li class="nav-item  <?= $seg1 == 'gantipassword'    ? 'active' : '' ?>">
                <a class="nav-link " href="<?= base_url('gantipassword') ?>">
                    <i class="far fa-edit"></i>
                    <span>Ganti Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-danger" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('namauser')  ?> </span>
                                <img class="img-profile rounded-circle" src="/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- content nanti nih -->

                <?= $this->renderSection('content') ?>

                <!-- end content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="/auth/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- Bootstrap core JavaScript-->
        <script src="/assets/js/jquery-3.6.0.js"></script>

        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/assets/js/sb-admin-2.min.js"></script>
        <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/js/demo/datatables-demo.js"></script>
        <script src="/assets/js/script.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="/assets/js/buttons.print.min.js"></script>
        <script src="/assets/js/dataTables.buttons.min.js"></script>

        <script>

        </script>
</body>

</html>