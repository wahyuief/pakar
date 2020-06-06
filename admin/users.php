<?php
$title = 'Users';
include('header.php');
if (isset($_SESSION["sistempakar_session"]) && $_SESSION["sistempakar_session"]['level'] != 'admin') {
    echo '<meta http-equiv="Refresh" content="0; url=./member.php" />';
}

$sess_id = $_SESSION["sistempakar_session"]['id'];
$users = $conn->query("SELECT * FROM users");
?>
<div id="inner-container">
    <div id="page-content">
        <ul id="nav-info" class="clearfix">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="">Users</a></li>
        </ul>

        <ul class="nav-dash">
            <li>
                <a href="<?php echo $basepath; ?>/index.php" data-toggle="tooltip" title="Dashboard" class="animation-fadeIn">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li class="active">
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
            <li>
                <a href="<?php echo $basepath; ?>/gp.php" data-toggle="tooltip" title="Gejala Penyakit" class="animation-fadeIn">
                    <i class="fa fa-user-md"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $basepath; ?>/pertanyaan.php" data-toggle="tooltip" title="Kamus Pertanyaan" class="animation-fadeIn">
                    <i class="fa fa-book"></i>
                </a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-6"><h2>Users <small><a href="user-tambah.php" class="hidden-lg hidden-md">Tambah Data</a></small></h2></div>
            <div class="col-md-6 text-right hidden-xs hidden-sm" style="line-height: 5;"><a href="user-tambah.php" class="btn btn-primary">Tambah Data</a></div>
        </div>
        <div class="table-responsive">
            <table id="usersAdminTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th class="hidden-xs">NIK</th>
                        <th>Nama</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs">No. Telp</th>
                        <th class="hidden-xs">Tanggal Lahir</th>
                        <th class="hidden-xs">Jenis Kelamin</th>
                        <th>Level</th>
                        <th class="cell-small">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;while($user = $users->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="hidden-xs"><?php echo $user['nik']; ?></td>
                        <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
                        <td class="hidden-xs"><?php echo $user['email']; ?></td>
                        <td class="hidden-xs"><?php echo $user['phone']; ?></td>
                        <td class="hidden-xs"><?php echo date('d F Y', strtotime($user['birthdate'])).' / '.date_diff(date_create($user['birthdate']), date_create('now'))->y.' Tahun'; ?></td>
                        <td class="hidden-xs"><?php echo ($user['gender'] == 'P' ? 'Perempuan' : 'Laki-Laki'); ?></td>
                        <td><?php echo $user['level']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="./user-edit.php?id=<?php echo $user['id']; ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-success" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <?php if($user['id'] !== $sess_id): ?><a href="javascript:void(0)" onclick="var c = confirm('Yakin ingin menghapus?');if(c){location.replace('./user-hapus.php?id=<?php echo $user['id']; ?>')}" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a><?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('footer.php'); ?>