<?php
  session_start();
  require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/Location_logo.png">
        <title>Food Delivery</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asap+Condensed:400,600i,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Berkshire+Swash">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shrikhand">
        <link rel="stylesheet" href="assets/css/untitled.css">
    </head>
    
    <body>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container">
                <a class="navbar-brand logo" href="index.php">
                    <img src="assets/img/Group 135.png">
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <?php
                        if (!isset($_SESSION['utilizator_id'])) //daca utilizatorul NU este logat
                        {   
                            //creare buton de LOGIN si REGISTER
                            echo'<li class="nav-item" role="presentation" style="margin-top:9px;">
                                    <a class="nav-link" href="login.php" id="buton_login" style="background-color:#8e0e00;">Login</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="signup.php" style="margin-top:9px;">Register</a>
                                </li>';
                        }
                        else if (isset($_SESSION['utilizator_id'])) //daca utilizatorul este logat
                        {
                            //creare buton de COMENZI, COS, DATE_UTILIZATOR, USER_UTILIZATOR, LOGOUT
                            echo '<li class="nav-item" role="presentation" style="padding-right:0px;">
                                    <a class="nav-link" href="comenzi.php">
                                        <form action="includes/comenzi.inc.php" method="post">
                                            <button class="btn btn-primary" type="submit" name="comenzi" id="buton_coss" style="margin-top:-7px;margin-right:-30px;">
                                                <img src="assets/img/catering.svg" style="padding-right:-43px;width:43px;margin-right:17px;margin-left:4px;">
                                            </button>
                                        </form>
                                    </a>
                                </li>
                                
                            <li class="nav-item" role="presentation" style="padding-right:0px;">
                                <a class="nav-link" href="cos.php">
                                    <form action="includes/cos.inc.php" method="post">
                                        <button class="btn btn-primary" type="submit" name="cos" id="buton_coss" style="margin-top:-7px;margin-right:-11px;">
                                            <img src="assets/img/Path 9.png" style="padding-right:20px;">
                                        </button>
                                    </form>
                                </a>
                            </li>
                            
                            <li class="nav-item" role="presentation" style="padding-right:0px;">
                                <a class="nav-link" href="date_user.php"><img src="assets/img/user.png"></a>
                            </li>
                            <li class="nav-item" role="presentation" style="margin-top:9px;">
                                <a class="nav-link" href="date_user.php">'. htmlspecialchars($_SESSION['utilizator_user']) .'</a>
                            </li>
                            <li class="nav-item" role="presentation" style="margin-top:9px;">                                
                                <a class="nav-link" href="includes/logout.inc.php" id="buton_login" style="background-color:#8e0e00;">Logout</a>
                            </li>';
                        }                        
                        ?>
                </ul>
        </div>
    </div>
    </nav>