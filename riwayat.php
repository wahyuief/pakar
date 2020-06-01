<?php
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$sess_id = $_SESSION["sistempakar_session"]['id'];
$user = $conn->query("SELECT * FROM users WHERE id='$sess_id'")->fetch_assoc();
?>
<div class="main margin-top">
    <div class="container">
        <h1>Riwayat Konseling</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="./member.php" class="list-group-item">Dashboard</a>
                    <a href="./profile.php" class="list-group-item">Profile</a>
                    <a href="./riwayat.php" class="list-group-item active">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Daftar Riwayat</b>
                    </div>
                    <div class="panel-body table-responsive">
                        Halo, Selamat Datang!!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>