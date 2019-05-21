<?php

session_start();
// require_once('init/init.php');
require_once('function/db.php');
require_once('function/function.php');
global $conn;


if(isset($_POST['login'])){
    $nama       = $_POST['nama'];
    $password   = $_POST['password'];
    if(!empty(trim($nama)) && !empty(trim($password))){
        $query = "SELECT nama FROM user WHERE password = '$password' AND nama = '$nama'";
        if( mysqli_query($conn, $query)){
            $_SESSION["nama"] = $nama;
            header('Location: index.php');
        }else{
            echo "salah nama atau password";
        }
    }else{
        echo 'data kosong';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="view/login.css">
    <style>
    .login-box{
        margin: 60px 28% 0;
        width: 40%;
    }
    </style>
</head>
<body>
<div class="container">
        <div class="container-fluid loginbg">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12 login-box">
            <div>
            <p class="login-title text-center">Login to Tara</p>
            </div>
            <form class="login-login-form" method="post" action="">
                <fieldset class="login-input-container">
                    <div class="login-input-item">
                    <input type="text" class="login-user-input-email login-user-input" name="nama" placeholder="Your Username">
                    </div>
                    <div class="login-input-item">
                    <input type="password" class="login-user-input-password login-user-input" name="password" placeholder="Enter Password">
                    </div>
                </fieldset>
            <fieldset class="login-login-button-container">
                <button type="submit" name="login" class="login-login-button">Log in</button>
            </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>