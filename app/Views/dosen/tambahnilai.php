<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Penilaian Dosen</h6>
            <a href="/datadosen/penilaiandosen" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <form action="/datadosen/savepenilaian" method="post" class="simpandata">
                <?= csrf_field(); ?>

                <input type="text" class="form-control" id="id_dosen" name="id_dosen" value="<?= $dosen['nidn'] ?>" hidden>

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $dosen['nama'] ?>" readonly>
                        <div id="validationServer03Feedback" class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="C1" class="col-sm-2 col-form-label">Penelitian Bermutu </label>
                    <div class="col-sm-10">
                        <select class="form-control C1" id="C1" name="C1">
                            <option value="null" selected="true" disabled="disabled"> -- Pilih ---</option>
                            <option value="0.52">Jurnal Internasional Terakreditasi</option>
                            <option value="0.27">Jurnal Internasional</option>
                            <option value="0.14">Jurnal Nasional Terakreditasi</option>
                            <option value="0.04">Jurnal Nasional</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorC1">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="C2" class="col-sm-2 col-form-label">Pengabdian Masyarakat </label>
                    <div class="col-sm-10">
                        <input type="number" step="0" min="0" max="100" class="form-control" id="C2" name="C2">
                        <div id="validationServer03Feedback" class="invalid-feedback errorC2">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="C3" class="col-sm-2 col-form-label">Kompetensi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="C3" name="C3">
                        <div id="validationServer03Feedback" class="invalid-feedback errorC3">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="C4" class="col-sm-2 col-form-label">Pendidikan </label>
                    <div class="col-sm-10">
                        <select class="form-control C4" id="C4" name="C4">
                            <option value="0.75" <?= $dosen['pendidikan'] === 'Strata 2' ? 'Selected' : '' ?>>Strata 2</option>
                            <option value="0.25" <?= $dosen['pendidikan'] === 'Strata 3' ? 'Selected' : 'null' ?>>Strata 3</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorC4">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="C5" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-control C5" id="C5" name="C5">
                            <option value="null" selected="true" disabled="disabled"> -- Pilih ---</option>
                            <option value="0.52" <?= $dosen['jabatan'] === 'Guru Besar' ? 'Selected' : '' ?>>Guru Besar</option>
                            <option value="0.27" <?= $dosen['jabatan'] === 'Lektor' ? 'Selected' : '' ?>>Lektor</option>
                            <option value="0.14" <?= $dosen['jabatan'] === 'Asisten Ahli' ? 'Selected' : '' ?>>Asisten Ahli</option>
                            <option value="0.04" <?= $dosen['jabatan'] === 'Tenaga Pengajar' ? 'Selected' : '' ?>>Tenaga Pengajar</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorC5">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="C6" class="col-sm-2 col-form-label">Lama Mengajar </label>
                    <div class="col-sm-10">
                        <select class="form-control C6" id="C6" name="C6">
                            <option value="null" selected="true" disabled="disabled"> -- Pilih ---</option>
                            <option value="0.61">Lebih dari 10 Tahun</option>
                            <option value="0.28">Lebih dari 5 Tahun dan Kurang Dari 10 Tahun</option>
                            <option value="0.11"> Kurang Dari 5 Tahun</option>

                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorC6">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="periode" class="col-sm-2 col-form-label">Periode </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="periode" name="periode" placeholder="e.g Semester Ganjil Periode 2021-2022">
                        <div id="validationServer03Feedback" class="invalid-feedback errorPeriode">

                        </div>
                    </div>
                </div>
        </div>

        <div class="form-group row mr-2">
            <div class="col-sm-12 text-right ">
                <button type="submit" class="btn btn-primary btnsimpan ">Tambah Data</button>
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
                        if (response.error.C1) {
                            $('#C1').addClass('is-invalid');
                            $('.errorC1').html(response.error.C1);
                        } else {
                            $('#C1').removeClass('is-invalid');
                            $('.errorC1').html('');
                        }
                        if (response.error.C2) {
                            $('#C2').addClass('is-invalid');
                            $('.errorC2').html(response.error.C2);
                        } else {
                            $('#C2').removeClass('is-invalid');
                            $('.errorC2').html('');
                        }
                        if (response.error.C3) {
                            $('#C3').addClass('is-invalid');
                            $('.errorC3').html(response.error.C3);
                        } else {
                            $('#C3').removeClass('is-invalid');
                            $('.errorC3').html('');
                        }
                        if (response.error.C4) {
                            $('#C4').addClass('is-invalid');
                            $('.errorC4').html(response.error.C4);
                        } else {
                            $('#C4').removeClass('is-invalid');
                            $('.errorC4').html('');
                        }
                        if (response.error.C5) {
                            $('#C5').addClass('is-invalid');
                            $('.errorC5').html(response.error.C5);
                        } else {
                            $('#C5').removeClass('is-invalid');
                            $('.errorC5').html('');
                        }
                        if (response.error.C6) {
                            $('#C6').addClass('is-invalid');
                            $('.errorC6').html(response.error.C6);
                        } else {
                            $('#C6').removeClass('is-invalid');
                            $('.errorC6').html('');
                        }
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
                                window.location.href = '/datadosen/penilaiandosen';
                            } else {
                                window.location.href = '/datadosen/penilaiandosen';
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