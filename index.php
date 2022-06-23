<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" type="image/x-icon" href="asset/Logo.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">

    <title>MuzeTicket</title>
</head>

<body>
    <!-- Navigation-->
    <nav class="topBar-landing-page navbar navbar-expand-lg navbar-light fixed-top shadow" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand text-light" href="#page-top">MuzeTicket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#team">Team</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="header-landing-page bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">Selamat Datang di MuzeTicket</h1>
            <p class="lead">Pemesanan Tiket Museum Jauh Lebih Mudah</p>
            <form action="" method="$_POST">
                <a class="btn btn-lg btn-light" type="submit" href="register-buyer.php" value="2" name="auth">Register</a>
                <a class="btn btn-lg btn-light" type="submit" href="login-buyer.php" value="2" name="auth">Login</a>
                <p class="h6 mt-4 pb-0 mb-0">Kamu pengelola museum?&ensp;<a class="btn btn-warning btn-sm" href="register-admin.php" value="1" name="auth">Daftar disini!</a></p>
            </form>
            <?php include 'auth.php' ?>
        </div>
    </header>

    <!-- About section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5 ">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">Start a new good way.</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="bi bi-qr-code"></i></div>
                            <h2 class="h5">QR Code</h2>
                            <p class="mb-0">Pemesanan tiket lebih cepat dengan QR Code, kamu hanya perlu menunjukan QR Code kepada petugas, kemudian membayarnya.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="bi bi-ticket"></i></div>
                            <h2 class="h5">List Tiket</h2>
                            <p class="mb-0">Banyak pilihan tiket yang tersedia dari berbagai museum.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="bi bi-clock-history"></i></div>
                            <h2 class="h5">Riwayat</h2>
                            <p class="mb-0">Kamu dapat melihat riwayat pembelian di menu riwayat.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                            <h2 class="h5">CS</h2>
                            <p class="mb-0">layanan customer service jika pengguna mengalami masalah terhadap aplikasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services section-->
    <section class="bg-light" id="features">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">"Apabila sesuatu yang kau senangi tidak terjadi maka senangilah apa yang terjadi."</div>
                        <div class="d-flex align-items-center justify-content-center">
                            <figcaption class="blockquote-footer">
                                <cite title="Source Title">Ali bin Abi Thalib</cite>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact section-->
    <section id="team">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h2 class="fw-bolder">Our team</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Panji Dwi Satrio</h5>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">M. Agung Isra Narwin</h5>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Nursilman Raja Saputra Azhary</h5>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-sm-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Raihan Aulia Rahman</h5>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Citra Wanodya</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; MuzeTicket 2022</p>
        </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/scripts.js"></script>
</body>

</html>