<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
        </div>
        <div class="card-body">
            <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kriteria</th>
                            <th>Peringkat</th>
                            <th>Bobot</th>
                            <th>Detail</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kriteria as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kriteria'] ?></td>
                                <td><?= $data['peringkat'] ?></td>
                                <td><?= $data['bobot'] ?></td>
                                <td>
                                    <a href="/kriteria/<?= $data['kriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-outline-info"><i class="fa fa-search-plus"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection('') ?>