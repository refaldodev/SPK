<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 m-auto">

                                <div class="p-5">
                                    <div class="text-center mb-3">
                                        <img src="/assets/img/logo.png" alt="logo" width="100%">
                                    </div>
                                    <form action="/auth/check_login" method="post" class="login">


                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nidn" placeholder="Enter Nidn / Nim..." name="nidn" value="<?= old('nidn') ?>" autofocus>
                                            <div id="validationServer03Feedback" class="invalid-feedback errorNidn">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">

                                            <div id="validationServer03Feedback" class="invalid-feedback errorPassword">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-outline-danger btn-user btn-block btnsimpan" name="login">
                                            Login
                                        </button>
                                        <hr>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>



    <script>
        $(document).ready(function() {
            $('.login').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.btnsimpan').attr('disable', 'disabled');
                        $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"> </i>');
                    },
                    complete: function() {
                        $('.btnsimpan').remove('disable');
                        $('.btnsimpan').html('Login');

                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.error) {
                            if (response.error.nidn) {
                                $('#nidn').addClass('is-invalid');
                                $('.errorNidn').html(response.error.nidn);
                            } else {
                                $('#nidn').removeClass('is-invalid');
                                $('.errorNidn').html('');
                            }
                            if (response.error.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html('');
                            }

                        }
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                position: 'top',
                                title: 'Berhasil',
                                text: response.sukses.teks,
                                confirmButtonColor: '#3085d6'
                            }).then(result => {

                                if (result.value) {
                                    window.location = response.sukses.link;
                                } else {
                                    window.location = response.sukses.link;
                                }
                            })
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }
                });
            })

        })
    </script>
</body>

</html>