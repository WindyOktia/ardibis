$('#repass').keyup(function () {
	var pass = $('#pass').val();
	var repass = $('#repass').val();
	if (pass != repass) {
		$('#resultPass').html('<small><span class="text-danger">Password Tidak Cocok</span></small>');
		$('#simpan').attr('disabled', true);
	} else {
		$('#resultPass').html('<small><span class="text-success">Password Cocok</span></small>');
		$('#simpan').attr('disabled', false);
	}
});

$('#repassEdit').keyup(function () {
	var pass = $('#passEdit').val();
	var repass = $('#repassEdit').val();
	if (pass != repass) {
		$('#resultPassEdit').html('<small><span class="text-danger">Password Tidak Cocok</span></small>');
		$('#simpanEdit').attr('disabled', true);
	} else {
		$('#resultPassEdit').html('<small><span class="text-success">Password Cocok</span></small>');
		$('#simpanEdit').attr('disabled', false);
	}
});
