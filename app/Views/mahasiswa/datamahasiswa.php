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

                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                    <a href="" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>


    </tbody>
</table>

<script>
    $(document).ready(function() {


        $('#dataTable').DataTable();

    });
</script>