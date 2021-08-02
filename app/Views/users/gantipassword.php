<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid ">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
            <a href="/dashboard" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>


        <div class="card-body">

            <form action="/users/ubahpassword" method="post" class="simpandata">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control  " id="opwd" name="opwd">
                        <div id="validationServer03Feedback " class="invalid-feedback errorOpwd">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control  " id="npwd" name="npwd">
                        <div id="validationServer03Feedback " class="invalid-feedback errorNpwd">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control  " id="cnpwd" name="cnpwd">
                        <div id="validationServer03Feedback " class="invalid-feedback errorCnpwd">
                        </div>
                    </div>
                </div>

        </div>
        <div class="form-group row mr-2">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary btnsimpan">Ganti Password</button>
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
                    $('.btnsimpan').html('Ganti Password');

                },
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        if (response.error.opwd) {
                            $('#opwd').addClass('is-invalid');
                            $('.errorOpwd').html(response.error.opwd);
                        } else {
                            $('#opwd').removeClass('is-invalid');
                            $('.errorOpwd').html('');
                        }
                        if (response.error.npwd) {
                            $('#npwd').addClass('is-invalid');
                            $('.errorNpwd').html(response.error.npwd);
                        } else {
                            $('#npwd').removeClass('is-invalid');
                            $('.errorNpwd').html('');
                        }
                        if (response.error.cnpwd) {
                            $('#cnpwd').addClass('is-invalid');
                            $('.errorCnpwd').html(response.error.cnpwd);
                        } else {
                            $('#cnpwd').removeClass('is-invalid');
                            $('.errorCnpwd').html('');
                        }

                    } else {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                                confirmButtonColor: '#3085d6'
                            }).then(result => {

                                if (result.value) {
                                    window.location.href = '/gantipassword';
                                } else {
                                    window.location.href = '/gantipassword';
                                }
                            })

                        }
                        if (response.salah) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oopss..',
                                text: response.salah,
                                confirmButtonColor: '#3085d6'
                            }).then(result => {

                                if (result.value) {
                                    window.location.href = '/users/gantipassword';
                                } else {
                                    window.location.href = '/users/gantipassword';
                                }
                            })

                        }
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