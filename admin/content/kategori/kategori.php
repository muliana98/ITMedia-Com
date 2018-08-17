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
				include "/../fungsi_admin.php";
				
				$dataPerkategori = 5;
				if(isset($_GET['kategori'])) {
					
					$noPage = $_GET['kategori'];
					
				}
				else $noPage = 1;
				
				$offset = ($noPage - 1) * $dataPerkategori;
				
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
					$jumPage = ceil($jumData/$dataPerkategori);
					
					$showPage = $jumPage;
					
					$halaman_url = "home.php?menu=kategori&&kategori=";

					
					echo paginasi($halaman_url, $jumData, $jumPage, $noPage, $showPage);
					
					
				?>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
