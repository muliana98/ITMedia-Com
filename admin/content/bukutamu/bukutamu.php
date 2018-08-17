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
						include "/../fungsi_admin.php";

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
							
							$showPage = $jumPage;
							
							$halaman_url = "home.php?menu=bukutamu&&page=";
							
							echo paginasi($halaman_url, $jumData, $jumPage, $noPage, $showPage);
							
						echo "<h5>(Setiap Pesan dapat dibalas ke email pengirim Langsung dari Dashboard Administrator ITMedia-Com)</h5>";

						?>









