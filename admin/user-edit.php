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
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $password = (empty($_POST['password']) ? $user['password'] : password_hash($_POST['password'], PASSWORD_ARGON2I));

    $query = "UPDATE users
            SET nik='$nik',
                email='$email',
                first_name='$first_name',
                last_name='$last_name',
                phone='$phone',
                address='$address',
                birthdate='$birthdate',
                gender='$gender',
                password='$password'
            WHERE id='$sess_id'";

    if ($conn->query($query) === TRUE) {
        $pesan = '<div class="alert alert-success">Perubahan Data Berhasil</div>';
        echo '<meta http-equiv="Refresh" content="2; url=./users.php" />';
    } else {
        $pesan = '<div class="alert alert-danger">Perubahan Data Gagal</div>';
    }
}
?>
<div id="inner-container">
    <div id="page-content" class="bg-cool">
        <div class="main margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Edit User</h2>
                        <?php echo(isset($pesan) ? $pesan : '') ?>
                        <form method="post" class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="200">NIK <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="nik" value="<?php echo $user['nik']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><div class="row"><div class="col-md-6"><input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>" required></div><div class="col-md-6"><input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>" required></div></div></td>
                                    </tr>
                                    <tr>
                                        <td>Email <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="date" class="form-control" name="birthdate" value="<?php echo $user['birthdate']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td>
                                            <select name="gender" class="form-control" required>
                                                <option <?php echo ($user['gender'] == 'P' ? 'selected' : ''); ?> value="P">Perempuan</option>
                                                <option <?php echo ($user['gender'] == 'L' ? 'selected' : ''); ?> value="L">Laki-Laki</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Rumah <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><textarea name="address" class="form-control" required><?php echo $user['address']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>:</td>
                                        <td><input type="password" class="form-control" name="password" placeholder="Biarkan kosong jika tidak ingin dirubah"></td>
                                    </tr>
                                </table>
                                <div class="text-right">
                                    <a href="users.php" class="btn btn-sm btn-warning">Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary" style="margin-right: 8px;"><i class="pe pe-7s-diskette"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php') ?>