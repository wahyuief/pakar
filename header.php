<?php 
require('database.php');
session_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Sistem Pakar Kesehatan Mental</title>
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="yes" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- Google Web Font -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lekton:400,700,400italic' rel='stylesheet' type='text/css'>

    <!--  Bootstrap 3-->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- OWL Carousel -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.css">

    <!--  Slider -->
    <link rel="stylesheet" href="./assets/css/jquery.kenburnsy.css">

    <!-- Animate -->
    <link rel="stylesheet" href="./assets/css/animate.css">

    <!-- Web Icons Font -->
    <link rel="stylesheet" href="./assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="./assets/css/iconmoon.css">
    <link rel="stylesheet" href="./assets/css/et-line.css">
    <link rel="stylesheet" href="./assets/css/ionicons.css">

    <!-- Magnific PopUp -->
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">

    <!-- Tabs -->
    <link rel="stylesheet" type="text/css" href="./assets/css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/tabstyles.css" />

    <!-- Loader Style -->
    <link rel="stylesheet" href="./assets/css/loader-1.css">

    <!-- Costum Styles -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="favicon.ico">

    <!-- Modernizer & Respond js -->
    <script src="./assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>

    <!-- Preloader -->
    <div class="cover"></div>

    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="./index.php"><h1>Sistem Pakar Kesehatan Mental</h1></a>
            </div>
            
            <!-- Menu Hamburger (Default) -->
            <button class="main-menu-indicator" id="open-button">
                <span class="line"></span>
            </button>
            
            <div class="menu-wrap" style="background-image: url(./assets/img/nav_bg.jpg)">
                <div class="menu-content">
                    <div class="navigation">
                        <span class="pe-7s-close close-menu" id="close-button"></span>
                    </div>
                    <nav class="menu">
                        <div class="menu-list">
                            <ul>
                                <li><a href="index.php">Beranda</a></li>
                                <li class="menu-item-has-children"><a href="#">Tentang</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">- Tentang Kami</a></li>
                                        <li><a href="#">- Pencapaian</a></li>
                                        <li><a href="#">- Tentang Bunuh Diri</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Hotline</a></li>
                                <?php
                                if (isset($_SESSION["sistempakar_session"])) {
                                    if ($_SESSION["sistempakar_session"]['level'] == 'admin') {
                                        echo '<li><a href="./admin.php">Admin</a></li>
                                        <li><a href="./keluar.php">Keluar</a></li>';
                                    } else {
                                        echo '<li><a href="./member.php">Member</a></li>
                                        <li><a href="./keluar.php">Keluar</a></li>';
                                    }
                                } else {
                                    echo '<li><a href="./daftar.php">Daftar</a></li>
                                    <li><a href="./masuk.php">Masuk</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>

                    <div class="hidden-xs">
                        <div class="menu-social-media">
                            <ul>
                               <li><a href="#"><i class="iconmoon-facebook"></i></a></li>
                               <li><a href="#"><i class="iconmoon-twitter"></i></a></li>
                               <li><a href="#"><i class="iconmoon-instagram"></i></a></li>
                               <li><a href="#"><i class="iconmoon-linkedin2"></i></a></li>
                            </ul>
                        </div>

                        <div class="menu-information">
                            <ul>
                                <li><span>T:</span> 0852-2169-1008</li>
                                <li><span>E:</span> yona@hergalina.id</li>
                                <li><span>W:</span> yona.hergalina.id</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Menu Hamburger (Default) -->

        </div>
    </div>