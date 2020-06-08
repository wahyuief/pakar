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
    <div class="container">
        <h1>Mulai Konseling</h1>
        
    </div>
</div>
<?php include('footer.php') ?>