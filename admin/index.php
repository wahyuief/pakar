<?php
include('header.php');

$total_users = $conn->query("SELECT * FROM users")->num_rows;
$total_analisa = $conn->query("SELECT * FROM analisa")->num_rows;
$total_gejala = $conn->query("SELECT * FROM gejala")->num_rows;
$total_penyakit = $conn->query("SELECT * FROM penyakit")->num_rows;
?>
<div id="inner-container">
    <div id="page-content">
        <ul id="nav-info" class="clearfix">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="">Dashboard</a></li>
        </ul>

        <ul class="nav-dash">
            <li class="active">
                <a href="<?php echo $basepath; ?>/index.php" data-toggle="tooltip" title="Dashboard" class="animation-fadeIn">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/users.php" data-toggle="tooltip" title="Users" class="animation-fadeIn">
                    <i class="fa fa-users"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/analisa.php" data-toggle="tooltip" title="Analisa" class="animation-fadeIn">
                    <i class="fa fa-bar-chart"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/gejala.php" data-toggle="tooltip" title="Gejala" class="animation-fadeIn">
                    <i class="fa fa-dashboard"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/penyakit.php" data-toggle="tooltip" title="Penyakit" class="animation-fadeIn">
                    <i class="fa fa-stethoscope"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/gp.php" data-toggle="tooltip" title="Gejala Penyakit" class="animation-fadeIn">
                    <i class="fa fa-user-md"></i>
                </a>
            </li>
        </ul>
        <!-- END Nav Dash -->

        <h2>Dashboard</h2>
        <div class="dash-tiles row">
            <div class="col-sm-3">
                <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                    <div class="dash-tile-header">
                        Total Users
                    </div>
                    <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                    <div class="dash-tile-text"><?php echo $total_users ?></div>
                </div>
                <!-- END Total Users Tile -->
            </div>
            <!-- END Column 1 of Row 1 -->

            <!-- Column 2 of Row 1 -->
            <div class="col-sm-3">
                <!-- Total Sales Tile -->
                <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                    <div class="dash-tile-header">
                        Total Konseling
                    </div>
                    <div class="dash-tile-icon"><i class="fa fa-bar-chart"></i></div>
                    <div class="dash-tile-text"><?php echo $total_analisa ?></div>
                </div>
                <!-- END Total Sales Tile -->

            </div>
            <!-- END Column 2 of Row 1 -->

            <!-- Column 3 of Row 1 -->
            <div class="col-sm-3">
                <!-- Popularity Tile -->
                <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
                    <div class="dash-tile-header">
                        Total Gejala
                    </div>
                    <div class="dash-tile-icon"><i class="fa fa-dashboard"></i></div>
                    <div class="dash-tile-text"><?php echo $total_gejala ?></div>
                </div>
                <!-- END Popularity Tile -->

            </div>
            <!-- END Column 3 of Row 1 -->

            <!-- Column 4 of Row 1 -->
            <div class="col-sm-3">
                <!-- RSS Subscribers Tile -->
                <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                    <div class="dash-tile-header">
                        Total Penyakit
                    </div>
                    <div class="dash-tile-icon"><i class="fa fa-stethoscope"></i></div>
                    <div class="dash-tile-text"><?php echo $total_penyakit ?></div>
                </div>
                <!-- END RSS Subscribers Tile -->

            </div>
            <!-- END Column 4 of Row 1 -->
        </div>
        <!-- END Row 1 -->

    </div>
<?php include('footer.php'); ?>