<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Jurusan</th>

            <th>Action</th>

        </tr>
    </thead>

    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($tampildata as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td>
                    <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary" onclick="edit('<?= $row['nim'] ?>')"><i class="far fa-edit"></i></button>
                    <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger" onclick="hapus('<?= $row['nim'] ?>')"><i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>


    </tbody>
</table>

<script>
    $(document).ready(function() {


        $('#dataTable').DataTable();

    });

    function edit(nim) {
        $.ajax({
            type: "post",
            url: "<?= site_url('mahasiswa/formedit') ?>",
            data: {
                nim: nim
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        });


    }

    function hapus(nim) {
        Swal.fire({
            title: 'Hapus',
            text: `Apakah anda yakin ingin menghapus data ini dengan nim ${nim}?`,
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
                    url: "<?= site_url('mahasiswa/hapus') ?>",
                    data: {
                        nim: nim
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
                            datamahasiswa();
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