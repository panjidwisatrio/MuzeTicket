<?php
require 'connect.php';


function register($infologin)
{
    global $conn;

    $username =  htmlspecialchars(trim(stripslashes($infologin["username"])));
    $password =  mysqli_real_escape_string($conn, $infologin["password"]);
    $email =  htmlspecialchars(stripslashes($infologin["email"]));
    $check_password =  mysqli_real_escape_string($conn, $infologin["check_password"]);

    $check = mysqli_query($conn, "SELECT nama_lengkap FROM buyer WHERE nama_lengkap = '$username'");

    if (empty($username)) {
        echo "<script>alert('Nama di perlukan!');</script>";
    } else if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Username sudah ada!');</script>";
        return false;
    } else {
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            echo "<script>alert('Hanya huruf dan spasi yang diperbolehkan!');</script>";
            return false;
        }
    }

    if(empty($email)) {
        echo "<script>alert('Email is Required!');</script>";
        return false;
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Format email salah!');</script>";
            return false;
        }
    }

    if ($password !== $check_password) {
        echo "<script>alert('Password tidak sama!');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO buyer(role_id, nama_lengkap, email, password) VALUES(2,'$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

function login_check($data_login) {
    global $conn;

    $email = $data_login["email"];
    $password = $data_login["password"];

    $check_user = mysqli_query($conn, "SELECT * FROM buyer WHERE email = '$email'");

    if(mysqli_num_rows($check_user) == 1) {
        $result = mysqli_fetch_assoc($check_user);

        if(password_verify($password, $result["password"])) {
            $_SESSION["email"] = $email;
            $_SESSION["login"] = true;
        }
        
        if(isset($data_login["rememberme"])) {
            setcookie("login", "tetap ingat", time()+30);
        } else {
            echo "Cookie belum dibuat";
        }

        echo "<script>
			document.location.href = 'dashboard_buyer.php'
			</script>";
    } else {
        echo "<script type='text/javascript'>alert('Email / Password Salah!'); document.location.href='login-buyer.php'</script>";
    }
}

?>