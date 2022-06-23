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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="asset/Logo.svg">
</head>

<?php
require 'auth.php';

if(isset($_POST["submit"])) {
    if(verification_Email($_POST) == true) {
        echo "<script>
        alert('Verification Successfully');
        document.location.href='login-admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Verification Error, something went wrong');
        </script>";
    }
}
?>

<body class="bg-gradient-secondary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Enter verification code!</h1>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group text-center">
                            <p>check your email for verification code</p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="verification-code" placeholder="14687XXXX">
                        </div>
                        <button type="submit" class="btn btn-secondary btn-user btn-block" name="submit">
                            Submit
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>