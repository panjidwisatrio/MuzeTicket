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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/style_login.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

</head>

<?php
//kode php disini
session_start();
require 'connect.php';

if (isset($_POST["submit"])) {

    $museum_name = htmlspecialchars($_POST["museum_name"]);
    $date_open = htmlspecialchars($_POST["date_open"]);
    $date_close = htmlspecialchars($_POST["date_close"]);
    $deskripsi_museum = htmlspecialchars($_POST["deskripsi_museum"]);

    if (isset($_SESSION["admin"])) {
        $session = $_SESSION["admin"];
        $result = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '$session'");

        if (mysqli_num_rows($result) == 1) {
            $id_user = mysqli_fetch_assoc($result);
            $id = mysqli_query($conn, "SELECT admin_id FROM admin WHERE user_id = '$id_user[user_id]'");
            $id_admin = mysqli_fetch_assoc($id);

            mysqli_query($conn, "INSERT INTO `museum`(`museum_id`, `admin_id`, `nama_museum`, `deskripsi`, `tanggal_buka`, `tanggal_tutup`)
                                            VALUES ('',$id_admin[admin_id],'$museum_name','$deskripsi_museum','$date_open','$date_close')");
            echo "<script>
                alert('data museum berhasil dimasukan');
	            document.location.href='form-alamat-museum.php';
	        </script>";
        } else {
            echo "<script>
                alert('data museum gagal dimasukan');
	        </script>";
        }
    } else {
        echo "<script>
            alert('data museum gagal dimasukan');
	    </script>";
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
                        <h1 class="h4 text-gray-900 mb-4">Silahkan Isi Data Museum!</h1>
                    </div>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <label for="text" class="form-label">Nama Museum</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername" name="museum_name" placeholder="Museum Wayang">
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Tanggal Buka</label>
                            <input type="date" class="form-control form-control-user" id="date" name="date_open">
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Tanggal Tutup</label>
                            <input type="date" class="form-control form-control-user" id="date" name="date_close">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control form-control-user" id="exampleFormControlTextarea1" rows="3" name="deskripsi_museum"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning btn-user btn-block" name="submit">
                            Selanjutnya
                        </button>

                    </form>
                    <hr>
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