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
require 'auth.php';

if (isset($_POST["submit"])) {

    $jalan = htmlspecialchars($_POST["jalan"]);
    $kota = htmlspecialchars($_POST["kota"]);
    $province = htmlspecialchars($_POST["provinsi"]);
    $postal = htmlspecialchars($_POST["postal"]);

    if (isset($_SESSION["admin"])) {
        $session = $_SESSION["admin"];
        $result = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '$session'");
        if (mysqli_num_rows($result) == 1) {
            $id_user = mysqli_fetch_assoc($result);
            $admin = mysqli_query($conn, "SELECT admin_id FROM admin WHERE user_id = '$id_user[user_id]'");
            if (mysqli_num_rows($admin) == 1) {
                $id_admin = mysqli_fetch_assoc($admin);
                $museum = mysqli_query($conn, "SELECT museum_id FROM museum WHERE admin_id = '$id_admin[admin_id]'");
                if (mysqli_num_rows($museum) == 1) {
                    $id_museum = mysqli_fetch_assoc($museum);
                    mysqli_query($conn, "INSERT INTO `address`(`address_id`, `museum_id`, `street`, `city`, `province`, `postal_code`)
                                    VALUES ('',$id_museum[museum_id],'$jalan','$kota','$province','$postal')");

                    echo "<script>
                        alert('data museum berhasil dimasukan');
                        document.location.href='dashboard_admin.php';
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
                        <h1 class="h4 text-gray-900 mb-4">Silahkan Isi Alamat Museum!</h1>
                    </div>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <label for="text" class="form-label">Jalan</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername" name="jalan" placeholder="Jl. Telekomunikasi No. 1, Terusan Buahbatu">
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Kota</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername" name="kota" placeholder="Kabupaten Bandung">
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Provinsi</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername" name="provinsi" placeholder="Jawa Barat">
                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Kode Pos</label>
                            <input type="number" class="form-control form-control-user" id="exampleUsername" name="postal" placeholder="40257">
                        </div>
                        <button type="submit" class="btn btn-warning btn-user btn-block" name="submit">
                            Daftarkan Museum
                        </button>

                    </form>
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