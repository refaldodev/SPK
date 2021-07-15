<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Penilaian Dosen</h6>
            <a href="/datadosen" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <form action="/datadosen/save" method="post" class="simpandata">
                <?= csrf_field(); ?>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="nama">
                            <option selected>-- Pilih ---</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                        <div id="validationServer03Feedback" class="invalid-feedback errorJabatan">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                        <div id="validationServer03Feedback" class="invalid-feedback errorPendidikan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="jurusan" name="jurusan">
                        <div id="validationServer03Feedback" class="invalid-feedback errorJurusan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asal_kampus" class="col-sm-2 col-form-label">Asal Kampus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="asal_kampus" name="asal_kampus">
                        <div id="validationServer03Feedback" class="invalid-feedback errorAsalKampus">
                        </div>
                    </div>
                </div>
        </div>

        <div class="form-group row mr-2">
            <div class="col-sm-12 text-right ">
                <button type="submit" class="btn btn-primary btnsimpan">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>

</div>

<?= $this->endSection('') ?>