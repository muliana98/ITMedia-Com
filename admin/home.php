<?php
require("koneksi.php");
session_start();
if(isset($_SESSION['admin'])) {
	
	header("index.php");
	

?>

<!DOCTYPE html>
<html>
<head>
<?php require("meta.php"); ?>
<?php require("link.php"); ?>
<style>
	
	.foto-profil {
		
		display: inline-block;
		max-width: 43px;
		max-height: 43px;
		-webkit-box-sizing: border-box;
		   -moz-box-sizing: border-box;
		      o-box-sizing: border-box;
		        box-sizing: border-box;
				
	}
	
	.foto-profil-2 {
		
		display: inline-block;
		max-width: 70px;
		max-height: 70px;
		-webkit-box-sizing: border-box;
		   -moz-box-sizing: border-box;
		      o-box-sizing: border-box;
		        box-sizing: border-box;
		
	}
	
	.modal-body {
		min-height: relative;
		max-height: 220px;
	}


</style>
</head>
<body style="background: #F8F8F8;" data-spy="scroll" data-target=".bs-docs-sidebar">
	<div class="container">

		<div class="row">
			<div class="span3 bs-docs-sidebar">
				<?php require("menu.php"); ?>
				</div>
			<div class="span9">
				<?php 
				require("koneksi.php");
				
				$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
				$seleksi = "SELECT * FROM admin WHERE id='$id_akun'";
				$query = mysqli_query($koneksi, $seleksi);
				$hasil = mysqli_fetch_array($query);
					
					$username = mysqli_real_escape_string($koneksi, trim($hasil['username']));
					$foto_profil = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['foto_profil'])));
					$ket_hak_akses = mysqli_real_escape_string($koneksi, trim($hasil['ket']));
				
				echo "<div class='alert alert-info'>";
				?>
				
				<?php
				if(($foto_profil) && ($ket_hak_akses == "admin") ) {
					
					echo "<h4 class='text'><img src='../images/profil/$foto_profil' class='img img-rounded foto-profil'> Administrator : <u>$username</u> </h4>";
				
				}
				else if(($foto_profil) && ($ket_hak_akses == "moderator") ) {
					
					echo "<h4 class='text'><img src='../images/profil/$foto_profil' class='img img-rounded foto-profil'> Moderator : <u>$username</u> </h4>";
					
				}
				
				
				else {
					
					echo "<h4 class='text' style='padding-top: 11.5px; padding-bottom: 11.5px;'><i class='icon icon-user' style='margin-top: 2px;'></i>";
					
						if($ket_hak_akses == "admin") {
							echo " Administrator : <u>$username</u> </h4>";
							
						}
						else {
							echo " Moderator : <u>$username</u> </h4>";
							
						}
					
				}
				
				echo "</div>";
				
				?>
				
				<?php
					if(isset($_GET['menu'])) {
						$menu = $_GET['menu'];
						
						if($menu=="home") {
							require("content.php");
						}
						
						//PROFIL
						else if($menu=="profil") {
							require("content/profil/profil.php");
						}
						
						else if($menu=="profil-update") {
							require("content/profil/profil-update.php");
						}
						
						else if($menu=="profil-change-password") {
							require("content/profil/profil-change-pswd.php");
						}
						
						else if($menu=="profil-foto-ubah") {
							require("content/profil/profil-foto-ubah.php");
						}
						
						else if($menu=="profil-foto-pilih") {
							require("content/profil/profil-foto-pilih.php");
						}
						
						else if($menu=="profil-update-u") {
							require("content/profil/profil-update-u.php");
						}
						
						else if($menu=="profil-update-e") {
							require("content/profil/profil-update-e.php");
						}
						
						
						//PESAN CHAT
						else if($menu=="pesan_chat") {
							require("content/lainnya/pesan_chat.php");
						}
						
						else if($menu=="itmedia_chat") {
							require("content/lainnya/itmedia_chat.php");
						}
						
						
						//ADMIN
						else if($menu=="admin") {
							require("content/admin/admin.php");
						}

						else if($menu=="admin-tambah") {
							require("content/admin/admin-tambah.php");
						}

						else if($menu=="admin-update") {
							require("content/admin/admin-update.php");
						}
						
						
						
						//SLIDE_SHOW
						else if($menu=="slide_show") {
							require("content/slide_show/slide_show.php");
						}

						else if($menu=="slide_show-tambah") {
							require("content/slide_show/slide_show-tambah.php");
						}

						else if($menu=="slide_show-update") {
							require("content/slide_show/slide_show-update.php");
						}
						
						
						
						//ARTIKEL
						else if($menu=="artikel") {
							require("content/artikel/artikel.php");
						}

						else if($menu=="artikel-tambah") {
							require("content/artikel/artikel-tambah.php");
						}

						else if($menu=="artikel-update") {
							require("content/artikel/artikel-update.php");
						}
						
						
						
						//KATEGORI
						else if($menu=="kategori") {
							require("content/kategori/kategori.php");
						}

						else if($menu=="kategori-tambah") {
							require("content/kategori/kategori-tambah.php");
						}

						else if($menu=="kategori-update") {
							require("content/kategori/kategori-update.php");
						}


						
						
						//BUKUTAMU
						else if($menu=="bukutamu") {
							require("content/bukutamu/bukutamu.php");
						}
						else if($menu=="bukutamu-balas") {
							require("content/bukutamu/bukutamu-balas.php");
						}


						
						//KONTAK
						else if($menu=="kontak") {
							require("content/kontak/kontak.php");
						}

						else if($menu=="kontak-tambah") {
							require("content/kontak/kontak-tambah.php");
						}

						else if($menu=="kontak-update") {
							require("content/kontak/kontak-update.php");
						}
						
						
						
						//TENTANG
						else if($menu=="tentang") {
							require("content/tentang/tentang.php");
						}

						else if($menu=="tentang-tambah") {
							require("content/tentang/tentang-tambah.php");
						}

						else if($menu=="tentang-update") {
							require("content/tentang/tentang-update.php");
						}
						
						
						
						//MENU LAINNYA
						else if($menu=="lainnya") {
							require("content/lainnya/menu_lainnya.php");
						}
						
						else if($menu=="reset_backup") {
							require("content/lainnya/rb.php");
						}
						
						else if($menu=="status_aktif") {
							require("content/lainnya/status_aktif.php");
						}


						
						//LOGOUT AH!
						else if($menu=="logout") {
							require("logout.php");
						}
						
						else {
							echo "<h4 class='text-success'>Maaf Halaman '$menu' belum dibuat.</h4>";
							
						}
					}
					else {
						require("content.php");
					}
	
				?>
				
<?php require("footer.php"); ?>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
}
else {
	
	header("location: index.php");
	
}


?>