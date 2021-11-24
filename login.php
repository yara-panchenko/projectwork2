<?php
session_start();
if (isset($_SESSION['index.php'])) {
    header('Location: index.php');
    exit();
}
if (isset($_SESSION['tuvastamine2'])) {
    header('Location: lauluKomenteerimine.php');
    exit();
}
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if ($login=='admin' && $pass=='admin') {
        $_SESSION['tuvastamine'] = 'adm';
        header('Location: index.php');
    }
    if($login=='kasutaja' && $pass=='kasutaja') {
        $_SESSION['tuvastamine'] = 'kas';
        header('Location: lauluKomenteerimine.php');
    }
    else echo ("Incorrect password!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Häälemine</title>
</head>
<h1>Login</h1>
<form class="form-group" action="" method="post">
    Login: <input type="text" name="login"><br>
    Password: <input type="password" name="pass"><br>
    <input type="submit" value="Logi sisse">
</form>