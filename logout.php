<?php
session_start();
if (!isset($_SESSION['tuvastamine'])) {
    header('Location: authorization.php');
    exit();
}
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: authorization.php');
    exit();
}
?>