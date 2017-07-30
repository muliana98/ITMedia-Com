<h4 class="text-info">Buku Tamu</h4>
	<a class="btn btn-success" href="home.php?menu=bukutamu"><i class="icon icon-bookmark"></i> Arsip Bukutamu</a>
		<hr />
			<table class="table table-bordered" width="100%">
				<tr class="success">
						<td><strong>ID</strong></td>
						<td><strong>Tanggal</strong></td>
						<td><strong>Nama</strong></td>
						<td><strong>E-Mail</strong></td>
						<td><strong>Subjek</strong></td>
						<td><strong>Pesan</strong></td>
						<td><strong>Balas</strong></td>
						<td><strong>Hapus</strong></td>
						</tr>

<?php
include "koneksi.php";
$dataPerPage = 5;
if(isset($_GET['page'])) {
	
	$noPage = $_GET['page'];
	
}
else $noPage = 1;
$offset = ($noPage - 1) * $dataPerPage;

	$bukutamubaru = "SELECT * FROM bukutamu ORDER BY id DESC LIMIT $offset, $dataPerPage";
	$sql = mysqli_query($koneksi, $bukutamubaru);
	
	while($hasil = mysqli_fetch_array($sql)) {
		
		$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
		$tanggal = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['tanggal'])));
		$nama = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['nama'])));
		$email = nl2br(mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['email']))));
		$subjek = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['subjek'])));
		$pesan = mysqli_real_escape_string($koneksi, trim(stripslashes(nl2br($hasil['pesan']))));
		$pesan2 = substr($pesan,0,27);
		
		echo "<tr><td>$id</td><td>$tanggal</td><td>$nama</td>
			<td>$email</td><td>$subjek</td><td>$pesan2...</td>".
			"<td><a class='btn' href='home.php?menu=bukutamu-balas&&id=$id' class='btn disabled'><i class='icon icon-edit disabled'></i> Baca &amp; Balas Pesan</a></td>";
		
		?>
		
		<td><a onclick="return confirm('Anda yakin ingin menghapus Pesan dari: <?php echo $nama;  ?>   ?')" class="btn btn-danger" href="content/bukutamu/bukutamu-hapus.php?id=<?php echo $id; ?>"><i class="icon-white icon-trash"></i> Hapus</a></td></tr>
		
	<?php	
	}
	echo "</table>";
	
	echo "<div class='col-sm-12'>";
	
	$query1 = "SELECT COUNT(*) AS jumData FROM bukutamu";
	$result = mysqli_query($koneksi, $query1);
	$data = mysqli_fetch_array($result);
	$jumData = mysqli_real_escape_string($koneksi, $data['jumData']);
	$jumPage = ceil($jumData/$dataPerPage);
	
	$showPage = "";
	
	echo "<div class='tf_pagination style3 col-sm-12'><div class='inner'>";
	if($noPage>1) {
		
		echo "<a class='btn btn-success' href='home.php?menu=bukutamu&&page=".($noPage-1)."'><span><</span></a>";
		
	}
	for($page = 1; $page <= $jumPage; $page++) {
		
		if((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
			
			if(($showPage == 1) && ($page != 2)) echo "..";
			if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) {
				echo "..";
			}
			if($page == $noPage) {
				
				echo "<a href='#' class='page-numbers btn btn-warning'><b>".$page."</b></a>";
				
			}
			$showPage = $page;
		}
		
	}

if($noPage < $jumPage) {
	
	echo "<a class='btn btn-success' href='home.php?menu=bukutamu&&page=".($noPage+1)."'><span>></span></a></div></div>";
	
}
echo "</div>";
echo "<h5>Total Record : $jumData records</h5>";
echo "<h5>(Setiap Pesan dapat dibalas ke email pengirim Langsung dari Dashboard Administrator ITMedia-Com)</h5>";

?>