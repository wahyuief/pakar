<?php
include('header.php');

$gejalanya = $conn->query("SELECT * FROM gejala ORDER BY id_gejala DESC");
$penyakitnya = $conn->query("SELECT * FROM penyakit ORDER BY id_penyakit DESC");

if (isset($_POST['submit'])) {
    $kode_gejala = $_POST['kode_gejala'];
    $kode_penyakit = $_POST['kode_penyakit'];
    $keyakinan = $_POST['keyakinan'];
    $ketidakyakinan = $_POST['ketidakyakinan'];

    $check_gp = $conn->query("SELECT * FROM gejala_penyakit WHERE kode_gejala='$kode_gejala' AND kode_penyakit='$kode_penyakit'");
    if ($check_gp->num_rows == 0) {
        $query = "INSERT INTO gejala_penyakit (kode_gejala, kode_penyakit, keyakinan, ketidakyakinan) VALUE ('$kode_gejala', '$kode_penyakit', $keyakinan, $ketidakyakinan)";
        if ($conn->query($query) === TRUE) {
            $pesan = '<div class="alert alert-success">Penambahan Data Berhasil</div>';
            echo '<meta http-equiv="Refresh" content="2; url=./gp.php" />';
        } else {
            $pesan = '<div class="alert alert-danger">Penambahan Data Gagal</div>';
        }
    } else {
        $pesan = '<div class="alert alert-danger">Gejala penyakit ini sudah terdaftar</div>';
    }
}
?>
<div id="inner-container">
    <div id="page-content" class="bg-cool">
        <div class="main margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Tambah Gejala Penyakit</h2>
                        <?php echo(isset($pesan) ? $pesan : '') ?>
                        <form method="post" class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="150">Kode Gejala <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td>
                                            <select name="kode_gejala" id="gejala" class="form-control" required>
                                                <option value="" selected disabled>Pilih gejala</option>
                                                <?php while($gejala = $gejalanya->fetch_assoc()): ?>
                                                    <option <?php echo(isset($kode_gejala) && $gejala['kode_gejala'] == $kode_gejala ? 'selected' : '') ?> value="<?php echo $gejala['kode_gejala'] ?>"><?php echo $gejala['nama_gejala'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Penyakit <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td>
                                            <select name="kode_penyakit" id="penyakit" class="form-control" required>
                                                <option value="" selected disabled>Pilih penyakit</option>
                                                <?php while($penyakit = $penyakitnya->fetch_assoc()): ?>
                                                    <option <?php echo(isset($kode_penyakit) && $penyakit['kode_penyakit'] == $kode_penyakit ? 'selected' : '') ?> value="<?php echo $penyakit['kode_penyakit'] ?>"><?php echo $penyakit['nama_penyakit'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keyakinan <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" name="keyakinan" id="yakin" class="form-control" placeholder="7.5" value="<?php echo(isset($keyakinan) ? $keyakinan : ''); ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Ketidakyakinan <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" name="ketidakyakinan" id="tidakyakin" class="form-control" placeholder="2.5" value="<?php echo(isset($ketidakyakinan) ? $ketidakyakinan : ''); ?>" required></td>
                                    </tr>
                                </table>
                                <div class="text-right">
                                    <a href="gp.php" class="btn btn-sm btn-warning">Kembali</a>
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