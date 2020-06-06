<?php
include('header.php');

$sess_id = (isset($_GET['id']) ? $_GET['id'] : $_SESSION["sistempakar_session"]['id']);
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
    $password = (empty($_POST['password']) ? 'password' : password_hash($_POST['password'], PASSWORD_ARGON2I));

    $check_user = $conn->query("SELECT * FROM users WHERE nik='$nik' OR email='$email'");
    if ($check_user->num_rows == 0) {
        $query = "INSERT INTO users (nik, email, first_name, last_name, phone, address, birthdate, gender, password)
                VALUE ('$nik', '$email', '$first_name', '$last_name', '$phone', '$address', '$birthdate', '$gender', '$password')";
        if ($conn->query($query) === TRUE) {
            $pesan = '<div class="alert alert-success">Penambahan Data Berhasil</div>';
            echo '<meta http-equiv="Refresh" content="1; url=./users.php" />';
        } else {
            $pesan = '<div class="alert alert-danger">Penambahan Data Gagal</div>';
        }
    } else {
        $pesan = '<div class="alert alert-danger">User ini sudah terdaftar</div>';
    }
}
?>
<div id="inner-container">
    <div id="page-content" class="bg-cool">
        <div class="main margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Tambah User</h2>
                        <?php echo(isset($pesan) ? $pesan : '') ?>
                        <form method="post" class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="200">NIK <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" value="<?php echo(isset($nik) ? $nik : ''); ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><div class="row"><div class="col-md-6"><input type="text" class="form-control" name="first_name" placeholder="Nama Depan" value="<?php echo(isset($first_name) ? $first_name : ''); ?>" required></div><div class="col-md-6"><input type="text" class="form-control" name="last_name" placeholder="Nama Belakang" value="<?php echo(isset($last_name) ? $last_name : ''); ?>" required></div></div></td>
                                    </tr>
                                    <tr>
                                        <td>Email <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="email" class="form-control" name="email" placeholder="yona.contoh@gmail.com" value="<?php echo(isset($email) ? $email : ''); ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="phone" placeholder="Nomor yang dapat dihubungi" value="<?php echo(isset($phone) ? $phone : ''); ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="date" class="form-control" name="birthdate" value="<?php echo(isset($birthdate) ? $birthdate : ''); ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td>
                                            <select name="gender" class="form-control" required>
                                                <option value="" selected disabled>Pilih jenis kelamin</option>
                                                <option <?php echo (isset($gender) && $gender == 'P' ? 'selected' : ''); ?> value="P">Perempuan</option>
                                                <option <?php echo (isset($gender) && $gender == 'L' ? 'selected' : ''); ?> value="L">Laki-Laki</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Rumah <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><textarea name="address" class="form-control" placeholder="Alamat lengkap" required><?php echo(isset($address) ? $address : ''); ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Password <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="password" class="form-control" name="password" placeholder="Password untuk login" required></td>
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