<?php
$title = 'Gejala Penyakit';
include('header.php');
unset($_SESSION["pesan"]);
$gpnya = $conn->query("SELECT id_gp, gejala.kode_gejala, gejala.nama_gejala, penyakit.kode_penyakit, penyakit.nama_penyakit
                    FROM gejala_penyakit
                    LEFT JOIN gejala ON gejala_penyakit.kode_gejala = gejala.kode_gejala
                    LEFT JOIN penyakit ON gejala_penyakit.kode_penyakit = penyakit.kode_penyakit
                    ORDER BY id_gp DESC");

$penyakit = $conn->query("SELECT * FROM penyakit");
function gejala_dari_penyakit($kode){
    global $conn;
    $gejala = $conn->query("SELECT * FROM gejala_penyakit WHERE kode_penyakit='$kode'");
    while ($g = $gejala->fetch_assoc()) {
        $kode_gejala[] = $g['kode_gejala'];
    }
    echo(isset($kode_gejala) ? implode(', ', $kode_gejala) : '');
}
?>
<div id="inner-container">
    <div id="page-content">
        <ul id="nav-info" class="clearfix">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="">Gejala Penyakit</a></li>
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
            <li>
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
            <li class="active">
                <a href="<?php echo $basepath; ?>/gp.php" data-toggle="tooltip" title="Gejala Penyakit" class="animation-fadeIn">
                    <i class="fa fa-user-md"></i>
                </a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-6"><h2>Gejala Penyakit <small><a href="gp-tambah.php" class="hidden-lg hidden-md">Tambah Data</a></small></h2></div>
            <div class="col-md-6 text-right hidden-xs hidden-sm" style="line-height: 5;"><a href="gp-tambah.php" class="btn btn-primary">Tambah Data</a></div>
        </div>
        <div class="table-responsive">
            <table id="gpAdminTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Nama Penyakit</th>
                        <th>Nama Gejala</th>
                        <th class="cell-small">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;while($gp = $gpnya->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $gp['nama_penyakit']; ?></td>
                        <td><?php echo $gp['nama_gejala']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="./gp-edit.php?id=<?php echo $gp['id_gp']; ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-success" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="var c = confirm('Yakin ingin menghapus?');if(c){location.replace('./gp-hapus.php?id=<?php echo $gp['id_gp']; ?>')}" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <h2>Rule Base</h2>
        <div class="table-responsive">
            <table id="rbAdminTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="10">RULE</th>
                        <th>IF</th>
                        <th>THEN</th>
                        <th>Keterangan</th>
                        <th class="cell-small">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;while($sakit = $penyakit->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php gejala_dari_penyakit($sakit['kode_penyakit']); ?></td>
                        <td><?php echo $sakit['kode_penyakit']; ?></td>
                        <td><?php echo $sakit['nama_penyakit']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="./gp-edit.php?id=<?php echo $gp['id_gp']; ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-success" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="var c = confirm('Yakin ingin menghapus?');if(c){location.replace('./gp-hapus.php?id=<?php echo $gp['id_gp']; ?>')}" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('footer.php'); ?>