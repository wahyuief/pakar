<?php
include('header.php');

$id = $_GET['id'];
$penyakit = $conn->query("SELECT * FROM penyakit WHERE id_penyakit = $id")->fetch_assoc();

if (isset($_POST['submit'])) {
    $kode_penyakit = $_POST['kode_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $definisi = $_POST['definisi'];
    $pengendalian = $_POST['pengendalian'];

    $query = "UPDATE penyakit
            SET kode_penyakit='$kode_penyakit',
                nama_penyakit='$nama_penyakit',
                definisi='$definisi',
                pengendalian='$pengendalian'
            WHERE id_penyakit='$id'";

    if ($conn->query($query) === TRUE) {
        $_SESSION["pesan"] = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> Perubahan Data Berhasil</div>';
        header('Location: ./penyakit-edit.php?id='.$id);
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
                        <h2>Edit Penyakit</h2>
                        <?php echo(isset($_SESSION["pesan"]) ? $_SESSION["pesan"] : '') ?>
                        <form method="post" class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table">
                                    <tr>
                                        <td width="150">Kode Penyakit <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="kode_penyakit" value="<?php echo $penyakit['kode_penyakit']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penyakit <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="nama_penyakit" value="<?php echo $penyakit['nama_penyakit']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Definisi <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><textarea class="form-control" name="definisi" placeholder="Definisi tentang penyakit" required><?php echo $penyakit['definisi']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Pengendalian <i class="text-danger">*</i></td>
                                        <td>:</td>
                                        <td><textarea class="form-control" name="pengendalian" placeholder="Pengendalian penyakit" required><?php echo $penyakit['pengendalian']; ?></textarea></td>
                                    </tr>
                                </table>
                                <div class="text-right">
                                    <a href="penyakit.php" class="btn btn-sm btn-warning">Kembali</a>
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