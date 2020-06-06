<?php
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$sess_id = $_SESSION["sistempakar_session"]['id'];
$user = $conn->query("SELECT * FROM users WHERE id=$sess_id")->fetch_assoc();
$existing = $conn->query("SELECT * FROM analisa WHERE id_user=$sess_id")->num_rows;

$analisis = $conn->query("SELECT id_analisa, nama_penyakit, pengendalian, tanggal
                        FROM analisa
                        LEFT JOIN users ON analisa.id_user = users.id
                        LEFT JOIN penyakit ON analisa.kode_penyakit = penyakit.kode_penyakit
                        WHERE users.id = $sess_id
                        ORDER BY id_analisa DESC");
?>
<div class="main margin-top">
    <?php if ($existing == 0) {
        echo '<div class="container"><div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Selamat datang!</strong> Untuk memulai konseling online silakan <a href="konseling.php">klik disini</a>.
        </div></div>';
    } ?>
    <div class="container">
        <h1>Riwayat Konseling</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="./member.php" class="list-group-item">Dashboard</a>
                    <a href="./profile.php" class="list-group-item">Profile</a>
                    <a href="./riwayat.php" class="list-group-item active">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Daftar Riwayat</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Penyakit</th>
                                    <th>Pengendalian</th>
                                    <th width="200">Tanggal Konseling</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;while($analisa = $analisis->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $analisa['nama_penyakit']; ?></td>
                                    <td><?php echo $analisa['pengendalian']; ?></td>
                                    <td><?php echo date('d F Y', strtotime($analisa['tanggal'])); ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>