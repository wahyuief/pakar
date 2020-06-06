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
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check_user->num_rows > 0) {
        $user = $check_user->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION["sistempakar_session"] = $user;
            if ($user['level'] == 'admin') {
                echo '<meta http-equiv="Refresh" content="2; url=./admin/index.php" />';
            } else {
                echo '<meta http-equiv="Refresh" content="2; url=./member.php" />';
            }
            $pesan = '<div class="alert alert-success">Login Berhasil</div>';
        } else {
            $failed = true;
            $pesan = '<div class="alert alert-danger">Email atau password salah</div>';
        }
    } else {
        $failed = true;
        $pesan = '<div class="alert alert-danger">Email atau password salah</div>';
    }
}
?>
<div class="main margin-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1>Masuk</h1>
                <?php echo(isset($pesan) ? $pesan : '') ?>
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo(isset($failed) ? $email : '') ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="clearfix">
                        <div class="btn-group btn-group-sm pull-right">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i> Sign In</button>
                        </div>
                        <a href="./daftar.php">Belum punya akun? Daftar disini!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>