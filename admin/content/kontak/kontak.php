<h4 class="text-info">Kontak</h4>
	<a class="btn btn-success" href="home.php?menu=kontak-tambah"><i class="icon icon-plus-sign"></i> Tambah Kontak</a>
		<hr />
			<table class="table table-bordered" width="100%">
				<tr class="success">
						<td><strong>ID</strong></td>
						<td><strong>Nama</strong></td>
						<td><strong>Alamat</strong></td>
						<td><strong>Jenis</strong></td>
						<td><strong>Telp.</strong></td>
						<td><strong>E-Mail</strong></td>
						<td><strong>Ket.</strong></td>
						<td><strong>Edit</strong></td>
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

$select = "SELECT * FROM kontak ORDER BY id DESC LIMIT $offset, $dataPerPage";
$sql = mysqli_query($koneksi, $select);
while($hasil = mysqli_fetch_array($sql)) {
	
	$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
	$nama = mysqli_real_escape_string($koneksi, trim($hasil['nama']));
	$alamat = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['alamat'])));
	$jenis = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['jenis'])));
	$telp = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['telp'])));
	$email = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['email'])));
	$ket = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['ket'])));
	
	echo "<tr><td>$id</td><td>$nama</td><td>$alamat</td><td>$jenis</td><td>$telp</td>
		<td>$email</td>
		<td>$ket</td>".
		"<td><a class='btn' href='home.php?menu=kontak-update&&id=$id'><i class='icon icon-edit'></i> Edit</a></td>";
		
		
	?>
	
	
	<td><a onclick="return confirm('Anda yakin ingin menghapus Data Kontak: <?php echo $nama; ?>   ?')" class="btn btn-danger" href="content/kontak/kontak-hapus.php?id=<?php echo $id; ?>"><i class="icon-white icon-trash"></i> Hapus</a></td></tr>
	
	
<?php	
}
echo "</table>";
echo "<div class='container'>";

$query1 = "SELECT COUNT(*) AS jumData FROM kontak";
$result = mysqli_query($koneksi, $query1);
$data = mysqli_fetch_array($result);
$jumData = mysqli_real_escape_string($koneksi, $data['jumData']);
$jumPage = ceil($jumData/$dataPerPage);

$showPage = "";

echo "<div class='td_pagination style3 col-sm-12'><div class='inner'>";
if($noPage>1) {
	
	echo "<a class='page_prev btn btn-success' href='home.php?menu=kontak&&page=".($noPage-1)."'><span><</span></a>";
	
}
for($page = 1; $page <= $jumPage; $page++) {
	
	if((($page >= $noPage - 3)) && ($page <= $noPage + 3) || ($page == 1) || ($page == $jumPage)) {
		
		if(($showPage == 1) && ($page != 2)) echo "..";
		if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "..";
		if($page == $noPage) {
			
			echo "<a href='#' class='page-numbers btn btn-warning'><b>"
				.$page."</b></a>";
			
		}
		$showPage = $page;
	}
	
}
if($noPage < $jumPage) {
	
	echo "<a class='page_next btn btn-success' href='home.php?menu=kontak&&page=".($noPage+1)."'><span>></span></a></div></div>";
	
}
echo "</div>";
echo "<h5>Total Record : $jumData records</h5>";


?>
				
			



			
			




			
			