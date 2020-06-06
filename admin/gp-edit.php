<?php
include('header.php');

$gejalanya = $conn->query("SELECT * FROM gejala ORDER BY id_gejala DESC");
$penyakitnya = $conn->query("SELECT * FROM penyakit ORDER BY id_penyakit DESC");
$id = $_GET['id'];
$gp = $conn->query("SELECT * FROM gejala_penyakit WHERE id_gp = $id")->fetch_assoc();

if (isset($_POST['submit'])) {
    $kode_gejala = $_POST['kode_gejala'];
    $kode_penyakit = $_POST['kode_penyakit'];
    $keyakinan = $_POST['keyakinan'];
    $ketidakyakinan = $_POST['ketidakyakinan'];

    $query = "UPDATE gejala_penyakit
            SET kode_gejala='$kode_gejala',
                kode_penyakit='$kode_penyakit',
                keyakinan='$keyakinan',
                ketidakyakinan='$ketidakyakinan'
            WHERE id_gp='$id'";

    if ($conn->query($query) === TRUE) {
        $_SESSION["pesan"] = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> Perubahan Data Berhasil</div>';
        header('Location: ./gp-edit.php?id='.$id);
    } else {
        $_SESSION["pesan"] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> Perubahan Data Gagal</div>';
    }
}
?>
<div id="inner-container">
    <div id="page-content" class="bg-cool">
        <div class="main margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Edit Gejala Penyakit</h2>
                        <?php echo(isset($_SESSION["pesan"]) ? $_SESSION["pesan"] : '') ?>
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
                                                    <option <?php echo($gejala['kode_gejala'] == $gp['kode_gejala'] ? 'selected' : '') ?> value="<?php echo $gejala['kode_gejala'] ?>"><?php echo $gejala['nama_gejala'] ?></option>
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
                                                    <option <?php echo($penyakit['kode_penyakit'] == $gp['kode_penyakit'] ? 'selected' : '') ?> value="<?php echo $penyakit['kode_penyakit'] ?>"><?php echo $penyakit['nama_penyakit'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keyakinan <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" name="keyakinan" id="yakin" class="form-control" placeholder="7.5" value="<?php echo $gp['keyakinan']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Ketidakyakinan <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" name="ketidakyakinan" id="tidakyakin" class="form-control" placeholder="2.5" value="<?php echo $gp['ketidakyakinan']; ?>" required></td>
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