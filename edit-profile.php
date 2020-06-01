<?php
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$sess_id = (isset($_GET['id']) ? $_GET['id'] : $_SESSION["sistempakar_session"]['id']);
$user = $conn->query("SELECT * FROM users WHERE id='$sess_id'")->fetch_assoc();
$sess_name = $_SESSION["sistempakar_session"]['first_name'].' '.$_SESSION["sistempakar_session"]['last_name'];
$username = $user['first_name'].' '.$user['last_name'];
$url = $_SERVER['REQUEST_URI'];

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $password = (empty($_POST['password']) ? $user['password'] : password_hash($_POST['password'], PASSWORD_ARGON2I));

    $query = "UPDATE users
            SET nik='$nik',
                first_name='$first_name',
                last_name='$last_name',
                phone='$phone',
                address='$address',
                birthdate='$birthdate',
                gender='$gender',
                password='$password'
            WHERE id='$sess_id'";

    if ($conn->query($query) === TRUE) {
        $conn->query("INSERT INTO logs_member (username, description, url) VALUES ('$sess_name', 'Perubahan data diri $username', '$url')");
        $pesan = '<div class="alert alert-success">Perubahan Data Berhasil</div>';
        echo '<meta http-equiv="Refresh" content="2; url=./profile.php?id='.$sess_id.'" />';
    } else {
        $pesan = '<div class="alert alert-danger">Perubahan Data Gagal</div>';
        echo '<meta http-equiv="Refresh" content="2" />';
    }
}
?>
<div class="main margin-top">
    <div class="container">
        <h1>Dashboard Member</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <?php if (isset($_SESSION["sistempakar_session"]) && $_SESSION["sistempakar_session"]['level'] != 'admin'): ?>
                    <a href="./member.php" class="list-group-item">Dashboard</a>
                    <a href="./profile.php" class="list-group-item active">Profile</a>
                    <a href="./riwayat.php" class="list-group-item">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                    <?php else: ?>
                    <a href="./admin.php" class="list-group-item">Dashboard</a>
                    <a href="./users.php" class="list-group-item active">Users</a>
                    <a href="./riwayat.php" class="list-group-item">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-8">
                <?php echo(isset($pesan) ? $pesan : '') ?>
                <form method="post" class="panel panel-default">
                    <div class="panel-heading">
                        <b>Edit Profile</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <tr>
                                <td width="200">NIK</td>
                                <td>:</td>
                                <td><input type="number" class="form-control" name="nik" value="<?php echo $user['nik']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><div class="row"><div class="col-md-6"><input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>"></div><div class="col-md-6"><input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>"></div></div></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>"></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td>:</td>
                                <td><input type="number" class="form-control" name="phone" value="<?php echo $user['phone']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><input type="date" class="form-control" name="birthdate" value="<?php echo $user['birthdate']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <select name="gender" class="form-control">
                                        <option <?php echo ($user['gender'] == 'P' ? 'selected' : ''); ?> value="P">Perempuan</option>
                                        <option <?php echo ($user['gender'] == 'L' ? 'selected' : ''); ?> value="L">Laki-Laki</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td>:</td>
                                <td><textarea name="address" class="form-control"><?php echo $user['address']; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input type="password" class="form-control" name="password" placeholder="Biarkan kosong jika tidak ingin dirubah"></td>
                            </tr>
                        </table>
                        <button type="submit" name="submit" class="btn btn-sm btn-primary float-right" style="margin-right: 8px;"><i class="pe pe-7s-diskette"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>