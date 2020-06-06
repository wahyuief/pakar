<?php
include('header.php');

$lastcode = $conn->query("SELECT * FROM gejala ORDER BY id_gejala DESC")->fetch_assoc()['kode_gejala'];
if (isset($_POST['submit'])) {
    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = $_POST['nama_gejala'];

    $check_gejala = $conn->query("SELECT * FROM gejala WHERE kode_gejala='$kode_gejala' OR nama_gejala='$nama_gejala'");
    if ($check_gejala->num_rows == 0) {
        $query = "INSERT INTO gejala (kode_gejala, nama_gejala) VALUE ('$kode_gejala', '$nama_gejala')";
        if ($conn->query($query) === TRUE) {
            $pesan = '<div class="alert alert-success">Penambahan Data Berhasil</div>';
            echo '<meta http-equiv="Refresh" content="1; url=./gejala.php" />';
        } else {
            $pesan = '<div class="alert alert-danger">Penambahan Data Gagal</div>';
        }
    } else {
        $pesan = '<div class="alert alert-danger">Gejala ini sudah terdaftar</div>';
    }
}
?>
<div id="inner-container">
    <div id="page-content" class="bg-cool">
        <div class="main margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Tambah Gejala</h2>
                        <?php echo(isset($pesan) ? $pesan : '') ?>
                        <form method="post" class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="150">Kode Gejala <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="kode_gejala" placeholder="G001" value="G00<?php echo ltrim($lastcode, 'G')+1; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Gejala <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="nama_gejala" placeholder="Nama Gejala" value="<?php echo(isset($nama_gejala) ? $nama_gejala : ''); ?>" required></td>
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