<?php
session_start();

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="icon" typr="image/x-icon" href="asset/Logo.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <title>Admin Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">
                <img src="asset/Logo.svg" alt="">MuzeTicket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="dashboard_admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="ticket-admin.php">MyTicket</a></li>
                </ul>
                <!-- Nav Item - User Information -->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile-admin.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="logout.php" role="button"
                                    onclick="return confirm('yakin akan logout?')">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Hallo,
                    <?php
                    require 'connect.php';

                    $email = $_SESSION['email'];
                    $result = mysqli_query($conn, "SELECT admin.nama_lengkap, user.email FROM admin INNER 
                    JOIN user ON user.user_id = admin.user_id
                    WHERE user.email = '$email'");

                    if (mysqli_num_rows($result) == 1) {
                        $username = mysqli_fetch_assoc($result);
                        echo $username['nama_lengkap'];
                    }
                    ?>
                </h1>
                <p class="lead fw-normal text-white-50 mb-0">Tetap Semangat Yaa!</p>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="border rounded mt-5 p-2 d-inline-block w-100">
                    <div class="align-items-center mb-2">
                        <h5 class="text-center fw-bold">Pesanan Tiket</h5>
                    </div>
                    <div class="table-responsive rounded">
                        <table class="table table-borderless table-hover text-center">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>ID ORDER</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>NIK</th>
                                    <th>TANGGAL KUNJUNGAN</th>
                                    <th>ROMBONGAN</th>
                                    <th>SCAN QR CODE</th>
                                </tr>
                            </thead>
                            <?php
                            require 'connect.php';
                            // TIKET ID = 
                            $query = mysqli_query(
                                $conn,
                                "SELECt orders.order_id, buyer.nama_lengkap, orders.NIK, orders.tanggal_kunjungan, orders.jumlah_rombongan
                                FROM orders
                                INNER JOIN buyer ON orders.buyer_id = buyer.buyer_id
                                GROUP BY orders.order_id
                                ORDER BY orders.order_id"
                            );

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    extract($row);

                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>{$order_id}</td>";
                                    echo "<td>{$nama_lengkap}</td>";
                                    echo "<td>{$NIK}</td>";
                                    echo "<td>{$tanggal_kunjungan}</td>";
                                    echo "<td>{$jumlah_rombongan} orang</td>";
                                    echo "<td> 
                                    <i class='bi bi-qr-code-scan'></i> 
                                    </td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>