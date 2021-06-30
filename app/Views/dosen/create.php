 <?= $this->extend('admintemplate/template') ?>

 <?= $this->section('content') ?>
 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header py-3 d-flex justify-content-between">
             <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
             <a href="/datadosen" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                 Kembali</a>
         </div>


         <div class="card-body">
             <form action="/datadosen/save" method="post">
                 <?= csrf_field(); ?>
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback">
                             <?= $validation->getError('nama') ?> </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>" id=" jabatan" name="jabatan" value="<?= old('jabatan') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback">
                             <?= $validation->getError('jabatan') ?>
                         </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : '' ?>" id="pendidikan" name="pendidikan" value="<?= old('pendidikan') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback">
                             <?= $validation->getError('pendidikan') ?> </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="asal_kampus" class="col-sm-2 col-form-label">Asal Kampus</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('asal_kampus')) ? 'is-invalid' : '' ?>" id="asal_kampus" name="asal_kampus" value="<?= old('asal_kampus') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback">
                             <?= $validation->getError('asal_kampus') ?> </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('program_studi')) ? 'is-invalid' : '' ?>" id="program_studi" name="program_studi" value="<?= old('program_studi') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback">
                             <?= $validation->getError('program_studi') ?> </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="lama_mengajar" class="col-sm-2 col-form-label">Lama Mengajar</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('lama_mengajar')) ? 'is-invalid' : '' ?>" id="lama_mengajar" name="lama_mengajar" value="<?= old('lama_mengajar') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback">
                             <?= $validation->getError('lama_mengajar') ?> </div>
                     </div>
                 </div>
         </div>

         <div class="form-group row mr-2">
             <div class="col-sm-12 text-right ">
                 <button type="submit" class="btn btn-primary">Tambah Data</button>
             </div>
         </div>
         </form>
     </div>
 </div>

 </div>

 <?= $this->endSection('') ?>