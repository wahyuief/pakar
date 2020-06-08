<?php
include('header.php');
if (isset($_SESSION["sistempakar_session"])) {
    if ($_SESSION["sistempakar_session"]['level'] == 'admin') {
        echo '<meta http-equiv="Refresh" content="0; url=./admin/index.php" />';
    } else {
        echo '<meta http-equiv="Refresh" content="0; url=./member.php" />';
    }
}

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $check_user = $conn->query("SELECT * FROM users WHERE nik='$nik' OR email='$email'");
    if ($password == $password_confirm) {
        if ($check_user->num_rows == 0) {
            $password = password_hash($password, PASSWORD_ARGON2I);
            $sql = "INSERT INTO users (nik, first_name, last_name, phone, birthdate, gender, address, email, password) VALUES ('$nik', '$first_name', '$last_name', '$phone', '$birthdate', '$gender', '$address', '$email', '$password')";
            if ($conn->query($sql) == TRUE) {
                $user = $conn->query("SELECT * FROM users WHERE id='$conn->insert_id'")->fetch_assoc();
                $_SESSION["sistempakar_session"] = $user;
                $pesan = '<div class="alert alert-success">Pendaftaran Berhasil</div>';
                echo '<meta http-equiv="Refresh" content="2; url=./member.php" />';
            } else {
                $failed = true;
                $pesan = '<div class="alert alert-danger">'.$conn->error.'</div>';
            }
        } else {
            $failed = true;
            $pesan = '<div class="alert alert-danger">User ini sudah terdaftar</div>';
        }
    } else {
        $failed = true;
        $pesan = '<div class="alert alert-danger">Mohon periksa kembali password</div>';
    }
}
?>
<div class="main margin-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Daftar</h1>
                <?php echo(isset($pesan) ? $pesan : '') ?>
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <input type="number" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" value="<?php echo(isset($failed) ? $nik : '') ?>" onKeyPress="if(this.value.length==16) return false;" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="first_name" name="first_name" placeholder="Nama Depan" class="form-control" value="<?php echo(isset($failed) ? $first_name : '') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" placeholder="Nama Belakang" class="form-control" value="<?php echo(isset($failed) ? $last_name : '') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" id="phone" name="phone" placeholder="No. Telp" class="form-control" value="<?php echo(isset($failed) ? $phone : '') ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" id="birthdate" name="birthdate" placeholder="Tanggal Lahir" class="form-control" value="<?php echo(isset($failed) ? $birthdate : '') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option <?php echo(isset($failed) && $gender == 'P' ? 'selected' : '') ?> value="P">Perempuan</option>
                                    <option <?php echo(isset($failed) && $gender == 'L' ? 'selected' : '') ?> value="L">Laki-laki</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="address" placeholder="Alamat Lengkap" class="form-control" required><?php echo(isset($failed) ? $address : '') ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo(isset($failed) ? $email : '') ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password" class="form-control" required>
                    </div>
                    <div class="clearfix">
                        <div class="btn-group btn-group-sm pull-right">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i> Sign Up</button>
                        </div>
                        <a href="./masuk.php">Sudah punya akun? Masuk disini!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>