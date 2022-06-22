<?php

require 'connect.php';
require 'mail.php';

function register_buyer($infologin)
{
    global $conn;

    $username =  htmlspecialchars(trim(stripslashes($infologin["username"])));
    $password =  mysqli_real_escape_string($conn, $infologin["password"]);
    $email =  htmlspecialchars(stripslashes($infologin["email"]));
    $check_password =  mysqli_real_escape_string($conn, $infologin["check_password"]);

    $check = mysqli_query($conn, "SELECT nama_lengkap FROM buyer WHERE nama_lengkap = '$username'");

    if (empty($username)) {
        return false;
    } else if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Username sudah ada!');</script>";
        return false;
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            echo "<script>alert('Hanya huruf dan spasi yang diperbolehkan!');</script>";
            return false;
        }
    }

    if (empty($email)) {
        return false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Format email salah!');</script>";
            return false;
        }
    }

    if ($password !== $check_password) {
        echo "<script>alert('Password tidak sama!');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $message = "Your code is" . $verification_code;
    $subject = "Email Verification";

    send_mail($email, $subject, $message);

    mysqli_query($conn, "INSERT INTO user(role_id, email, password, verification_code) VALUES(2, '$email', '$password', '$verification_code')");
    
    $user_id = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '$email'");

    if (mysqli_num_rows($user_id) == 1) {
        $result = mysqli_fetch_assoc($user_id);

        mysqli_query($conn, "INSERT INTO buyer(user_id, nama_lengkap) VALUES('$result[user_id]', '$username')");
    }


    return mysqli_affected_rows($conn);
}

function register_admin($infologin)
{
    global $conn;

    $username =  htmlspecialchars(trim(stripslashes($infologin["username"])));
    $password =  mysqli_real_escape_string($conn, $infologin["password"]);
    $email =  htmlspecialchars(stripslashes($infologin["email"]));
    $check_password =  mysqli_real_escape_string($conn, $infologin["check_password"]);

    $check = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (empty($username)) {
        return false;
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

    if (empty($email)) {
        return false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Format email salah!');</script>";
            return false;
        }
    }

    if ($password !== $check_password) {
        echo "<script>alert('Password tidak sama!');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    mysqli_query($conn, "INSERT INTO user(role_id, email, password, verification_code) VALUES(1, '$email', '$password', '$verification_code')");

    $user_id = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '$email'");

    if (mysqli_num_rows($user_id) == 1) {
        $result = mysqli_fetch_assoc($user_id);

        mysqli_query($conn, "INSERT INTO admin(user_id, nama_lengkap) VALUES('$result[user_id]', '$username')");
    }


    return mysqli_affected_rows($conn);
}

function login_check($data_login)
{
    global $conn;

    $email = $data_login["email"];
    $password = $data_login["password"];

    $check_user = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if (mysqli_num_rows($check_user) == 1) {
        $result = mysqli_fetch_assoc($check_user);

        if (password_verify($password, $result["password"])) {
            $_SESSION["email"] = $email;
            $_SESSION["login"] = true;
        }

        if (isset($data_login["rememberme"])) {
            setcookie("login", "tetap ingat", time() + 30);
        } else {
            echo "Cookie belum dibuat";
        }

        if ($result['role_id'] == 1) {
            echo "<script>
                document.location.href = 'dashboard_admin.php'
                </script>";
        } else if ($result['role_id'] == 2) {
            echo "<script>
                document.location.href = 'dashboard_buyer.php'
                </script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Email / Password Salah!'); document.location.href='login-admin.php'</script>";
    }
}
