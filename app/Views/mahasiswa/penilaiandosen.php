<?= $this->extend('admintemplate/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Tata Cara Penilaian</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">

                <p><strong>Petunjuk Pengisian</strong></p>
                <ol>
                    <li> Isilah identitas anda dengan lengkap dan benar.</li>
                    <li> Baca dan cermati setiap pernyataan yang diberikan.</li>
                    <li> Beri penilaian pada setiap pernyataan yang diberikan.</li>
                </ol>



                <p> <strong>Adapun kriteria jawaban dengan nilai sebagai berikut : </strong></p>
                <ol>
                    <li>Sangat Kurang</li>
                    <li>Kurang</li>
                    <li>Cukup</li>
                    <li>Baik</li>
                    <li>Sangat Baik</li>


                </ol>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Data Penilaian</h6>
            <a href="/nilai" class="m-0 font-weight-bold btn btn-primary text-white "> <i class="fas fa-undo"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->



            <form action="/mahasiswa/savepenilaian" method="post" class="btntambahpenilaian">
                <?= csrf_field() ?>
                <input type="text" value="<?= $nilaidosen['id_nilai'] ?>" name="id_nilai" hidden>
                <input type="text" value="<?= $nilaidosen['id_dosen'] ?>" name="id_dosen" hidden>
                <input type="text" value="<?= session()->get('nidn')  ?>" name="nidn" hidden>

                <div class="alert alert-success" role="alert">
                    Kesiapan Mengajar</div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">1. Dosen datang tepat waktu sesuai jadwal</label>
                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp </label>
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="1" required>
                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik</label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">2. Dosen menjelaskan tentang Rencana Pembelajaran Semester (RPS)</label>

                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang&nbsp</label>
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question2" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">3. Dosen Menjelaskan Materi sesuai Rencana Pembelajaran Semester (RPS)</label>
                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp</label>
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="3">

                    </div>


                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question3" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">4. Dosen menjelaskan materi dengan mudah dimengerti</label>
                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp</label>
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="1" required>

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">5. Dosen memotivasi mahasiswa untuk belajar dan memicu partisipasi di kelas</label>

                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang&nbsp </label>
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="4">


                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">6. Dosen memberikan tugas kepada mahasiswa sesuai dengan materi ajar
                    </label>
                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp</label>
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="2">

                    </div>


                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="3">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="4">

                    </div>


                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">7. Dosen memiliki kemampuan memberikan contoh / kasus sesuai dengan materi ajar
                    </label>
                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp </label>
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik</label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">8. Dosen membuat soal sesuai dengan Rencana Pembelajaran Semester (RPS)
                    </label>
                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp</label>
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="3">

                    </div>


                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question8" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">9. Dosen mampu menegakkan disiplin di kelas
                    </label>

                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label" for="inlineRadio1">Sangat Kurang &nbsp</label>
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question9" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik </label>

                    </div>
                </div>
                <div class="form-group row col-12">
                    <label for="staticEmail" class="col-sm-12 col-lg-8 col-form-label">10. Dosen menjalin komunikasi dengan mahasiswa
                    </label>

                    <div class="form-check form-check-inline  ">
                        <label class="form-check-label d-block" for="inlineRadio1">Sangat Kurang &nbsp</label>
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="1" required>

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="2">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="3">

                    </div>

                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="4">

                    </div>
                    <div class="form-check form-check-inline  ">
                        <input class="form-check-input" type="radio" name="question10" id="inlineRadio1" value="5">
                        <label class="form-check-label" for="inlineRadio1">Sangat Baik &nbsp </label>

                    </div>
                </div>
                <div class="form-group row mr-2">

                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary btnsimpan">Simpan Penilaian</button>
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
                    $('.btnsimpan').html('Simpan Penilaian');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses,
                        confirmButtonColor: '#485d6'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = '/nilai';
                        } else {
                            window.location.href = '/nilai';
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