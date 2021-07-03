<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('mahasiswa/updatedata', ['class ' => 'formmahasiswa']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="nim" name="nim" id="nim" value="<?= $nim; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" id="nama" value="<?= $nama; ?>">

                    </div>
                </div>
                <div class=" form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" id="jurusan" value="<?= $jurusan; ?>">

                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.formmahasiswa').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"> </i>');
                },
                complete: function() {
                    $('.btnsimpan').remove('disable');
                    $('.btnsimpan').html('Update');

                },
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses,
                        confirmButtonColor: '#3085d6'
                    })
                    $('#modaledit').modal('hide');
                    datamahasiswa();

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });

        })
    })
</script>