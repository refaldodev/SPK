<?= $this->extend('admintemplate/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penilaian</h6>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->



            <form action="/mahasiswa/savepenilaian" method="post" class="btntambahpenilaian">
                <?= csrf_field() ?>
                <input type="text" value="<?= $dosen['nidn'] ?>" name="id_dosen">
                <div class="alert alert-success" role="alert">
                    Kesiapan Mengajar</div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">1. Dosen datang tepat waktu sesuai jadwal</label>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">2. Dosen menjelaskan tentang Rencana Pembelajaran Semester (RPS)</label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">3. Dosen Menjelaskan Materi sesuai Rencana Pembelajaran Semester (RPS)</label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">4. Dosen menjelaskan materi dengan mudah dimengerti</label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="10">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">5. Dosen memotivasi mahasiswa untuk belajar dan memicu partisipasi di kelas</label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">6. Dosen memberikan tugas kepada mahasiswa sesuai dengan materi ajar
                    </label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">7. Dosen memiliki kemampuan memberikan contoh / kasus sesuai dengan materi ajar
                    </label>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">8. Dosen membuat soal sesuai dengan Rencana Pembelajaran Semester (RPS)
                    </label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">9. Dosen mampu menegakkan disiplin di kelas
                    </label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-6 col-form-label">2. Dosen menjalin komunikasi dengan mahasiswa
                    </label>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="4">
                        <label class="form-check-label" for="inlineRadio1">Baik</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="3">
                        <label class="form-check-label" for="inlineRadio1">Cukup</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="2">
                        <label class="form-check-label" for="inlineRadio1">Kurang</label>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="1">
                        <label class="form-check-label d-block" for="inlineRadio1">Sangat Kurang </label>

                    </div>
                </div>
                <div class="form-group row mr-2">

                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary btnsimpan">Tambah Data</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
</div>
<script>
    $(document).ready(function() {
        $('.btntambahpenilaian').submit(function(e) {
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
                    $('.btnsimpan').html('Tambah Data');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses,
                        confirmButtonColor: '#485d6'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = '/mahasiswa/nilai';
                        } else {
                            window.location.href = '/mahasiswa/nilai';
                        }


                    })


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        })
    })
</script>
<?= $this->endSection() ?>