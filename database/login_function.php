<?php
session_start();
include('../database/connection.php');

$password = md5($_POST['password']);
$result = mysqli_query($link, "SELECT * FROM PARTICIPANTS where email = '$_POST[email]' and password = '$password'");

$row = mysqli_fetch_assoc($assoc);
if ($row) {
    $_SESSION['email'] = $row['email'];
    $_SESSION['vorname'] = $row['vorname'];
    header("Location: ../views/admin_page");
} else {
    header("Location: ../views/login_page.php?error=wrong email or password");
}
