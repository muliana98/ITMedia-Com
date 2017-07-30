function indikator_online() {
	$(".table table-bordered").load("home.php?menu=statuf_aktif");
}
setInterval(indikator_online, 1000);

function load_pesan() {
	$(".modal-body").load("home.php?menu=status_aktif");
}
setInterval(load_pesan, 1000);