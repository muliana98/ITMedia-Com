$(document).ready(function() {
	
    $("#emotics").popover({
		html: true,
		content: function() {
			return "<img width='19%' height='19%' src='web_itmedia/../emotics/akasmaran.gif' title='[kasmaran]' onClick=\"tambah_emotics('[kasmaran]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/akedip.gif' title='[kedip]' onClick=\"tambah_emotics('[kedip]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/aketawa.gif' title='[ketawa]' onClick=\"tambah_emotics('[ketawa]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/amarah.gif' title='[marah]' onClick=\"tambah_emotics('[marah]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/amelet.gif' title='[melet]' onClick=\"tambah_emotics('[melet]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/anangis.gif' title='[nangis]' onClick=\"tambah_emotics('[nangis]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/asakit.gif' title='[sakit]' onClick=\"tambah_emotics('[sakit]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/bye.gif' title='[bye]' onClick=\"tambah_emotics('[bye]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/maki-maki.gif' title='[maki-maki]' onClick=\"tambah_emotics('[maki-maki]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/marah.gif' title='[cmarah]' onClick=\"tambah_emotics('[cmarah]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/murung.gif' title='[cmurung]' onClick=\"tambah_emotics('[cmurung]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/nangis.gif' title='[cnangis]' onClick=\"tambah_emotics('[cnangis]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/sedih.gif' title='[csedih]' onClick=\"tambah_emotics('[csedih]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/smile.gif' title='[csenyum]' onClick=\"tambah_emotics('[csenyum]')\">"+
			"<img width='19%' height='19%' src='web_itmedia/../emotics/bonus.png' title='[bonus]' onClick=\"tambah_emotics('[bonus]')\">";
		}
		
	});
	
	$("#kirim_chat_itmedia").on("submit", function() {

		$.ajax({
			url: $("#itmedia_chatting").modal('show'),
			data: $(".form").serialize(),
			type: "POST",
			success: function(berhasil) {
				$("#itmedia_chatting").modal('show');
			}
		});
	});
	

		
		
	
	function anggota_online() {
		$("#anggota_online").load("web_itmedia/../content/lainnya/status_aktif.php");
	}
	setInterval(anggota_online, 1000);
	
	
	
});



function tambah_emotics(emotics) {
	document.forms[0].pesan.value+=" "+emotics;
}