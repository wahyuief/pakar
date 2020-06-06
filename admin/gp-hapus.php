<?php
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = $conn->query("DELETE FROM gejala_penyakit WHERE id_gp=$id");
    if ($hapus) {
        echo '<meta http-equiv="Refresh" content="0; url=./gp.php" />';
    } else {
        echo '<meta http-equiv="Refresh" content="0; url=./gp.php" />';
    }
}