<?php

require 'connect.php';

function update_akun($data_form)
{
    global $conn;

    $username = htmlspecialchars(trim(stripslashes($data_form["username"])));
    $email = htmlspecialchars(stripslashes($data_form["email"]));
    $oldpassword = mysqli_real_escape_string($conn, $data_form["oldpassword"]);
    $newpassword = mysqli_real_escape_string($conn, $data_form["newpassword"]);

    $oldemail = $_SESSION["email"];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE email = '$oldemail'");

    if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        echo "<script>alert('Hanya huruf dan spasi yang diperbolehkan!');</script>";
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email salah!');</script>";
        return false;
    }

    if (mysqli_num_rows($check) == 1) {
        $result = mysqli_fetch_assoc($check);
        if(password_verify($newpassword, $result["password"])) {
            mysqli_query($conn, "UPDATE `user` SET `email`='$email',`password`='$newpassword' WHERE password = '$oldpassword'");
            mysqli_query($conn, "UPDATE `admin` SET `nama_lengkap`='$username' WHERE userId = '$result[user_id]'");
            return true;
            echo "<script>alert('Data berhasil di update!');</script>";
        } else {
            echo "<script>alert('Password lama salah!');</script>";
            return false;
        }
    } else {
        echo "<script>alert('Error!');</script>";
    }
}

function update_data($data_form)
{
    global $conn;

    
}

function update_alamat($data_form)
{
    global $conn;

    
}
