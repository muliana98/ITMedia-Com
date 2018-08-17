<h4 class="text-info">Artikel</h4>
	<a href="home.php?menu=artikel-tambah" class="btn btn-success"><i class="icon icon-plus-sign"></i> Tambah Artikel</a>
		<hr />
			<table class="table table-bordered" id="artikel" width="100%">
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
						include "/../fungsi_admin.php";
						
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
							$judul = substr($judul, 0, 12);
							$kategori = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['nm_kategori'])));
							$headline = mysqli_real_escape_string($koneksi, trim(nl2br(stripslashes($hasil['headline']))));
							$headline2 = substr($headline,0,10);
							$isi = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['isi'])));
							$isi2 = substr($isi,0,30);
							
							
							//MENGHILANGKAN TAG HEADING HTML
							$isi2 = str_replace('<h1>', "", $isi2);
							$isi2 = str_replace('</h1>', "", $isi2);
							$isi2 = str_replace('<h2>', "", $isi2);
							$isi2 = str_replace('</h2>', "", $isi2);
							$isi2 = str_replace('<h3>', "", $isi2);
							$isi2 = str_replace('</h3>', "", $isi2);
							$isi2 = str_replace('<h4>', "", $isi2);
							$isi2 = str_replace('</h4>', "", $isi2);
							$isi2 = str_replace('<h5>', "", $isi2);
							$isi2 = str_replace('</h5>', "", $isi2);
							$isi2 = str_replace('<h6>', "", $isi2);
							$isi2 = str_replace('</h6>', "", $isi2);
							
							
							//MENGHILANGKAN BOLD, ITALIC, UNDERLINE
							$isi2 = str_replace('<strong>', "", $isi2);
							$isi2 = str_replace('<i>', "", $isi2);
							$isi2 = str_replace('<u>', "", $isi2);
							$isi2 = str_replace('<b>', "", $isi2);
							$isi2 = str_replace('</strong>', "", $isi2);
							$isi2 = str_replace('</i>', "", $isi2);
							$isi2 = str_replace('</u>', "", $isi2);
							$isi2 = str_replace('</b>', "", $isi2);
							
							
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
						
						$showPage = $jumPage;
						
						$halaman_url = "home.php?menu=artikel&&page=";
						
						
						echo paginasi($halaman_url, $jumData, $jumPage, $noPage, $showPage);
						
						?>
						
						
						
						
						
						
						
						
						
						
						
						
						
