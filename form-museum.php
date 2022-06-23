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
                        <h1 class="h4 text-gray-900 mb-4">Silahkan Isi Data Museum!</h1>
                    </div>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <label for="text" class="form-label">Nama Museum</label>
                            <input type="text" class="form-control form-control-user" id="exampleUsername"
                                name="username" placeholder="Museum Wayang">
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Tanggal Buka</label>
                            <input type="date" class="form-control form-control-user" id="date">
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Tanggal Tutup</label>
                            <input type="date" class="form-control form-control-user" id="date">
                        </div>
                        <label for="date" class="form-label">Alamat</label>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                                    name="text" placeholder="Jl. Gajah Mada">
                            </div>
                            <div class="col-sm-4">
                                <!-- <button type="button" class="btn btn-primary btn-user btn-block" name="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Masukan Alamat
                                </button> -->
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Edit Tiket
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control form-control-user" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
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

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="ticketprice" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="ticketprice" s>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="date" placeholder="HH/BB/TT">
                        </div>
                        <div class="mb-3">
                            <label for="opentime" class="form-label">Waktu Buka</label>
                            <input type="time" class="form-control" id="opentime">
                        </div>
                        <div class="mb-3">
                            <label for="closingtime" class="form-label">Waktu Tutup</label>
                            <input type="time" class="form-control" id="closingtime">
                        </div>
                        <div class="mb-3">
                            <label for="quotamuseum" class="form-label">Kuota</label>
                            <input type="number" class="form-control" id="quotamuseum" s>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>