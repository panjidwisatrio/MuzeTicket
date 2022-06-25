<?php
session_start();
//kode php disini

if (isset($_COOKIE["login-buyer"])) {
    if ($_COOKIE["login-buyer"] == "true") {
        $_SESSION["login-buyer"] = true;
    }
}

if (!isset($_SESSION["login-buyer"])) {
    echo "<script>
	alert('Ilegal akses!');
	document.location.href = 'index.php';
	</script>";

    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MuzeTicket</title>
    <link rel="icon" type="image/x-icon" href="asset/Logo.svg">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">MuzeTicket</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php" role="button"
                            onclick="return confirm('yakin akan logout?')">Logout</a>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            Home
                        </a>
                        <div class="sb-sidenav-menu-heading">Ticket</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></div>
                            MyTicket
                        </a>
                        <a class="nav-link collapsed" href="riwayat-pembelian.php" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                            Riwayat
                        </a>
                        <div class="sb-sidenav-menu-heading">Other</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                            Contact Us
                        </a>
                        <a class="nav-link" href="logout.php" role="button" onclick="return confirm('yakin akan logout?')">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                            Log Out
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Museum</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Pilih museum yang kamu ingin kunjungi dan pesan tiketnya!
                        </li>
                    </ol>
                    <div class="row mb-5">
                        <div class="col-md-5 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                </div>
                                <img class="img-fluid" src="asset/13.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                                    <a href="javascript:void(0);" class="card-link">Card link</a>
                                    <a href="javascript:void(0);" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                </div>
                                <img class="img-fluid" src="asset/13.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                                    <a href="javascript:void(0);" class="card-link">Card link</a>
                                    <a href="javascript:void(0);" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                </div>
                                <img class="img-fluid" src="asset/13.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                                    <a href="javascript:void(0);" class="card-link">Card link</a>
                                    <a href="javascript:void(0);" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                </div>
                                <img class="img-fluid" src="asset/13.jpg" alt="Card image cap" />
                                <div class="card-body">
                                    <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                                    <a href="javascript:void(0);" class="card-link">Card link</a>
                                    <a href="javascript:void(0);" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>