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
