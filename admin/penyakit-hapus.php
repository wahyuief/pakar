<?php
include('header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = $conn->query("DELETE FROM penyakit WHERE id_penyakit=$id");
    if ($hapus) {
        echo '<meta http-equiv="Refresh" content="0; url=./penyakit.php" />';
    } else {
        echo '<meta http-equiv="Refresh" content="0; url=./penyakit.php" />';
    }
}