<h4 class="text-info">Data Anggota ITMedia-Com</h4>
	<a href="home.php?menu=admin-tambah" class="btn btn-success"><i class="icon icon-plus-sign"></i> Tambah Data</a>
	<hr />
		<table class="table table-bordered" width="100%">
			<tr class="success">
					<td><strong>ID</strong></td>
					<td><strong>Username</strong></td>
					<td><strong>E-Mail</strong></td>
					<td><strong>Nama Lengkap</strong></td>
					<td><strong>Password</strong></td>
					<td><strong>Ket.</strong></td>
					<td colspan="2"><strong><center>Aksi</center></strong></td>
					</tr>
				
				
							<?php
							include "koneksi.php";
								
								$dataPerPage = 5;
								if(isset($_GET['page'])) {
									$noPage = $_GET['page'];
								}
								
								else $noPage = 1;
								$offset = ($noPage - 1) * $dataPerPage;
								
									$adminbaru = "SELECT * FROM admin WHERE id != 1 LIMIT $offset, $dataPerPage";
									$sql = mysqli_query($koneksi, $adminbaru);
									while($hasil = mysqli_fetch_array($sql)) 
									{
										
										$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
										$username = mysqli_real_escape_string($koneksi, trim($hasil['username']));
										$email = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['email'])));
										$nama_lengkap = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['nama_lengkap'])));
										$password = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['password'])));
										$password2 = substr($password, 0, 5);
										$ket = mysqli_real_escape_string($koneksi, trim(stripslashes(ucwords($hasil['ket']))));
										
										echo "<tr>
												<td>$id</td>
												<td>$username</td>
												<td>$email</td>
												<td>$nama_lengkap</td>
												<td>$password2???</td>
												<td>$ket</td>
												<td colspan='2'><center><a class='btn' href='home.php?menu=admin-update&&id=$id'><i class='icon icon-edit'></i> Edit</a> &nbsp;<font style='color: #7D7D7D;'>|</font>&nbsp;";
										?>		 
												<a onclick="return confirm('Anda yakin ingin menghapus Data Anggota: <?php echo $username;  ?>  ?')" class="btn btn-danger" href="content/admin/admin-hapus.php?id=<?php echo $id; ?>"><i class="icon-white icon-trash"></i> Hapus</a> </center></td>
												</tr>
									
									<?php
									}
									echo "</table>";
									
									echo "<div class='col-sm-12'>";
									
									$query1 = "SELECT COUNT(*) AS jumData FROM admin WHERE id != 1";
									$result = mysqli_query($koneksi, $query1);
									$data = mysqli_fetch_array($result);
									$jumData = mysqli_real_escape_string($koneksi, trim($data['jumData']));
									
									$jumPage = ceil($jumData/$dataPerPage);
									
									$showPage = "";
									
									echo "<div class='tf_pagination style3 col-sm-12'><div class='inner'>";
									if($noPage > 1) {
										
										echo "<a class='btn btn-success' href='home.php?menu=admin&&page=".($noPage-1)."'><span><i class='icon-white icon-chevron-left'></i><span></a>";
										
									} for($page = 1; $page <= $jumPage; $page++) {
										
										if((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
											
											if(($showPage == 1) && ($page != 2)) echo "..";
											if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "..";
											if($page == $noPage) {
												
												echo "<a href='#' class='page-numbers btn btn-warning'><b>".$page."</b></a>";
											}
											
										} $showPage = $page;
										
									}
									
									if($noPage < $jumPage)
										echo "<a class='btn btn-success' href='home.php?menu=admin&&page=".($noPage+1)."'><span><i class='icon-white icon-chevron-right'></i></span></a> </div></div>";
									
									echo "</div>";
									echo "<h5>Total Record : $jumData records</h5>";

							?>