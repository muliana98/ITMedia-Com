<h4 class="text-info">Slide Show</h4>
<a href="home.php?menu=slide_show-tambah" class="btn btn-success"><i class="icon icon-plus-sign"></i> Tambah Slide-Show</a>
<hr />
<table class="table table-bordered" width="100%">
	<tr class="success">
		<td><strong>ID</strong></td>
		<td><strong>Judul</strong></td>
		<td><strong>Deskripsi</strong></td>
		<td><strong>Gambar</strong></td>
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

$select = "SELECT * FROM slide_show ORDER BY id DESC LIMIT $offset, $dataPerPage";
$sql = mysqli_query($koneksi, $select);
while($hasil = mysqli_fetch_array($sql))
{
	$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
	$judul = mysqli_real_escape_string($koneksi, trim($hasil['judul']));
	$deskripsi = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['deskripsi'])));
	$gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['gambar'])));
	
	echo "<tr><td>$id</td> <td>$judul</td> <td>$deskripsi</td> <td><img src='../images/slide_show/".$gambar."' width='100' /></td>".
		"<td><a class='btn btn-small' href='home.php?menu=slide_show-update&&id=$id'>
		<i class='icon icon-edit'></i> Edit</a></td>";
		
		
	?>
	
	
	<td><a onclick="return confirm('Anda yakin ingin menghapus Slide-Show berjudul: <?php echo $judul; ?>   ?')" class="btn btn-small btn-danger" href="content/slide_show/slide_show-hapus.php?id=<?php echo $id; ?>">
		<i class="icon-white icon-trash"></i> Hapus</a></td></tr>
	
	
<?php	
}

echo "</table>";
echo "<div class='container'>";

$query1 = "SELECT COUNT(*) AS jumData FROM slide_show";
$result = mysqli_query($koneksi, $query1);
$data = mysqli_fetch_array($result);
$jumData = mysqli_real_escape_string($koneksi, trim($data['jumData']));
$jumPage = ceil($jumData/$dataPerPage);

$showPage = "";

echo "<div class='tf_pagination style3 span12'><div class='inner'>";
if($noPage>1) {
	echo "<a class='page_prev btn btn-success' href='home.php?menu=slide_show&&page=".($noPage-1)."'><span><</span></a>";
}

for($page = 1; $page <= $jumPage; $page++) {
	
	if((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1)) {
		
		if(($showPage == 1) && ($page != 2)) echo "..";
		if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "..";
		if($page == $noPage) {
			echo "<a href='#' class='page-numbers btn btn-warning'><b>".$page."</b></a>";
		}
		$showPage = $page;
	}
}

if($noPage < $jumPage) {
	echo "<a class='page_next btn btn-success' href='home.php?menu=slide_show&&page=".($noPage+1)."'><span>></span></a></div></div>";
}

echo "</div>";
echo "<h5>Total Record : $jumData records</h5>";

?>