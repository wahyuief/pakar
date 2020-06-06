<?php require('../database.php'); ?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Yona Hergalina">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title><?php echo(isset($title) ? $title.' - ' : ''); ?>Admin Sistem Pakar</title>

        <link rel="shortcut icon" href="<?php echo $basepath; ?>/assets/img/favicon.png">
        <link rel="stylesheet" href="<?php echo $basepath; ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $basepath; ?>/assets/css/plugins.css">
        <link rel="stylesheet" href="<?php echo $basepath; ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo $basepath; ?>/assets/css/themes.css">
        <link rel="stylesheet" href="<?php echo $basepath; ?>/assets/js/vendor/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo $basepath; ?>/assets/js/vendor/datatables/buttons.dataTables.min.css">
        <script src="<?php echo $basepath; ?>/assets/js/vendor/modernizr-respond.min.js"></script>
    </head>
    <body>
        <div id="page-container">
            <header class="navbar navbar-inverse">
                <ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
                    <li class="divider-vertical"></li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>

                <a href="index.php" class="navbar-brand info">Administrator</a>

                <div id="loading" class="pull-left"><i class="fa fa-certificate fa-spin"></i></div>
                <ul id="widgets" class="navbar-nav-custom pull-right">
                    <li class="divider-vertical"></li>
                    <li class="dropdown pull-right dropdown-user">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $basepath; ?>/assets/img/template/avatar.png" alt="avatar"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../keluar.php"><i class="fa fa-lock"></i> Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>