<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid ">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
            <a href="/kriteria" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>


        <div class="card-body">

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
        <div class="form-group row mr-2">

            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

<?= $this->endSection('') ?>