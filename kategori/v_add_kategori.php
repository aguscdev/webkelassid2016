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
?>

<?php include '../home/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include '../home/sidebar.php'; ?>
    <div class="contents">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="panel panel-default">
            <div class="panel-heading">Tambah Kategori</div>
            <div class="panel-body">

            <form method="post" action="action_add_kategori.php">
              <div class="form-group">
                  <label for="kategori_id">Mata Kuliah Id</label>
                  <input type="text" name="kategori_id" class="form-control" id="kategori_id" required disabled="">
              </div>
              <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <input type="text" name="kategori" class="form-control" id="kategori" required>
              </div>
              <button type="submit" class="btn btn-info">Simpan</button>
              <a class="btn btn-danger" href="v_kategori.php">Batal</a>
          </form>
        </div>
        </section><br>
      </div>
    </div>
  </div>
</body>
<?php include '../home/footer.php'; ?>
</html>
<?php
}
?>