<?php
require("koneksi.php");
require("/../fungsi_admin.php");

$ket_hak_akses = "admin";

$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
$seleksi_akun = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
$datanya = mysqli_fetch_array($seleksi_akun);
	
	$id = mysqli_real_escape_string($koneksi, trim($datanya['id']));
	$ket = mysqli_real_escape_string($koneksi, trim($datanya['ket']));
	


if(($ket_hak_akses == $ket)) {
	
	echo "
		<h4 class='text-info'>Data Anggota ITMedia-Com</h4>
		<a href='home.php?menu=admin-tambah' class='btn btn-success'><i class='icon icon-plus-sign'></i> Tambah Data</a>
	  
	";
	

	
?>

<br /><br /><div class="input-append pull-right">
			<input class="input" id="appendedInputButtons" name="cari" type="text" placeholder="Cari Data Anggota disini...">
					<button type="submit" name="cari" class="btn btn-info"><i class="icon icon-search"></i>  </button>
		  </div>

<hr />
		<table class="table table-bordered" width="100%">
			<tr class="success">
					<td><strong>ID</strong></td>
					<td><strong>Username</strong></td>
					<td><strong>E-Mail</strong></td>
					<td><strong>Nama Lengkap</strong></td>
					<td><strong>Password</strong></td>
					<td><strong>Ket.</strong></td>
					<td colspan="2"><strong><center>Aksi</center></strong></td>
					</tr>
				
				
							<?php
								
								$dataPerPage = 5;
								if(isset($_GET['page'])) {
									$noPage = $_GET['page'];
								}
								
								else $noPage = 1;
								$offset = ($noPage - 1) * $dataPerPage;
								
									$adminbaru = "SELECT * FROM admin WHERE id != 1 LIMIT $offset, $dataPerPage";
									$sql = mysqli_query($koneksi, $adminbaru);
									
									$nomor = 1;
									$nomor1 = 5 * $noPage;
									
									while($hasil = mysqli_fetch_array($sql)) 
									{
										
										
										$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
										$username = mysqli_real_escape_string($koneksi, trim($hasil['username']));
										$email = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['email'])));
										$nama_lengkap = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['nama_lengkap'])));
										$password = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['password'])));
										$password2 = substr($password, 0, 5);
										$ket = mysqli_real_escape_string($koneksi, trim(stripslashes(ucwords($hasil['ket']))));
										
										echo "<tr>
												<td>$id</td>
												<td>$username</td>
												<td>$email</td>
												<td>$nama_lengkap</td>
												<td>$password2???</td>
												<td>$ket</td>
												<td colspan='2'><center><a class='btn' href='home.php?menu=admin-update&&id=$id'><i class='icon icon-edit'></i> Edit</a> &nbsp;<font style='color: #7D7D7D;'>|</font>&nbsp;";
										?>		 
												<a onclick="return confirm('Anda yakin ingin menghapus Data Anggota: <?php echo $username;  ?>  ?')" class="btn btn-danger" href="content/admin/admin-hapus.php?id=<?php echo $id; ?>"><i class="icon-white icon-trash"></i> Hapus</a> </center></td>
												</tr>
									
									<?php
									}
									echo "</table>";
									
									echo "<div class='col-sm-12'>";
									
									$query1 = "SELECT COUNT(*) AS jumData FROM admin WHERE id != 1";
									$result = mysqli_query($koneksi, $query1);
									$data = mysqli_fetch_array($result);
									$jumData = mysqli_real_escape_string($koneksi, trim($data['jumData']));
									
									
									
									$jumPage = ceil($jumData/$dataPerPage);
									
									$showPage = $jumPage;
									$halaman_url = "home.php?menu=admin&&page=";

									
									echo paginasi($halaman_url, $jumData, $jumPage, $noPage, $showPage); //MEMANGGIL FUNCTION PAGINASI DARI halaman "fungsi_admin.php"

							?>	




	
<?php	
}



else {

?>

<?php	

	echo "<h2>Maaf,<br />Halaman ini hanya diperuntukan untuk <q>Administrator</q></h2> ";
	
}
?>
	

	
