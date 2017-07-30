<h4 class="text-info">Profil</h4>
	<hr />
		
				<?php
				include "koneksi.php";
				
				$akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
				
				$seleksi = "SELECT * FROM admin WHERE id='$akun'";
				$query = mysqli_query($koneksi, $seleksi);
				$data_nya = mysqli_fetch_array($query);
					$id = mysqli_real_escape_string($koneksi, trim($data_nya['id']));
					$username = mysqli_real_escape_string($koneksi, trim($data_nya['username']));
					$email = mysqli_real_escape_string($koneksi, trim($data_nya['email']));
					$nama_lengkap = mysqli_real_escape_string($koneksi, trim($data_nya['nama_lengkap']));
					$password = mysqli_real_escape_string($koneksi, trim($data_nya['password']));
					$password = substr($password, 0, 5);
					$ket = mysqli_real_escape_string($koneksi, trim(ucwords($data_nya['ket'])));
					$foto_profil = mysqli_real_escape_string($koneksi, trim(stripslashes($data_nya['foto_profil'])));
					
					
					echo "<table class='table' width='100%'>
							<tr>
									<td><strong>&raquo; ID</strong></td>
									<td><strong>:</strong></td>
									<td>$id</td>
									</tr>
							<tr>
									<td><strong>&raquo; Username</strong></td>
									<td><strong>:</strong></td>
									<td>$username</td>
									</tr>
							<tr>
									<td><strong>&raquo; Nama Lengkap</strong></td>
									<td><strong>:</strong></td>
									<td>$nama_lengkap</td>
									</tr>
							<tr>
									<td><strong>&raquo; E-Mail</strong></td>
									<td><strong>:</strong></td>
									<td>$email</td>
									</tr>
							<tr>
									<td><strong>&raquo; Password</strong></td>
									<td><strong>:</strong></td>
									<td>$password???</td>
									</tr>
							<tr>
									<td><strong>&raquo; Ket.</strong></td>
									<td><strong>:</strong></td>
									<td>$ket</td>
									</tr>";
						if($foto_profil) {
							
							echo "
								<tr>
										<td><strong>&raquo; Foto Profil</strong></td>
										<td><strong>:</strong></td>
										<td><img src='../images/profil/$foto_profil' class='img img-polaroid foto-profil-2'></td>
										</tr>";
									
						}
						
						else {
							
							echo "
								<tr>
										<td><strong>&raquo; Foto Profil</strong></td>
										<td><strong>:</strong></td>
										<td><i class='icon icon-user'></i></td>
										</tr>";
									
							
						}
						
									
						echo "
							<tr>
									<td colspan='2'></td>
									<td>";
									
									
						if($foto_profil) {
							
							echo "  <a class='btn' href='home.php?menu=profil-foto-ubah&&id=$id'><i class='icon icon-picture'></i> Ubah Foto Profil</a>";
									
						}
						else {
							
							echo "  <a class='btn' href='home.php?menu=profil-foto-pilih&&id=$id'><i class='icon icon-picture'></i> Pilih Foto Profil</a>";
							
						}
									
						
						echo "
									</td>
									</tr>
							<tr>
									<td colspan='2'></td>
									<td><a class='btn btn-primary' href='home.php?menu=profil-update&&id=$id'><i class='icon-white icon-edit'></i> Edit Data Profil</a></td>
									</tr>
							<tr>
									<td colspan='2'></td>
									<td><a class='btn btn-danger' href='home.php?menu=profil-change-password&&id=$id'><i class='icon-white icon-lock'></i> Ubah Password</a></td>
									</tr>
					
					
					";
					

					
					echo "</table>";
				
				
				
				?>
				
