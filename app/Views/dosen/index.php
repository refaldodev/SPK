<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
            <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
            <a href="<?= base_url('artikel_admin/tambah_artikel') ?>" class="btn btn-primary btn-icon-split mb-3">
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Artikel</button> <br> <br> -->
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Artikel</span>
            </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Pendidikan</th>
                            <th>Asal Kampus</th>
                            <th>Program Studi</th>
                            <th>Lama Mengajar</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($dosen as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jabatan'] ?></td>
                                <td><?= $data['pendidikan'] ?></td>
                                <td><?= $data['asal_kampus'] ?></td>
                                <td><?= $data['program_studi'] ?></td>
                                <td><?= $data['lama_mengajar'] ?></td>
                                <td>
                                    <a href="/datadosen/<?= $data['nama'] ?>" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-outline-info"><i class="fa fa-search-plus"></i></a>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection('') ?>