<div class="">
	<h2 style="margin-bottom: 11px;">&nbsp;<i class="icon icon-tags" style="-webkit-transform:scale(1.8); -moz-transform:scale(1.8); -o-transfrom:scale(1.8); transform:scale(1.8);; margin-top: 10px;"></i>&nbsp; Kategori :</h2>
<?php
require("koneksi.php");

$select = "SELECT id_kategori FROM kategori WHERE LOWER(nm_kategori)<> 'layanan' AND LOWER(nm_kategori)<> 'portfolio' ORDER BY nm_kategori ASC ";
$query = mysqli_query($koneksi, $select);
$i = 1;
while($r = mysqli_fetch_array($query)) {
	
	$kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
	
	echo "<span style='display: block; box-shadow: 1px 3px 7px 0px rgba(0,0,0,0.3); padding: 1px; margin-top: 7px; border-radius: 4px;'><h4 style='margin-left: 5px;'>";
	
		$select1 = "SELECT * FROM kategori WHERE id_kategori='$kategori'";
		$query1 = mysqli_query($koneksi, $select1);
		$r1 = mysqli_fetch_array($query1);
		$id_kategori1 = mysqli_real_escape_string($koneksi, trim($r1['id_kategori']));
		$nm_kategori1 = mysqli_real_escape_string($koneksi, trim(ucwords($r1['nm_kategori'])));
		
		
			echo "<a href='index.php?menu=blog-detail-category&id_kategori=$id_kategori1'>".$nm_kategori1."</a>";
			
				$query2 = "SELECT id_kategori FROM artikel WHERE id_kategori='$id_kategori1'";
				$count1 = mysqli_query($koneksi, $query2);
				$numsf = mysqli_num_rows($count1);
					echo "<span>&nbsp;[ ".$numsf." ]&nbsp;</span>";
				
				
echo "</h4></span>";
	
}



?>

<br />
</div>