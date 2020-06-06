<?php
$title = 'Analisa';
include('header.php');
unset($_SESSION["pesan"]);
$analisis = $conn->query("SELECT id_analisa, first_name, last_name, nik, penyakit.kode_penyakit, nama_penyakit, tanggal
                        FROM analisa
                        LEFT JOIN users ON analisa.id_user = users.id
                        LEFT JOIN penyakit ON analisa.kode_penyakit = penyakit.kode_penyakit
                        ORDER BY id_analisa DESC");

?>
<div id="inner-container">
    <div id="page-content">
        <ul id="nav-info" class="clearfix">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="">Analisa</a></li>
        </ul>

        <ul class="nav-dash">
            <li>
                <a href="<?php echo $basepath; ?>/index.php" data-toggle="tooltip" title="Dashboard" class="animation-fadeIn">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/users.php" data-toggle="tooltip" title="Users" class="animation-fadeIn">
                    <i class="fa fa-users"></i>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo $basepath; ?>/analisa.php" data-toggle="tooltip" title="Analisa" class="animation-fadeIn">
                    <i class="fa fa-bar-chart"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/gejala.php" data-toggle="tooltip" title="Gejala" class="animation-fadeIn">
                    <i class="fa fa-dashboard"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/penyakit.php" data-toggle="tooltip" title="Penyakit" class="animation-fadeIn">
                    <i class="fa fa-stethoscope"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/gp.php" data-toggle="tooltip" title="Gejala Penyakit" class="animation-fadeIn">
                    <i class="fa fa-user-md"></i>
                </a>
            </li>
        </ul>

        <h2>Analisa</h2>
        <div class="table-responsive">
            <table id="analisaAdminTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Nama</th>
                        <th>Penyakit</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;while($analisa = $analisis->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $analisa['first_name'].' '.$analisa['last_name'].' ('.$analisa['nik'].')'; ?></td>
                        <td><?php echo $analisa['nama_penyakit']; ?></td>
                        <td><?php echo date('H:i - d F Y', strtotime($analisa['tanggal'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('footer.php'); ?>