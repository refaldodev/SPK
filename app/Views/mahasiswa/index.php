<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">Data Dosen</h6>
        </div>
        <div class="card-body">
            <!-- <a href="#" class="btn btn-default btn-md mb-3" data-toggle="modal" data-target="#modal-default"><i class=" fas fa-plus"></i> Tambah User</a> -->
            <button class="btn btn-danger btn-icon-split mb-3 tomboltambah" type="button">
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Artikel</button> <br> <br> -->
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Mahasiswa</span>

            </button>

            <div class="table-responsive viewdata">

            </div>
        </div>
    </div>
</div>
</div>
<div class="viewmodal" style="display:none;">
</div>
<script>
    function datamahasiswa() {
        $.ajax({
            url: "<?= site_url('mahasiswa/ambildata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        });

    }
    // datamahasiswa();

    $(document).ready(function() {

        datamahasiswa();

        $('#dataTable').DataTable();
        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('mahasiswa/formtambah') ?>",
                type: "post",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show')
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });

        })
    });
</script>
<?= $this->endSection('') ?>