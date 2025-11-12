<?php
session_start();
include "../config.php";
?>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        
        <div class="container">
            <h1 class="alert alert-success">Login Form:</h1>
            <form method="post">
                <input type="email" placeholder="Enter Your Email:" name="email" class="form-control">
                <input type="password" placeholder="Enter Your password:" name="password" class="form-control">
                <input type="submit" value="Login" name="btn_login" class="btn btn-dark">
                <a href="signup.php" value="Signup" class="btn btn-dark">Signup</a>
            </form>
        </div>



        <?php
        include "footer.php";
        ?>


        <?php

        if (isset($_POST['btn_login'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);


            $select = " SELECT * FROM signup WHERE email='$email' and password='$password' ";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result)) {
                $res = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $email;
                $_SESSION['file'] = $res['file'];
                echo "<script>window.location.href='index.php'</script>";
            } else if ($email == "amjad@gmail.com" && $password == "1234") {
                $_SESSION['email'] = $email;
                $_SESSION['is_admin'] = true;
                echo "<script>window.location.href='../admin/index.php'</script>";
            }

        }
        ?>