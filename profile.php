<?php
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$sess_id = (isset($_GET['id']) ? $_GET['id'] : $_SESSION["sistempakar_session"]['id']);
$user = $conn->query("SELECT * FROM users WHERE id='$sess_id'")->fetch_assoc();
$existing = $conn->query("SELECT * FROM analisa WHERE id_user='$sess_id'")->num_rows;
?>
<div class="main margin-top">
    <?php if ($existing == 0) {
        echo '<div class="container"><div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Selamat datang!</strong> Untuk memulai konseling online silakan <a href="konseling.php">klik disini</a>.
        </div></div>';
    } ?>
    <div class="container">
        <h1>Profile</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="./member.php" class="list-group-item">Dashboard</a>
                    <a href="./profile.php" class="list-group-item active">Profile</a>
                    <a href="./riwayat.php" class="list-group-item">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Informasi Data Diri</b>
                        <a href="./edit-profile.php?id=<?php echo $sess_id; ?>" title="Edit Profile" class="float-right"><i class="pe pe-7s-pen"></i> Edit</a>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th width="200">NIK</th>
                                <td>:</td>
                                <td><?php echo $user['nik']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>:</td>
                                <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <th>No. Telp</th>
                                <td>:</td>
                                <td><?php echo $user['phone']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td><?php echo date('d M Y', strtotime($user['birthdate'])); ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td><?php echo ($user['gender'] == 'P' ? 'Perempuan' : 'Laki-laki'); ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Rumah</th>
                                <td>:</td>
                                <td><?php echo $user['address']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>