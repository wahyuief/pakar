<?php
$title = 'Gejala';
include('header.php');

$gejalanya = $conn->query("SELECT * FROM gejala ORDER BY id_gejala DESC");

?>
<div id="inner-container">
    <div id="page-content">
        <ul id="nav-info" class="clearfix">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="">Gejala</a></li>
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
            <li class="active">
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

        <div class="row">
            <div class="col-md-6"><h2>Gejala <small><a href="gejala-tambah.php" class="hidden-lg hidden-md">Tambah Data</a></small></h2></div>
            <div class="col-md-6 text-right hidden-xs hidden-sm" style="line-height: 5;"><a href="gejala-tambah.php" class="btn btn-primary">Tambah Data</a></div>
        </div>
        <div class="table-responsive">
            <table id="gejalaAdminTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th class="cell-small">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;while($gejala = $gejalanya->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $gejala['kode_gejala']; ?></td>
                        <td><?php echo $gejala['nama_gejala']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="./gejala-edit.php?id=<?php echo $gejala['id_gejala']; ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-success" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="var c = confirm('Yakin ingin menghapus?');if(c){location.replace('./gejala-hapus.php?id=<?php echo $gejala['id_gejala']; ?>')}" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('footer.php'); ?>