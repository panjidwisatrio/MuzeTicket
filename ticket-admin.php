<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Muze Ticket - MyTicket</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="dashboard_admin.php">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="ticket-admin.php">MyTicket</a></li>
                </ul>
                <!-- Nav Item - User Information -->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Profile</a></li>
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

    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-10">

                <div class="">
                    <div class="align-items-center mt-5">
                        <h5 class="text-center fw-bold">Daftar Tiket</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 mb-2">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="https://picsum.photos/200/300?blur" alt="Card image cap">
                                <div class="card-body ">
                                    <h5 class="card-title fw-bold text-center">Senin</h5>
                                    <p class="card-text text-center">Rp.10.000 per Tgl 20/06/2022</p>
                                    <p class="card-text text-center">Kuota 10 Tiket</p>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Edit Tiket
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">

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


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

</body>

</html>