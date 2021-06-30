<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <a href="/kriteria/create" class="btn btn-primary btn-icon-split mb-3">
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Artikel</button> <br> <br> -->
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Kriteria</span>

            </a>
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;  ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kriteria</th>
                            <th>Peringkat</th>
                            <th>Bobot</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kriteria as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kriteria'] ?></td>
                                <td><?= $data['peringkat'] ?></td>
                                <td><?= $data['bobot'] ?></td>
                                <td>
                                    <a href="/kriteria/<?= $data['kriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Sub Kriteria" class="btn btn-outline-info"><i class="fa fa-search-plus"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade <?= ($validation) ? ' show' : '' ?>" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg	">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/kriteria/save" method="post">
                                <?= csrf_field(); ?>

                                <div class="form-group row">
                                    <label for="kriteria" class="col-sm-2 col-form-label">Kriteria</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('kriteria')) ? 'is-invalid' : '' ?>" id="kriteria" name="kriteria">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('kriteria') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="peringkat" class="col-sm-2 col-form-label">Peringkat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('peringkat')) ? 'is-invalid' : '' ?>" id="peringkat" name="peringkat">

                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('peringkat') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Bobot" class="col-sm-2 col-form-label">Bobot</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control  <?= ($validation->hasError('bobot')) ? 'is-invalid' : '' ?> " id="Bobot" min="0" max="0.99" step=0.01 name="bobot">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('bobot') ?>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="viewmodal" style="display: none;">
    </div>
</div>
</div>
<?= $this->endSection('') ?>