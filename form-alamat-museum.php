<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MuzeTicket</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/style_login.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

</head>

<?php
//kode php disini
require 'auth.php';

if (isset($_POST["submit"])) {

    if (register_admin($_POST) > 0) {
        echo "<script>
		alert('Data berhasil disimpan');
		document.location.href = 'login-admin.php';
		</script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<body class="bg-gradient-warning">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Silahkan Isi Alamat Museum!</h1>
                    </div>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <label for="text" class="form-label">Jalan</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername"
                                name="username" placeholder="Jl. Telekomunikasi No. 1, Terusan Buahbatu">
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Kota</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername"
                                name="username" placeholder="Kabupaten Bandung">
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Provinsi</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername"
                                name="username" placeholder="Jawa Barat">
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Kode Pos</label>
                            <input type="number" class="form-control form-control-user" id="exampleUsername"
                                name="username" placeholder="40257">
                        </div>
                        <button type="submit" class="btn btn-warning btn-user btn-block" name="submit">
                            Daftarkan Museum
                        </button>

                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="login-admin.php">Sudah punya akun? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>