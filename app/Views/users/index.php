<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
        </div>
        <div class="card-body">
            <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
            <a href="/users/create" class="btn btn-danger btn-icon-split mb-3">
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Artikel</button> <br> <br> -->
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Users</span>
            </a>
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTableUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nidn</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['nidn'] ?></td>

                                <td><?= $user['nama'] ?></td>
                                <td>
                                    <?php if ($user['level'] == 1) {
                                        echo 'Admin';
                                    } else if ($user['level'] == 2) {
                                        echo  'Mahasiswa';
                                    } else if ($user['level'] == 3) {
                                        echo  'Dosen';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="/users/edit/<?= $user['nidn'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                    <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger deletedata" onclick="hapus(<?= $user['nidn'] ?>)"><i class="far fa-trash-alt "></i></button>

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
    function hapus(nidn) {
        Swal.fire({
            title: 'Hapus',
            text: `Apakah anda yakin ingin menghapus data dengan nidn ${nidn} ?`,
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
                    url: "<?= site_url('users/hapus') ?>",
                    data: {
                        nidn: nidn
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                                confirmButtonColor: '#3085d6',
                            }).then(response => {
                                if (response.value) {
                                    window.location.href = '/users';

                                } else {
                                    window.location.href = '/users';
                                }
                            })

                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }
                });

            }
        })
    }
    $(document).ready(function() {

        $('#dataTableUser').DataTable({
            "order": [
                [2, "asc"]
            ],

        });
    });
</script>
<?= $this->endSection('') ?>