<?php
function paginasi($halaman_url, $jumData, $jumPage, $noPage, $showPage) {
									
									
									echo "<div class='pagination'><ul>";
									
									
									
									
									if($jumData > 5) {
										
										if($noPage > 1) 
										
											echo "<li><a href='$halaman_url".($noPage-1)."'>&lsaquo; Prev</a></li>";
										
										 
										 
										 for($page = 1; $page <= $jumPage; $page++) {
											
											if((($page >= $noPage - 1) && ($page <= $noPage + 1)) || ($page == 1) || ($page == $jumPage)) {
												
												if(($showPage == 1) && ($page != 2)) echo "<li class='disabled'><a href='#'>...</a></li>";
												if(($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "<li class='disabled'><a href='#'>...</a></li>";
												if($page == $noPage) 
													
													echo "<li class='active'><a href='#'><b>".$page."</b></a></li>";
													
													else echo "<li><a href='$halaman_url".$page."'>$page</a></li>";
													$showPage = $page;
												
												
											} 
											
										}
									
									if($noPage < $jumPage)
										echo "<li><a href='$halaman_url".($noPage+1)."'>Next &rsaquo;</a></li> </ul> </div>";
									
									echo "</div>";
									echo "<h5>Total Record : $jumData records</h5>";
									}
	
}





function anti_sql_injection1() {
	mysqli_real_escape_string($koneksi, trim());
}


function anti_sql_injection2() {
	
}

function anti_sql_injection3() {
	
}


?>