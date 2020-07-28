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

$('#anggota').change(function () {
	var anggota = $('#anggota').val();
	if (anggota == '1') {

		$('#valAnggota').html(`
		<div class="row border-secondary">
			<div class="col-2">
				<div class="form-group">
				<label for="">Status Anggota</label>
					<select name="anggota[]" id="" class="form-control" required>
						<option value="1">Dosen</option>
						<option value="2">Mahasiswa</option>
						<option value="3">Lainnya..</option>
					</select>
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
				<label for="">No Identitas Anggota</label>
					<input type="text" name="no_identitas[]" class="form-control" placeholder="NIK / NIM" required>
				</div>
			</div>
			<div class="col-3">
				<div class="form-group">
				<label for="">Nama Anggota</label>
					<input type="text" name="nama_anggota[]" class="form-control" placeholder="" required>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
				<label for="">Keterangan | <small><i>fakultas / prodi / dll.</i></small></label>
					<div class="row">
						<div class="col">
							<input type="text" name="keterangan[]" class="form-control" required>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success " onclick="addAnggota()">Tambah Anggota</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		`)
	} else {
		$('#valAnggota').html(``);
	};
});

var x = 1;

function addAnggota() {
	x++;
	$('#valAnggota').append('<div class="row border-secondary" id="parent' + x + '">' + `
		
			<div class="col-2">
				<div class="form-group">
				<label for="">Status Anggota </label>
					<select name="anggota[]" id="" class="form-control" required>
						<option value="1">Dosen</option>
						<option value="2">Mahasiswa</option>
						<option value="3">Lainnya..</option>
					</select>
				</div>
			</div>
			<div class="col-2">
				<div class="form-group">
				<label for="">No Identitas Anggota</label>
					<input type="text" name="no_identitas[]" class="form-control" placeholder="NIK / NIM" required>
				</div>
			</div>
			<div class="col-3">
				<div class="form-group">
				<label for="">Nama Anggota</label>
					<input type="text" name="nama_anggota[]" class="form-control" placeholder="" required>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
				<label for="">Keterangan | <small><i>fakultas / prodi / dll.</i></small></label>
					<div class="row">
						<div class="col">
							<input type="text" name="keterangan[]" class="form-control" required>
						</div>
						<div class="col">` + '<button type="button" class="btn btn-danger " onclick="hapusAnggota(' + x + ')">Hapus</button>' + `
						</div>
					</div>
				</div>
			</div>
		</div>
	`);
};

function hapusAnggota(id) {
	$('#parent' + id).remove();
};

var d = 1;
$('.addDana').click(function () {
	d++;
	$('#danaContainer').append(`
	<div class="row" id="parentDana` + d + `">
	<div class="col-4">
		<div class="form-group">
			<label for="">Sumber Dana</label>
			<input type="text" name="sumber_dana[]" class="form-control">
		</div>
	</div>
	<div class="col-8">
		<div class="form-group">
			<label for="">Jumlah ( Rp. )</label>
			<div class="row">
				<div class="col">
					<input type="number"  name="jumlah[]"  class="form-control">
				</div>
				<div class="col">
					` + '<button type="button" class="btn btn-danger" onclick="hapusDana(' + d + ')">Hapus</button>' + `
				</div>
			</div>
		</div>
	</div>
</div>
	`);
});

function hapusDana(id) {
	$('#parentDana' + id).remove();
}
