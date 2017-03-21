$(document).ready(function() {
	$('#formdaftar').submit(function(e) {
		daftar();
		e.preventDefault();
	});
});

function daftar() {
	visible('loading_daftar',1);
	gagal(0);
	sukses(0);		
	$.ajax({
		type: "POST",
		url: "proses_daftar_member.php",
		data: $('#formdaftar').serialize(),
		dataType: "json",
		success: function(pesan) {
			if(parseInt(pesan.status)==1) {
			   sukses(1,pesan.teks);
			   $("#nama_lengkap_daftar").val('');
			   $("#gender_daftar").val('- Pilih Gender -');
			   $("#alamat_daftar").val('');
			   $("#username_daftar").val('');
			   $("#password_daftar").val('');			
			}
			else if(parseInt(pesan.status)==0) {
				gagal(1,pesan.teks);
			}			
			visible('loading_daftar',0);			
	 	}
	});
}

function visible(seleksi,status) {
	if(status) $('#'+seleksi).css('visibility','visible');
	else $('#'+seleksi).css('visibility','hidden');
}

function gagal(status,teks) {
	visible('keterangan',status);
	if(teks) $('#keterangan').html(teks);
	$('#keterangan').removeClass('sukses').addClass('gagal');
}

function sukses(status,teks) {
	visible('keterangan',status);
	if(teks) $('#keterangan').html(teks);
	$('#keterangan').removeClass('gagal').addClass('sukses');
}