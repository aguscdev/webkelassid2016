<!DOCTYPE html>
<html>

<?php
session_start();
if ($_SESSION['username']=='') {
  header('location:../admin/login.php');

  
}else{

  $user = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];  
  $level = $_SESSION["level"];

  include '../home/header.php'; 
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include '../home/sidebar.php'; ?>
    <div class="contents">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="panel panel-default">
                <div class="panel-heading">Master Customer</div>
                <div class="panel-body">
                <a class="btn btn-success" href="../user/v_add_user.php"><i class="fa fa-pencil-square-o"></i>Tambah</a><br/><br/>
                    <table id="dtUser" class="table table-bordered">
                        <thead>
                            <th>Id User</th>
                            <th>Nama</th>
                             <th>Username</th>
                            <th>Email</th>          
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                                include '../config/koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi,"select * from user");
                                while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['username']; ?></td>
                                <td><?php echo $d['email']; ?></td>
                                <td><?php echo $d['password']; ?></td>
                                <td><?php echo $d['level']; ?></td>
                                <td>
                                    <a href="v_edit_user.php?user_id=<?php echo $d['user_id']; ?>" class="btn btn-warning">Edit</a> ||
                                    <a href="action_delete_user.php?user_id=<?php echo $d['user_id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php
                                };
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section><br>
      </div>
    </div>
  </div>
</body>
<?php include '../home/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
		$('#dtUser').DataTable();
	});
</script>
</html>
<?php
}
?>