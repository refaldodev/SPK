<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid ">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data SubKriteria</h6>
            <a href="/subkriteria" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>


        <div class="card-body">

            <form action="/subkriteria/update" method="post" class="ubahdata">
                <?= csrf_field(); ?>
                <input type="text" class="form-control " id="id_subkriteria" name="id_subkriteria" value="<?= $subkriteria['id_subkriteria']  ?>" hidden>
                <div class="form-group row">
                    <label for="subkriteria" class="col-sm-2 col-form-label">SubKriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="subkriteria" name="subkriteria" value="<?= $subkriteria['subkriteria'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bobot" class="col-sm-2 col-form-label">Bobot</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control " id="bobot" name="bobot" value="<?= $subkriteria['bobot'] ?>" min="0" max="1" step="0.01">
                        <div id="validationServer03Feedback" class="invalid-feedback errorBobot">
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group row mr-2">

            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary tambahdata">Tambah</button>
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
                    $('.tambahdata').attr('disable', 'disabled');
                    $('.tambahdata').html('<i class="fa fa-spin fa-spinner"> </i>');
                },
                complete: function() {
                    $('.tambahdata').remove('disable');
                    $('.tambahdata').html('Tambah');

                },
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        if (response.error.bobot) {
                            $('#bobot').addClass('is-invalid');
                            $('.errorBobot').html(response.error.bobot);
                        } else {
                            $('#bobot').removeClass('is-invalid');
                            $('.errorBobot').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                            confirmButtonColor: '#3085d6'
                        }).then(result => {

                            if (result.value) {
                                window.location.href = '/subkriteria';
                            } else {
                                window.location.href = '/subkriteria';
                            }

                        })
                    }
                    if (response.sukses) {

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