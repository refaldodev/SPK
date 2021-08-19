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
            <form action="/datadosen/update" method="post" class="ubahdata">
                <?= csrf_field(); ?>
                <input type="text" class="form-control " name="nidnhidden" value="<?= $dosen['nidn'] ?>" hidden>
                <div class="form-group row">
                    <label for="nidn" class="col-sm-2 col-form-label">Nidn</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="nidn" name="nidn" value="<?= $dosen['nidn'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback errorNidn">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $dosen['nama']  ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <select class="form-control prodi" id="prodi" name="prodi">
                            <option value="Sistem Informasi" <?= $dosen['prodi'] == 'Sistem Informasi' ? 'Selected' : null ?>>Sistem Informasi</option>
                            <option value="Teknik Informatika" <?= $dosen['prodi'] == 'Teknik Informatika' ? 'Selected' : null ?>>Teknik Informatika</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorProdi">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-control jabatan" id="jabatan" name="jabatan">
                            <option value="Guru Besar" <?= $dosen['jabatan'] == 'Guru Besar' ? 'Selected' : null ?>>Guru Besar</option>

                            <option value="Lektor Kepala" <?= $dosen['jabatan'] == 'Lektor Kepala' ? 'Selected' : null ?>>Lektor Kepala</option>
                            <option value="Lektor" <?= $dosen['jabatan'] == 'Lektor' ? 'Selected' : null ?>>Lektor</option>
                            <option value="Asisten Ahli" <?= $dosen['jabatan'] == 'Asisten Ahli' ? 'Selected' : null ?>>Asisten Ahli</option>
                            <option value="Tenaga Pengajar" <?= $dosen['jabatan'] == 'Tenaga Pengajar' ? 'Selected' : null ?>>Tenaga Pengajar</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorJabatan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pendidikan" class="col-sm-2 col-form-label">Pendidikan </label>
                    <div class="col-sm-10">
                        <select class="form-control pendidikan" id="pendidikan" name="pendidikan">

                            <option value="Strata 2" <?= $dosen['pendidikan'] == 'Strata 2' ? 'Selected' : null ?>>Strata 2</option>
                            <option value="Strata 3" <?= $dosen['pendidikan'] == 'Strata 3' ? 'Selected' : null ?>>Strata 3</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorPendidikan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-control jurusan" id="jurusan" name="jurusan">
                            <option value="Sistem Informasi" <?= $dosen['jurusan'] == 'Sistem Informasi' ? 'Selected' : null ?>>Sistem Informasi</option>
                            <option value="Teknik Informatika" <?= $dosen['jurusan'] == 'Teknik Informatika' ? 'Selected' : null ?>>Teknik Informatika</option>

                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorJurusan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="asal_kampus" class="col-sm-2 col-form-label">Asal Kampus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="asal_kampus" name="asal_kampus" value="<?= $dosen['asal_kampus'] ?>">

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
        $('.ubahdata').submit(function(e) {
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



                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        })

    })
</script>
<?= $this->endSection('') ?>