<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid ">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            <a href="/users" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>


        <div class="card-body">

            <form action="/users/update" method="post" class="simpandata">
                <?= csrf_field(); ?>
                <input type="text" class="form-control " id="nidnhidden" name="nidnhidden" value="<?= $users['nidn'] ?>" hidden>

                <div class="form-group row">
                    <label for="Nidn" class="col-sm-2 col-form-label">Nidn</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="nidn" name="nidn" value="<?= $users['nidn'] ?>">
                        <div id="validationServer03Feedback " class="invalid-feedback errorNidn">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="nama" name="nama" value="<?= $users['nama'] ?>">

                        <div id="validationServer03Feedback  " class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control  " id="password" name="password">
                        <div id="validationServer03Feedback " class="invalid-feedback errorPassword">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                        <select class="form-control " id="prodi" name="level">
                            <option disabled="disabled">-- Pilih ---</option>
                            <option value="1" <?= $users['level'] == 1 ? 'Selected' : '' ?>>Admin</option>
                            <option value="2" <?= $users['level'] == 2 ? 'Selected' : '' ?>>Mahasiswa</option>
                            <option value="3" <?= $users['level'] == 3 ? 'Selected' : '' ?>>Dosen</option>
                        </select>
                        <div id="validationServer03Feedback " class="invalid-feedback errorLevel ">
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group row mr-2">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary btnsimpan">Ubah Data</button>
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
                    $('.btnsimpan').html('Ubah Data');

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

                        if (response.error.password2) {
                            $('#password').addClass('is-invalid');
                            $('.errorPassword').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('.errorPassword').html('');
                        }

                        if (response.error.level) {
                            $('#level').addClass('is-invalid');
                            $('.errorLevel').html(response.error.level);
                        } else {
                            $('#level').removeClass('is-invalid');
                            $('.errorLevel').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                            confirmButtonColor: '#3085d6'
                        }).then(result => {

                            if (result.value) {
                                window.location.href = '/users';
                            } else {
                                window.location.href = '/users';
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