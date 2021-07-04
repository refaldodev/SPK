<?= $this->extend('admintemplate/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid ">
    <div class="row justify-content-around">

        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Penelitian</h6>
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
                <div class="table-responsive">

                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">SubKriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datakriteria as $data) :
                        ?>
                            <tr>
                                <th scope="row"><?= $no++  ?></th>
                                <td><?= $data['pilihan_kriteria'] ?></td>
                                <td><?= $data['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>

            </div>
        </div>

        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Abdimas</h6>
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
                <div class="table-responsive">

                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">SubKriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kriteriaabdimas as $dataabdimas) : ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $dataabdimas['pilihan_kriteria'] ?></td>
                                <td><?= $dataabdimas['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                </div>

            </div>
        </div>
        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Kompetensi</h6>
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
                <div class="table-responsive">

                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">SubKriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kriteriakompetensi as $datakompetensi) : ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $datakompetensi['pilihan_kriteria'] ?></td>
                                <td><?= $datakompetensi['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                </div>

            </div>
        </div>
        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Pendidikan</h6>
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
                <div class="table-responsive">

                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">SubKriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kriteriapendidikanmodel as $datapendidikan) : ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $datapendidikan['pilihan_kriteria'] ?></td>
                                <td><?= $datapendidikan['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>          
                      </div >



            </div>
        </div>
        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Abdimas</h6>
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
                <div class="table-responsive">

                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">SubKriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kriteriaabdimas as $dataabdimas) : ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $dataabdimas['pilihan_kriteria'] ?></td>
                                <td><?= $dataabdimas['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                </div >


            </div>
        </div>
        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Lama Mengajar</h6>
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
                <div class="table-responsive">
                

                <table class="table  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">SubKriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kriterialamamengajar as $datalamamengajar) : ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $datalamamengajar['pilihan_kriteria'] ?></td>
                                <td><?= $datalamamengajar['bobot_kriteria'] ?></td>
                                <td>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                </div >

            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection('') ?>