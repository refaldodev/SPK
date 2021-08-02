<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter</h6>
        </div>
        <div class="card-body">
            <form action="" method="GET">
                <div class="form-group row">
                    <label for="C1" class="col-4 col-form-label">Filter Berdasarkan Semester dan Periode </label>
                    <div class="col-8">
                        <select class="form-control periode" id="periode" name="periode">
                            <option value="null" selected="true" disabled="disabled"> -- Pilih ---</option>
                            <?php foreach ($periode as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['periode'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorperiode">

                        </div>
                    </div>
                </div>
                <div class="form-group row mr-2">
                    <div class="col-sm-12 text-right ">
                        <button type="submit" class="btn btn-primary btnsimpan ">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Pemberitahuan</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                Pastikan sebelum mengisi penilaian.<strong> Data diri dosen </strong>sudah terisi dengan baik.
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penilaian Dosen</h6>
        </div>
        <div class="card-body">
            <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
            <a href="/datadosen/create" class="btn btn-danger btn-icon-split mb-3">
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Artikel</button> <br> <br> -->
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Dosen</span>

            </a>
            <!-- <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;  ?> -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nidn</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Pendidikan</th>
                            <th>Jurusan</th>
                            <th>Asal Kampus</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($nilaidosen as $nilai) :  ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $nilai['nidn'] ?></td>
                                <td><?= $nilai['nama'] ?></td>
                                <td><?= $nilai['jabatan'] ?></td>
                                <td><?= $nilai['pendidikan'] ?></td>
                                <td><?= $nilai['jurusan'] ?></td>
                                <td><?= $nilai['asal_kampus'] ?></td>
                                <td>
                                    <?php if (isset($_GET['periode'])) { ?>
                                        <?php if ($nilai['id_periode'] == $_GET['periode']) { ?>
                                            <a href="/datadosen/editnilai/<?= $nilai['nidn'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success"><i class="fas fa-check-circle"></i> Sudah dinilai</a>
                                        <?php } else { ?>
                                            <a href="/datadosen/tambahnilai/<?= $nilai['nidn'] ?>" data-toggle="tooltip" data-placement="top" title="Nilai" class="btn btn-primary"><i class="far fa-edit"></i> Isi Penilaian</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($nilai['id_periode']) { ?>
                                            <a href="/datadosen/editnilai/<?= $nilai['nidn'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success"><i class="fas fa-check-circle"></i> Sudah dinilai</a>
                                        <?php } else { ?>
                                            <a href="/datadosen/tambahnilai/<?= $nilai['nidn'] ?>" data-toggle="tooltip" data-placement="top" title="Nilai" class="btn btn-primary"><i class="far fa-edit"></i> Isi Penilaian</a>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- data penilaian dosen -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>

</script>
<?= $this->endSection('') ?>