<h4 class="text-info">Tentang</h4>
	<a class="btn btn-success" href="home.php?menu=tentang-tambah"><i class="icon icon-plus-sign"></i> Tambah Tentang</a>
		<hr />
			<table class="table table-bordered" width="100%">
				<tr class="success">
						<td><strong>ID</strong></td>
						<td><strong>Nama Tentang</strong></td>
						<td><strong>Link</strong></td>
						<td><strong>Ket.</strong></td>
						<td><strong>Gambar</strong></td>
						<td><strong>Edit</strong></td>
						<td><strong>Hapus</strong></td>
						</tr>


<?php
include "koneksi.php";
include "/../fungsi_admin.php";

$dataPertentang = 5;

if(isset($_GET['tentang'])) {
	
	$noPage = $_GET['tentang'];
	
}
else $noPage = 1;
$offset = ($noPage - 1) * $dataPertentang;

	$tentangbaru = "SELECT * FROM tentang ORDER BY nm_tentang LIMIT $offset, $dataPertentang";
	$sql = mysqli_query($koneksi, $tentangbaru);
	while($hasil = mysqli_fetch_array($sql)) {
		
		$id_tentang = mysqli_real_escape_string($koneksi, trim($hasil['id_tentang']));
		$nm_tentang = mysqli_real_escape_string($koneksi, trim($hasil['nm_tentang']));
		$link = mysqli_real_escape_string($koneksi, trim($hasil['link']));
		$ket = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['ket'])));
		$ket = str_replace('\r\n', "<br />", $ket);
		$gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['gambar'])));
		
		echo "<tr><td>$id_tentang</td><td>$nm_tentang</td><td>$link</td><td>$ket</td><td><img src='../images/logo/".$gambar."' width='50' /></td>".
			"<td><a class='btn' href='home.php?menu=tentang-update&&id_tentang=$id_tentang'><i class='icon icon-edit'></i> Edit</a></td>";
			
			
		?>
		
		
		<td><a onclick="return confirm('Anda yakin ingin menghapus Data Tentang: <?php echo $nm_tentang; ?>   ?')" class="btn btn-danger" href="content/tentang/tentang-hapus.php?id_tentang=<?php echo $id_tentang; ?>"><i class="icon-white icon-trash"></i> Hapus</a></td> </tr>
		
		
	<?php	
	}
	echo "</table>";
	echo "<div class='col-sm-12'>";
	
	$query1 = "SELECT COUNT(*) AS jumData FROM tentang";
	$result = mysqli_query($koneksi, $query1);
	$data = mysqli_fetch_array($result);
	$jumData = mysqli_real_escape_string($koneksi, $data['jumData']);
	$jumPage = ceil($jumData/$dataPertentang);
	
	$showPage = $jumPage;
	
	$halaman_url = "home.php?menu=tentang&&tentang=";
	
	
	echo paginasi($halaman_url, $jumData, $jumPage, $noPage, $showPage);


?>
















