<?php
session_start();
//kode php disini

if (isset($_COOKIE["login-admin"])) {
    if ($_COOKIE["login-admin"] == "true") {
        $_SESSION["login-admin"] = true;
    }
}

if (!isset($_SESSION["login-admin"])) {
    echo "<script>
	alert('Ilegal akses!');
	document.location.href = 'index.php';
	</script>";

    die;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_profile.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <title>Admin Page</title>
</head>

<?php
require 'validate_form.php';

if (isset($_POST["submit-akun"])) {
    if (update_akun($_POST) == true) {
        echo "<script>alert('Data berhasil di update!');</script>";
    } else {
        echo "<script>alert('Error!');</script>";
    }
} else if (isset($_POST["submit-data"])) {
    if (update_data($_POST) == true) {
    } else {
    }
} else if (isset($_POST["submit-alamat"])) {
    if (update_alamat($_POST) == true) {
    } else {
    }
}
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">
                <img src="asset/Logo.svg" alt="">MuzeTicket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboard_admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="ticket-admin.php">MyTicket</a></li>
                </ul>
                <!-- Nav Item - User Information -->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile-admin.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="logout.php" role="button" onclick="return confirm('yakin akan logout?')">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100 ">
                    <div class="card-body ">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <button class="btn btn-primary" type="button">Pilih Foto</button>
                                <h5 class="user-name mt-4">Yanto</h5>
                                <h6 class="user-email">Yantohgaul@gmail.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Akun</h6>
                            </div>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="fullName">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Teryanyo yanto" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" placeholder="Yantohgaul@gmail.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="oldpassword">Password Lama</label>
                                    <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">Password baru</label>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a type="button" id="submit" name="submit" class="btn btn-secondary" href="dashboard_admin.php" role="button">Cancel</a>
                                        <button type="submit" id="submit" name="submit-akun" class="btn btn-primary">Update</button>
                                    </div>
                            </form>

                        </div>
                    </div>

                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Data Museum</h6>
                        </div>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="Street">Nama Museum</label>
                                <input type="name" class="form-control" id="Street" placeholder="Museum Wayang" name="museum_name">
                            </div>
                            <div class="form-group">
                                <label for="Street">Foto Museum</label>
                                <input type="file" class="form-control input-group-text" id="Street" name="img_museum">
                            </div>
                            <div class="form-group">
                                <label for="sTate">Tanggal Buka</label>
                                <input type="date" class="form-control" id="sTate" name="date_open">
                            </div>
                            <div class="form-group">
                                <label for="zIp">Tanggal Tutup</label>
                                <input type="date" class="form-control" id="zIp" name="date_close">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <a type="button" id="submit" name="submit" class="btn btn-secondary" href="dashboard_admin.php" role="button">Cancel</a>
                                    <button type="button" id="submit" name="submit-data" class="btn btn-primary">Update</button>
                                </div>
                        </form>

                    </div>
                </div>
                <div class="row gutters">
                    <form action="" method="POST">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Alamat Museum</h6>
                        </div>
                        <div class="form-group">
                            <label for="Street">Jalan</label>
                            <input type="text" class="form-control" id="Street" placeholder="Jln. Gajah Mada" name="jalan">
                        </div>
                        <div class="form-group">
                            <label for="Street">Kota</label>
                            <input type="text" class="form-control" id="Street" placeholder="Bandung" name="kota">
                        </div>
                        <div class="form-group">
                            <label for="Street">Provinsi</label>
                            <input type="number" class="form-control" id="Street" placeholder="02843" name="province">
                        </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <a type="button" id="submit" name="submit" class="btn btn-secondary" href="dashboard_admin.php" role="button">Cancel</a>
                        <button type="button" id="submit" name="submit-alamat" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>