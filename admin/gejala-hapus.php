<?php
include('header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = $conn->query("DELETE FROM gejala WHERE id_gejala=$id");
    if ($hapus) {
        echo '<meta http-equiv="Refresh" content="0; url=./gejala.php" />';
    } else {
        echo '<meta http-equiv="Refresh" content="0; url=./gejala.php" />';
    }
}