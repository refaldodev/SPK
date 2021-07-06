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
             <form action="/datadosen/save" method="post" class="simpandata">
                 <?= csrf_field(); ?>
                 <div class="form-group row">
                     <label for="nidn" class="col-sm-2 col-form-label">Nidn</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control <?= ($validation->hasError('nidn')) ? 'is-invalid' : '' ?>" id="nidn" name="nidn" value="<?= old('nidn') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback errorNidn">
                         </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback errorNama">
                         </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= old('jabatan') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback errorJabatan">

                         </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= old('pendidikan') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback errorPendidikan">
                         </div>
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control " id="jurusan" name="jurusan" value="<?= old('jurusan') ?>">
                         <div id="validationServer03Feedback" class="invalid-feedback errorJurusan">
                         </div>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="asal_kampus" class="col-sm-2 col-form-label">Asal Kampus</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control " id="asal_kampus" name="asal_kampus" value="<?= old('asal_kampus') ?>">
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

 <script>
     $(document).ready(function() {
         $('.simpandata').submit(function(e) {
             e.preventDefault();
             $.ajax({
                 type: "post",
                 url: $(this).attr('action'),
                 data: $(this).serialize(),
                 beforeSend: function() {
                     $('.btnsimpan').attr('disable', 'disabled');
                     $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"> </i>');
                 },
                 complete: function() {
                     $('.btnsimpan').remove('disable');
                     $('.btnsimpan').html('Tambah');

                 },
                 dataType: "json",
                 success: function(response) {
                     if (response.error) {
                         if (response.error.nidn) {
                             $('#nidn').addClass('is-invalid');
                             $('.errorNidn').html(response.error.nidn);
                         } else {
                             $('#nidn').removeClass('is-invalid');
                             $('.errorNidn').html('');
                         }
                         if (response.error.nama) {
                             $('#nama').addClass('is-invalid');
                             $('.errorNama').html(response.error.nama);
                         } else {
                             $('#nama').removeClass('is-invalid');
                             $('.errorNama').html('');
                         }
                         if (response.error.jabatan) {
                             $('#jabatan').addClass('is-invalid');
                             $('.errorJabatan').html(response.error.jabatan);
                         } else {
                             $('#nidn').removeClass('is-invalid');
                             $('.errorNidn').html('');
                         }
                         if (response.error.pendidikan) {
                             $('#pendidikan').addClass('is-invalid');
                             $('.errorPendidikan').html(response.error.pendidikan);
                         } else {
                             $('#pendidikan').removeClass('is-invalid');
                             $('.errorPendidikan').html('');
                         }
                         if (response.error.jurusan) {
                             $('#jurusan').addClass('is-invalid');
                             $('.errorJurusan').html(response.error.jurusan);
                         } else {
                             $('#jurusan').removeClass('is-invalid');
                             $('.errorJurusan').html('');
                         }
                         if (response.error.asal_kampus) {
                             $('#asal_kampus').addClass('is-invalid');
                             $('.errorAsalKampus').html(response.error.asal_kampus);
                         } else {
                             $('#asal_kampus').removeClass('is-invalid');
                             $('.errorAsalKampus').html('');
                         }
                     } else {
                         Swal.fire({
                             icon: 'success',
                             title: 'Berhasil',
                             text: response.sukses,
                             confirmButtonColor: '#3085d6'
                         }).then(result => {

                             if (result.value) {
                                 window.location.href = '/datadosen';
                             } else {
                                 window.location.href = '/datadosen';
                             }

                         })

                     }

                 }
             });
         })

     })
 </script>
 <?= $this->endSection('') ?>