<?php
require("koneksi.php");
session_start();

if(isset($_SESSION['admin'])) {
	header("location: home.php");
	
}
else {


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keyword" content="jasa pembuatan web, software, desain grafis, video editing, jaringan">
	<meta name="description" content="ITMedia merupakan sebuah perusahaan yang bergerak pada bidang teknologi informasi">
	<meta name="robots" content="noindex">
<!-- Programming by: Muliana Insan Wahyudi-->
<title>Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="assets/css/bootstrap-responsive.css" type="text/css" media="screen">
<link rel="stylesheet" href="assets/css/docs.css" type="text/css" media="screen">
<link rel="stylesheet" href="assets/css/pretiffy.css" type="text/css" media="screen">
<link rel="icon" href="assets/picture/logo_itmedia_flat.png">
<style>


body {
	padding-top: 50px;
	padding-bottom: 50px;
	background: url(assets/picture/triangles-17907-1920x1080.jpg) no-repeat center center fixed;
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	background-size: 100% 100%;;
}


.form-signin {
	max-width: 360px;
	padding: 15px;
	padding-top: 28px;
	padding-bottom: 21px;
	margin: 0 auto;
	box-shadow: 0px 4px 6px 2px rgba(0,0,0,0.5);
	display: block;
	border-radius: 7px;
	-webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

.form-signin h2 {
	
	border-bottom: 1px solid #333333;
	
}




.form-signin .form-signin-heading,
.form-signin .checkbox {
	margin-bottom: 25px;
}


.form-signin .checkbox {
	font-weight: normal;
}


.form-signin .form-control {
	position: relative;
	height: auto;
	-webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}


.form-signin .form-control:focus {
	z-index: 1;
}


.form-signin input[type="text"] {
	margin-bottom: 0px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	border-top-right-radius: 6px;
	border-top-left-radius: 6px;
}


.form-signin input[type="password"] {
	margin-bottom: 30px;
	border-bottom-right-radius: 6px;
	border-bottom-left-radius: 6px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}


</style>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/holder.js"></script>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
	<div class="container">
		<form class="form form-signin" method="post" action="cek-login.php" name="login">
				<h2 class="form-signin-heading text-center"><i class="icon icon-lock" style="transform: scale(1.8); margin-top: 10px;"></i>&nbsp; Halaman Login</h2>
					<center><i class="icon icon-user" style="transform: scale(1.8); padding-bottom: 10px;"></i></center>
					
						<input type="text" name="user" id="input_email" class="input-xlarge form-control input-block-level" placeholder="E-Mail / Username" required autofocus>
						<input type="password" name="pass" id="input_password" class="input-xlarge form-control input-block-level" placeholder="Password" required>
				
					<button type="submit" name="login" class="btn btn-large btn-primary btn-block"><i class="icon-white icon-check"></i> Login</button>
			<br />
	<p class="text-center">Developed by: Muliana Insan Wahyudi.<br />ITMedia-Com &copy;
			<script>
			var tahun_pembuatan = new Date();
			document.write(tahun_pembuatan.getFullYear());
			</script>
			</p>
	</form>
</div>



</body>
</html>
<?php 
}

?>
