 <?= $this->extend('admintemplate/template') ?>

 <?= $this->section('content') ?>
 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
         </div>
         <div class="card-body">
             <form action="/datadosen/save" method="post">
                 <?= csrf_field(); ?>
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="nama" name="nama">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="jabatan" name="jabatan">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="asalkampus" class="col-sm-2 col-form-label">Asal Kampus</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="asalkampus" name="asal_kampus">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="prodi" class="col-sm-2 col-form-label">Program studi</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="prodi" name="program_studi">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="lama_mengajar" class="col-sm-2 col-form-label">Lama Mengajar</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="lama_mengajar" name="lama_mengajar">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-10 ">
                         <button type="submit" class="btn btn-primary">Tambah Data</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 </div>

 <?= $this->endSection('') ?>