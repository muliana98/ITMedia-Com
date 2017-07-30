<h4 class="text-info">Artikel</h4>
	<a href="home.php?menu=artikel-tambah" class="btn btn-success"><i class="icon icon-plus-sign"></i> Tambah Artikel</a>
		<hr />
			<table class="table table-bordered" width="100%">
				<tr class="success">
						<td><strong>ID.</strong></td>
						<td><strong>Judul</strong></td>
						<td><strong>Kategori</strong></td>
						<td><strong>Headline</strong></td>
						<td><strong>Isi</strong></td>
						<td><strong>Pengirim</strong></td>
						<td><strong>Tanggal</strong></td>
						<td><strong>Gambar</strong></td>
						<td><strong>Edit</strong></td>
						<td><strong>Hapus</strong></td>
						</tr>
				<tr>
						
						<?php
						include "koneksi.php";
						$dataPerPage = 5;
						if(isset($_GET['page'])) {
							
							$noPage = $_GET['page'];
							
						} else $noPage = 1;
						
						$offset = ($noPage - 1) * $dataPerPage;
						
						$artikelbaru = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.gambar, a.tanggal FROM artikel a, kategori b WHERE a.id_kategori = b.id_kategori ORDER BY a.id_artikel DESC LIMIT $offset, $dataPerPage";
						$sql = mysqli_query($koneksi, $artikelbaru);
						
						while($hasil = mysqli_fetch_array($sql)) {
							
							$id_artikel = mysqli_real_escape_string($koneksi, trim($hasil['id_artikel']));
							$id_kategori = mysqli_real_escape_string($koneksi, trim($hasil['id_kategori']));
							$judul = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['judul'])));
							$kategori = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['nm_kategori'])));
							$headline = mysqli_real_escape_string($koneksi, trim(nl2br(stripslashes($hasil['headline']))));
							$headline2 = substr($headline,0,10);
							$isi = mysqli_real_escape_string($koneksi, trim(nl2br(stripslashes($hasil['isi']))));
							$isi2 = substr($isi,0,30);
							$pengirim = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['pengirim'])));
							$tanggal = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['tanggal'])));
							$gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['gambar'])));
							
							echo "<tr><td>$id_artikel</td><td>$judul</td><td>$kategori</td>
								<td>$headline2</td><td>$isi2...</td><td>$pengirim</td><td>$tanggal</td>
								<td><img src='../$gambar' width='50'></td>
								<td><a class='btn' href='home.php?menu=artikel-update&&id_artikel=$id_artikel'> <i class='icon icon-edit'></i> Edit</a></td>";
								
								?>
							
								<td><a onclick="return confirm('Anda yakin ingin menghapus Artikel berjudul: <?php echo $judul ?>   ?')" class="btn btn-danger" href="content/artikel/artikel-hapus.php?id_artikel=<?php echo $id_artikel; ?>"> <i class="icon-white icon-trash"></i> Hapus</a></td></tr>
							
							
						<?php	
						}
						echo "</table>";
						
						echo "<div class='col-sm-12'>";
						
						$query1 = "SELECT COUNT(*) AS jumData FROM artikel";
						$result = mysqli_query($koneksi, $query1);
						$data = mysqli_fetch_array($result);
						
						$jumData = mysqli_real_escape_string($koneksi, trim($data['jumData']));
						
						$jumPage = ceil($jumData/$dataPerPage);
						
						$showPage = "";
						
						echo "<div class='tf_pagination style3 col-sm-12'><div class='inner'>";
						
						if($noPage>1) {
							
							echo "<a class='btn btn-success' href='home.php?menu=artikel&&page=".($noPage-1)."'><span><</span></a>";
							
						} for($page = 1; $page <= $jumPage; $page++) {
							
							if((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
								
								if(($showPage == 1) && ($page != 2)) echo "..";
								if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "..";
								if($page == $noPage) {
									
									echo "<a href='#' class='page-numbers btn btn-warning'><b>".$page."</b></a>";
									
								} $showPage = $page;
								
							}
							
						} if($noPage < $jumPage) {
							
							echo "<a class='btn btn-success' href='home.php?menu=artikel&&page=".($noPage+1)."'><span>></span></a></div></div>";
							
						}
						echo "</div>";
						echo "<h5>Total Record : $jumData records</h5>";
						
						
						?>
						
						
						
						
						
						
						
						
						
						
						
						
						