<h4 class="text-info">Kategori Artikel</h4>
	<a class="btn btn-success" href="home.php?menu=kategori-tambah"><i class="icon icon-plus-sign"></i> Tambah Kategori</a>
		<hr />
			<table class="table table-bordered" width="100%">
				<tr class="success">
						<td><strong>ID</strong></td>
						<td><strong>Nama Kategori</strong></td>
						<td><strong>Deskripsi</strong></td>
						<td><strong>Edit</strong></td>
						<td><strong>Hapus</strong></td>
						</tr>
				<?php
				include "koneksi.php";
				$dataPerkategori = 5;
				if(isset($_GET['kategori'])) {
					
					$nokategori = $_GET['kategori'];
					
				}
				else $nokategori = 1;
				
				$offset = ($nokategori - 1) * $dataPerkategori;
				
					$kategoribaru = "SELECT * FROM kategori ORDER BY nm_kategori LIMIT $offset, $dataPerkategori";
					$sql = mysqli_query($koneksi, $kategoribaru);
					while($hasil = mysqli_fetch_array($sql)) {
						
						$id_kategori = mysqli_real_escape_string($koneksi, trim($hasil['id_kategori']));
						$nm_kategori = mysqli_real_escape_string($koneksi, trim($hasil['nm_kategori']));
						$deskripsi = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['deskripsi'])));
						
						echo "<tr><td>$id_kategori</td><td>$nm_kategori</td><td>$deskripsi</td>".
							"<td><a class='btn' href='home.php?menu=kategori-update&&id_kategori=$id_kategori'><i class='icon icon-edit'></i> Edit</a></td>";
							
						
						?>
						
						
						<td><a onclick="return confirm('Anda yakin ingin menghapus Kategori: <?php echo $nm_kategori; ?>   ?')" class="btn btn-danger" href="content/kategori/kategori-hapus.php?id_kategori=<?php echo $id_kategori; ?>"><i class="icon-white icon-trash"></i> Hapus</a></td></tr>
						
						
					<?php	
					}
					echo "</table>";
					
					echo "<div class='col-sm-12'>";
					
					$query1 = "SELECT COUNT(*) AS jumData FROM kategori";
					$result = mysqli_query($koneksi, $query1);
					$data = mysqli_fetch_array($result);
					$jumData = mysqli_real_escape_string($koneksi, trim($data['jumData']));
					$jumkategori = ceil($jumData/$dataPerkategori);
					
					$showkategori = "";
					
					echo "<div class='td_pagination style3 col-sm-12'><div class='inner'>";
					if($nokategori>1) {
						
						echo "<a class='btn btn-success' href='home.php?menu=kategori&&kategori=".($nokategori-1)."'><span><</span> </a>";
						
					}
					for($kategori = 1; $kategori <= $jumkategori; $kategori++) {
						
						if((($kategori >= $nokategori - 3 ) && ($kategori <= $nokategori + 3)) || ($kategori == 1) || ($kategori == $jumkategori)) {
							
							if(($showkategori == 1) && ($kategori != 2)) echo "..";
							if(($showkategori != ($jumkategori - 1)) && ($kategori == $jumkategori)) {
								
								echo "..";
								
							}
							if($kategori == $nokategori) {
								
								echo "<a href='#' class='kategori-numbers btn btn-warning'><b>".$kategori."</b></a>";
								
							}
							$showkategori = $kategori;
						}
						
					}
					
					if($nokategori < $jumkategori) {
						
						echo "<a class='btn btn-success' href='home.php?menu=kategori&&kategori=".($nokategori+1)."'><span>></span></a></div></div>";
						
					}
					echo "</div>";
					echo "<h5>Total Record : $jumData records</h5>";
					
					
				?>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				