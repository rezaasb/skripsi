<?php
session_start();

require '../database/koneksi.php';

if( isset($_SESSION["Login"]) ) {
	
}

if( isset($_POST["submit"]) ) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$level = $_POST["level"];
	
	$result1 = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$username."' AND password = '".$password."'
	 AND level ='".$level."'");

	$data1 = mysqli_fetch_array($result1);
	
	
	
	
	$_SESSION['user'] = $data1['username'];
	$_SESSION['level'] = $data1['level'];
 
		$_SESSION["Login"] = true;
		
		
		$level1 = $data1["level"];
		
		
		
			if($level !== $level1){
				echo "<script>
				alert('Anda tidak terdaftar sebagai ".$level."...!');
			</script>";
		}
		
		
		
		if( mysqli_num_rows($result1) > 0 ) {
			if($data1['level'] == 'Admin'){
				session_start();
				$_SESSION['Admin'] = $data1[id_user];
				header("location: ../index.php?page=barang");
			}elseif($data1['level'] == 'Kepala'){
				$_SESSION['Kepala'] = $data1[id_user];
				header("location: ../index.php?page=user");
			}
			elseif($data1['level'] == 'Distributor'){
				$_SESSION['Distributor'] = $data1[id_user];
				header("location: ../index.php?page=dashboard");
			}
		}
		

        else{
		echo "<script>
				alert('Username dan Password Salah..!');
				document.location.href = 'login.php';
			</script>";
		}
		
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>sistem informasi pengiriman barang | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <div class="login-box-body">
    <p class="login-box-msg">Sistem Pengiriman Barang NBRS</p>

    <form role="form" method="post" action="">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
		
		<label for="level">Anda masuk sebagai..</label>
									<div class="radio">
									  <label class="radio-inline">
										<input type="radio" name="level" id="level" value="Admin" checked>
										Admin
									  </label>
									</div>
									<div class="radio">
									  <label class="radio-inline">
										<input type="radio" name="level" id="level" value="Kepala" checked>
										Kepala Gudang
									  </label>
									</div>
									<div class="radio">
									  <label class="radio-inline">
										<input type="radio" name="level" id="level" value="Distributor" checked>
										Distributor
									  </label>
									</div>
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<br><br><br>
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
