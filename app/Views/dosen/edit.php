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
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $dosen['nama'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $dosen['jabatan'] ?>">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $dosen['pendidikan'] ?>">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="jurusan" name="jurusan" value="<?= $dosen['jurusan'] ?>">

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
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        })

    })
</script>
<?= $this->endSection('') ?>