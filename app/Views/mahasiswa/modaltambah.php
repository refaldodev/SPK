<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('mahasiswa/save', ['class ' => 'formmahasiswa']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="nim" name="nim" id="nim">
                        <div id="validationServer03Feedback" class="invalid-feedback errorNim">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" id="nama">
                        <div id="validationServer03Feedback" class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" id="jurusan">
                        <div id="validationServer03Feedback" class="invalid-feedback errorJurusan">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Tambah</button>
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
                    $('.btnsimpan').html('Tambah');

                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nim) {
                            $('#nim').addClass('is-invalid');
                            $('.errorNim').html(response.error.nim);
                        } else {
                            $('#nim').removeClass('is-invalid');
                            $('.errorNim').html('');
                        }
                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        if (response.error.jurusan) {
                            $('#jurusan').addClass('is-invalid');
                            $('.errorJurusan').html(response.error.jurusan);
                        } else {
                            $('#jurusan').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                            confirmButtonColor: '#3085d6'
                        })
                        $('#modaltambah').modal('hide');
                        datamahasiswa();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });

        })
    })
</script>