<?php
include('database.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$analisa_id = (isset($_GET['id']) ? $_GET['id'] : '');
$sess_id = $_SESSION["sistempakar_session"]['id'];

$analisis = $conn->query("SELECT id_analisa, nama_penyakit, definisi, pengendalian, tanggal, nik, first_name, last_name, address
                        FROM analisa
                        LEFT JOIN users ON analisa.id_user = users.id
                        LEFT JOIN penyakit ON analisa.kode_penyakit = penyakit.kode_penyakit
                        WHERE users.id = $sess_id
                        AND id_analisa = $analisa_id
                        ORDER BY id_analisa DESC")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <style>
        .bagian-cetak {
            width: 500px;
            margin: 0 auto;
            border: 1px solid gray;
            padding: 30px;
        }
        .bagian-cetak h1 {
            font-size: 27px;
            text-align: center;
            text-decoration: underline;
        }
        .bagian-cetak ol li:nth-child(1) b {
            padding-right: 100px;
        }
        .bagian-cetak ol li:nth-child(2) b {
            padding-right: 90px;
        }
        .bagian-cetak ol li:nth-child(3) b {
            padding-right: 80px;
        }
        .bagian-cetak ol li:nth-child(4) b {
            padding-right: 3px;
        }
        .bagian-cetak ol li:nth-child(5) b {
            padding-right: 14px;
        }
        h3 {
            margin-top: 30px;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .tombol-cetak {
            text-align: right;
            width: 561px;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <div id="printableArea">
        <div class="bagian-cetak">
            <h1><center>SURAT KETERANGAN DIAGNOSA</center></h1>
            <p>Dengan ini menerangkan bahwa berdasarkan hasil pemeriksaan yang telah dilakukan kepada pasien: </p>
            <ol>
                <li><b>NIK</b> : <?php echo $analisis['nik'] ?></li>
                <li><b>Nama</b> : <?php echo $analisis['first_name'] ?></li>
                <li><b>Alamat</b> : <?php echo $analisis['address'] ?></li>
                <li><b>Diagnosa Penyakit</b> : <?php echo $analisis['nama_penyakit'] ?></li>
                <li><b>Definisi Penyakit</b> : <?php echo $analisis['definisi'] ?></li>
            </ol>
            <h3>Solusi</h3>
            <p><?php echo (strpos($analisis['pengendalian'], '1.') !== false ? ucwords(nl2br($analisis['pengendalian'])) : $analisis['pengendalian']) ?></p>
        </div>
    </div>
    <div class="tombol-cetak">
        <input type="button" onclick="printDiv('printableArea')" value="CETAK" />
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>