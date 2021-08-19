<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <!-- <a href="/kriteria/create" class="btn btn-danger btn-icon-split mb-3"> -->
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Artikel</button> <br> <br> -->
            <!-- <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Kriteria</span>

            </a> -->
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;  ?>
            <?php if (session()->getFlashdata('pesanupdate')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesanupdate') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;  ?>
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
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
                                <td>C<?= $no++ ?></td>
                                <td><?= $data['kriteria'] ?></td>
                                <td><?= $data['peringkat'] ?></td>
                                <td><?= $data['bobot'] ?></td>
                                <td>
                                    <a href="/kriteria/edit/<?= $data['kriteria'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                    <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger" onclick="hapuskriteria('<?= $data['id'] ?>')"><i class="far fa-trash-alt"></i></button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <!-- <div class="viewmodal" style="display: none;">
    </div> -->
</div>
</div>

<script>
    function hapuskriteria(id) {
        Swal.fire({
            title: 'Hapus',
            text: `Apakah anda yakin ingin menghapus data ini ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('kriteria/hapus') ?>",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                                confirmButtonColor: '#3085d6',

                            })
                            location = '/kriteria'
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }
                });

            }
        })
    }
</script>
<?= $this->endSection('') ?>