<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
            <a href="/periode" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <form action="/periode/update" method="post" class="ubahdata">
                <?= csrf_field(); ?>
                <input type="text" class="form-control" id="id" name="id" value="<?= $periode['id'] ?>" placeholder=" Semester Ganjil Periode 2019-2020" hidden>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Periode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="periode" name="periode" value="<?= $periode['periode'] ?>" placeholder=" Semester Ganjil Periode 2019-2020">
                        <div id="validationServer03Feedback" class="invalid-feedback errorPeriode">
                        </div>
                    </div>
                </div>

        </div>

        <div class="form-group row mr-2">
            <div class="col-sm-12 text-right ">
                <button type="submit" class="btn btn-primary btnsimpan ">Edit Data</button>
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
                    $('.btnsimpan').html('Edit Data');
                },
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        if (response.error.periode) {
                            $('#periode').addClass('is-invalid');
                            $('.errorPeriode').html(response.error.periode);
                        } else {
                            $('#periode').removeClass('is-invalid');
                            $('.errorPeriode').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                            confirmButtonColor: '#3085d6'
                        }).then(result => {

                            if (result.value) {
                                window.location.href = '/periode';
                            } else {
                                window.location.href = '/periode';
                            }
                        })

                    }

                }
            });
        })

    })
</script>
<?= $this->endSection('') ?>