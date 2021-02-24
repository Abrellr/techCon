<?php
session_start();

if (isset($_SESSION['email'])) {
    header('Location: admin_page.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="../database/login_function.php">
        <p>Email</p>
        <input type="text" name="email">
        <p>password</p>
        <input type="text" name="password">
        <?= $_GET['error'] ?? '' ?>
    </form>

</body>

</html>