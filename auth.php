<?php
session_start();
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
    $message = "Your code is " . $verification_code;
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

function verification_Email($verification)
{
    global $conn;

    $code = htmlspecialchars($verification["verification-code"]);
    $get_email = mysqli_query($conn, "SELECT email FROM user WHERE verification_code = '$code'");
    $result = false;

    if (mysqli_num_rows($get_email) == 1) {
        $email = mysqli_fetch_assoc($get_email);
        $get_code = mysqli_query($conn, "SELECT verification_code FROM user WHERE email = '$email[email]'");

        $check = mysqli_fetch_assoc($get_code);

        if ($code == "$check[verification_code]") {
            mysqli_query($conn, "UPDATE user SET verified_at = NOW() WHERE email = '$email[email]' AND verification_code = '$code'");
            $result = true;
        }
    }

    return $result;
}

function register_admin($infologin)
{
    global $conn;

    $username =  htmlspecialchars(trim(stripslashes($infologin["username"])));
    $password =  mysqli_real_escape_string($conn, $infologin["password"]);
    $email =  htmlspecialchars(stripslashes($infologin["email"]));
    $check_password =  mysqli_real_escape_string($conn, $infologin["check_password"]);

    $check = mysqli_query($conn, "SELECT nama_lengkap FROM admin WHERE nama_lengkap = '$username'");

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
    $message = "Your code is " . $verification_code;
    $subject = "Email Verification";
    
    send_mail($email, $subject, $message);
    
    mysqli_query($conn, "INSERT INTO user(role_id, email, password, verification_code) VALUES(1, '$email', '$password', '$verification_code')");
    $user_id = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '$email'");
    
    if (mysqli_num_rows($user_id) == 1) {
        $result = mysqli_fetch_assoc($user_id);
        
        mysqli_query($conn, "INSERT INTO admin(user_id, nama_lengkap) VALUES('$result[user_id]', '$username')");
    }
    
    $_SESSION["admin"] = $infologin["email"];
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

        if ($result['role_id'] == 1) {
            if ($result['verified_at'] != null) {
                if (password_verify($password, $result["password"])) {
                    $_SESSION["email"] = $email;
                    $_SESSION["login-admin"] = true;
                }

                if (isset($data_login["rememberme-admin"])) {
                    setcookie("login", "tetap ingat", time() + 30);
                } else {
                    echo "Cookie belum dibuat";
                }

                echo "<script>
                document.location.href = 'dashboard_admin.php'
                </script>";
            } else {
                echo "<script>
                alert('Your account not verified yet')
                document.location.href = 'verification-admin.php'
                </script>";
            }
        } else if ($result['role_id'] == 2) {
            if ($result['verified_at'] != null) {
                if (password_verify($password, $result["password"])) {
                    $_SESSION["email"] = $email;
                    $_SESSION["login-buyer"] = true;
                }

                if (isset($data_login["rememberme-buyer"])) {
                    setcookie("login", "tetap ingat", time() + 30);
                } else {
                    echo "Cookie belum dibuat";
                }
                
                echo "<script>
                document.location.href = 'dashboard_buyer.php'
                </script>";
            } else {
                echo "<script>
                alert('Your account not verified yet')
                document.location.href = 'verification-buyer.php'
                </script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('Email / Password Salah!'); document.location.href='login-admin.php'</script>";
    }
}
