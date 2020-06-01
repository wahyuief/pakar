<?php
include('header.php');
if (isset($_SESSION["sistempakar_session"]) && $_SESSION["sistempakar_session"]['level'] != 'admin') {
    echo '<meta http-equiv="Refresh" content="0; url=./member.php" />';
}

$sess_id = $_SESSION["sistempakar_session"]['id'];
$users = $conn->query("SELECT * FROM users");
?>
<div class="main margin-top">
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="./admin.php" class="list-group-item">Dashboard</a>
                    <a href="./users.php" class="list-group-item active">Users</a>
                    <a href="./riwayat.php" class="list-group-item">Riwayat Konseling</a>
                    <a href="./keluar.php" class="list-group-item">Keluar</a>
                </div>
            </div>
            <div class="col-md-8">
                <?php echo(isset($pesan) ? $pesan : '') ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Daftar Semua User</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Level</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;while($user = $users->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $user['nik']; ?></td>
                                    <td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
                                    <td><?php echo $user['phone']; ?></td>
                                    <td><?php echo ($user['gender'] == 'P' ? 'Perempuan' : 'Laki-Laki'); ?></td>
                                    <td><?php echo $user['level']; ?></td>
                                    <td><a class="btn btn-sm btn-info" href="./edit-profile.php?id=<?php echo $user['id']; ?>">Edit</a><?php echo($user['id'] != 1 ? '<a class="btn btn-sm btn-danger" href="javascript:;" onclick="var c = confirm(\'Yakin ingin menghapus?\');if(c){location.replace(\'./hapus-profile.php?id='.$user['id'].'\')}">Hapus</a>' : '') ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>