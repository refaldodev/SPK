<?= $this->extend('admintemplate/template') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan</h6>
            <form action="/perhitungan/datajson" method="POST" class="">
                <div class="form-group row">
                    <label for="filter" class="col-sm-6 col-form-label">Program Studi</label>
                    <div class="col-sm-6">
                        <select class="form-control " id="filter" name="filter">
                            <option value="null" selected="true" disabled="disabled">-- Pilih ---</option>
                            <option value="Semester Ganjil Periode 2019-2020">Semester Ganjil Periode 2019-2020</option>
                            <option value="Semester Genap Periode 2019-2020">Semester Genap Periode 2019-2020</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback errorfilter">
                        </div>
                    </div>
                </div>
                <div class="form-group row mr-2">

                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary submit" name="submit">Filter Data</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- data penilaian dosen -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Perhitungan Nilai Utility </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableUtility" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                            <th>Jabatan</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>

                        </tr>
                    </thead>

                    <tbody>

                        <tr>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $.getJSON('/perhitungan/datajson', function(result) {
        var data = [result];
        // a +=result;
        var i = 1;
        $.each(data, function(i, data) {

            var data = data;

            $('#myTable').DataTable({
                data: data,
                columns: [{
                        "data": "nama"
                    },
                    {
                        "data": "pendidikan"
                    },
                    {
                        "data": "jabatan"
                    },
                    {
                        "data": "C1"
                    },
                    {
                        "data": "C2"
                    },
                    {
                        "data": "C3"
                    },
                    {
                        "data": "C4"
                    },
                    {
                        "data": "C5"
                    },
                    {
                        "data": "C6"
                    },


                ],
                responsive: true,
                row: '#b0bed9'
            });
        });
    });
</script>
<?= $this->endSection('') ?>