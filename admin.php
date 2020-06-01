<?php
include('header.php');
if (isset($_SESSION["sistempakar_session"]) && $_SESSION["sistempakar_session"]['level'] != 'admin') {
    echo '<meta http-equiv="Refresh" content="0; url=./member.php" />';
}

$sess_id = $_SESSION["sistempakar_session"]['id'];
$user = $conn->query("SELECT * FROM users WHERE id='$sess_id'")->fetch_assoc();
?>
<div class="main margin-top">
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="./admin.php" class="list-group-item active">Dashboard</a>
                    <a href="./users.php" class="list-group-item">Users</a>
                    <a href="./riwayat.php" class="list-group-item">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Dashboard Admin</b>
                    </div>
                    <div class="panel-body table-responsive">
                        Halo Admin, Selamat Datang!!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>