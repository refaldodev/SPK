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
                            ?>
                            <?php foreach ($subkriteria as $data) : ?>
                                <tr>
                                    <?php if ($data['id_kriteria'] == 1) : ?>
                                        <td scope="row"><?= $no++  ?></td>
                                        <td><?= $data['subkriteria']  ?></td>
                                        <td><?= $data['bobot']  ?></td>
                                        <td>
                                            <a href="/subkriteria/edit/<?= $data['id_subkriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                    <?php endif; ?>
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

                            <?php
                            $no = 1;

                            ?>
                            <?php foreach ($subkriteria as $data) : ?>

                                <tr>
                                    <?php if ($data['id_kriteria'] == 2) : ?>
                                        <td scope="row"><?= $no++  ?></td>
                                        <td><?= $data['subkriteria']  ?></td>
                                        <td><?= $data['bobot']  ?></td>


                                        <td>
                                            <a href="/subkriteria/edit/<?= $data['id_subkriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                    <?php endif; ?>
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

                            <?php
                            $no = 1;

                            ?>
                            <?php foreach ($subkriteria as $data) : ?>

                                <tr>
                                    <?php if ($data['id_kriteria'] == 3) : ?>
                                        <td scope="row"><?= $no++  ?></td>
                                        <td><?= $data['subkriteria']  ?></td>
                                        <td><?= $data['bobot']  ?></td>


                                        <td>
                                            <a href="/subkriteria/edit/<?= $data['id_subkriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                    <?php endif; ?>
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

                            <?php
                            $no = 1;

                            ?>
                            <?php foreach ($subkriteria as $data) : ?>

                                <tr>
                                    <?php if ($data['id_kriteria'] == 4) : ?>
                                        <td scope="row"><?= $no++  ?></td>
                                        <td><?= $data['subkriteria']  ?></td>
                                        <td><?= $data['bobot']  ?></td>


                                        <td>
                                            <a href="/subkriteria/edit/<?= $data['id_subkriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div class="card shadow mb-4 col-12 col-sm-12  col-lg-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Kriteria Jabatan</h6>
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

                            ?>
                            <?php foreach ($subkriteria as $data) : ?>

                                <tr>
                                    <?php if ($data['id_kriteria'] == 5) : ?>
                                        <td scope="row"><?= $no++  ?></td>
                                        <td><?= $data['subkriteria']  ?></td>
                                        <td><?= $data['bobot']  ?></td>


                                        <td>
                                            <a href="/subkriteria/edit/<?= $data['id_subkriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

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

                            <?php
                            $no = 1;

                            ?>
                            <?php foreach ($subkriteria as $data) : ?>

                                <tr>
                                    <?php if ($data['id_kriteria'] == 6) : ?>
                                        <td scope="row"><?= $no++  ?></td>
                                        <td><?= $data['subkriteria']  ?></td>
                                        <td><?= $data['bobot']  ?></td>


                                        <td>
                                            <a href="/subkriteria/edit/<?= $data['id_subkriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection('') ?>