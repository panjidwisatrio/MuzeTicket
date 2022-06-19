<?php

$conn = mysqli_connect("localhost", "root", "", "muze_ticket");

if(!$conn) {
    die("Gagal terubung ke database!". mysqli_connect_error());
}
