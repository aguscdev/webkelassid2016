<?php
session_start(); 
// menghubungkan php dengan koneksi database
include '../config/koneksi.php';
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select user_id,username,level from user where username='$username' and password='$password'");
// var_dump($login);
// die;
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// var_dump($cek);
// die;
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	// buat session login dan username
	$_SESSION["username"] = $username;
	$_SESSION["user_id"] = $data['user_id'];
	$_SESSION["level"] = $data['level'];

	//var_dump($_SESSION["username"],$_SESSION["user_id"],$_SESSION["level"]);
	//exit;

	// echo $_SESSION["user_id"];
	// alihkan ke halaman dashboard admin
	header("location:cek_session.php");
}else{
	echo "<script>
				alert('Username / Password yang anda masukan salah');
				document.location.href = '../admin/login.php';
		</script>";
}
 
?>