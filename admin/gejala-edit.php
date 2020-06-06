<?php
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$id = $_GET['id'];
$gejala = $conn->query("SELECT * FROM gejala WHERE id_gejala = $id")->fetch_assoc();

if (isset($_POST['submit'])) {
    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = $_POST['nama_gejala'];

    $query = "UPDATE gejala
            SET kode_gejala='$kode_gejala',
                nama_gejala='$nama_gejala'
            WHERE id_gejala='$id'";

    if ($conn->query($query) === TRUE) {
        $pesan = '<div class="alert alert-success">Perubahan Data Berhasil</div>';
        echo '<meta http-equiv="Refresh" content="2; url=./gejala.php" />';
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
                        <h2>Edit Gejala</h2>
                        <?php echo(isset($pesan) ? $pesan : '') ?>
                        <form method="post" class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="150">Kode Gejala <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="kode_gejala" value="<?php echo $gejala['kode_gejala']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Gejala <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="nama_gejala" value="<?php echo $gejala['nama_gejala']; ?>" required></td>
                                    </tr>
                                </table>
                                <div class="text-right">
                                    <a href="gejala.php" class="btn btn-sm btn-warning">Kembali</a>
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