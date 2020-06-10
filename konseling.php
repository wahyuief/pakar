<?php
ob_start();
include('header.php');
if (!isset($_SESSION["sistempakar_session"])) {
    echo '<meta http-equiv="Refresh" content="0; url=./masuk.php" />';
}

$sess_id = $_SESSION["sistempakar_session"]['id'];
$user = $conn->query("SELECT * FROM users WHERE id=$sess_id")->fetch_assoc();
$step = (isset($_GET['step']) ? $_GET['step'] : 1);
$sesi_konseling = $_SESSION['jawaban_'.strtolower($user['first_name'])];
$tidak = $_SESSION['jawaban_tidak'];

if (isset($sesi_konseling)) {
    $koge  = looping_sesi(looping_sesi($sesi_konseling), 'gejala');
    foreach ($koge as $ko) {
        $gejala = $conn->query("SELECT * FROM gejala WHERE kode_gejala='$ko'")->fetch_assoc();
        if (in_array($gejala['kode_gejala'], $koge) && !in_array($gejala['kode_gejala'], $sesi_konseling) && !in_array($gejala['kode_gejala'], $tidak)) {
            $gejala = $conn->query("SELECT * FROM gejala WHERE kode_gejala='$ko'")->fetch_assoc();
            break;
        } else {
            $gejala = array('nama_gejala'=>null);
        }
    }
    // echo '<br><br>Kode Penyakit<br>';
    // print_r(looping_sesi($sesi_konseling));
    // echo '<br><br>Kode Gejala<br>';
    // print_r($koge);
    // echo '<br><br>Jawaban Iya<br>';
    // print_r($sesi_konseling);
    // echo '<br><br>Jawaban Tidak<br>';
    // print_r($tidak);
} else {
    $gejala = $conn->query("SELECT * FROM gejala ORDER BY rand() LIMIT 1")->fetch_assoc();
}

if (isset($_POST['jawaban'])) {
    if ($_POST['jawaban'] == 'iya') {
        $_SESSION['jawaban_'.strtolower($user['first_name'])][$step] = (isset($step) ? $_POST['kode_gejala_pertama'] : $gejala['kode_gejala']);
    } else {
        $_SESSION['jawaban_tidak'][$step] = (isset($step) ? $_POST['kode_gejala_pertama'] : $gejala['kode_gejala']);
    }
    $next_step = $step+1;
    header('Location: konseling.php?step='.$next_step);
    // echo '<meta http-equiv="Refresh" content="0, url=konseling.php?step='.$next_step.'">';
}

function looping_sesi($sesi, $table = 'penyakit'){
    global $conn;
    if ($table == 'penyakit') {
        foreach ($sesi as $ses) {
            $hasil = daftar_penyakit($ses);
        }
    } else {
        foreach ($sesi as $ses) {
            $hasil = daftar_gejala($ses);
        }
    }
    return $hasil;
}

function daftar_penyakit($kode){
    global $conn;
    $penyakit = $conn->query("SELECT * FROM gejala_penyakit WHERE kode_gejala='$kode'");
    while ($p = $penyakit->fetch_assoc()) {
        $kode_penyakit[] = $p['kode_penyakit'];
    }
    return $kode_penyakit;
}

function daftar_gejala($kode){
    global $conn;
    $gejala = $conn->query("SELECT * FROM gejala_penyakit WHERE kode_penyakit='$kode'");
    while ($g = $gejala->fetch_assoc()) {
        $kode_gejala[] = $g['kode_gejala'];
    }
    return $kode_gejala;
}

function penyakit($kode){
    global $conn;
    $kode = $kode[0];
    $penyakit = $conn->query("SELECT * FROM penyakit WHERE kode_penyakit='$kode'");
    return $penyakit->fetch_assoc()['nama_penyakit'];
}

if (isset($_GET['hpus'])) {
    unset($sesi_konseling);
    session_destroy();
}
?>
<div class="main margin-top">
    <div class="container">
        <?php if($gejala['nama_gejala'] != null): ?>
        <p>Hai <b><?php echo $user['first_name'] ?></b>, Yuk Mulai Konseling. Jawab pertanyaan berikut ini yaa.</p>
        <h1>Apakah Anda Merasa <?php echo $gejala['kode_gejala'].' : '.$gejala['nama_gejala'] ?></h1>
        <form method="post">
            <input type="hidden" name="kode_gejala_pertama" value="<?php echo $gejala['kode_gejala'] ?>">
            <div class="form-group">
                <input type="radio" name="jawaban" value="iya" class="input-control"> Iya <br>
                <input type="radio" name="jawaban" value="tidak" class="input-control"> Tidak
            </div>
        </form>
        <?php else: ?>
        Kemungkinan penyakit anda yaitu <?php echo penyakit(looping_sesi($sesi_konseling)); ?>
        <?php endif; ?>
    </div>
</div>
<?php include('footer.php') ?>