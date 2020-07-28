$(document).ready(function () {

	var max_fields = 50; //maximum input boxes allowed
	var wrapper = $(".input_fields_wrap"); //Fields wrapper
	var addMore = $(".moreFile"); //Add button ID

	var x = 1; //initlal text box count

	$(addMore).click(function (e) { //on add input button click
		e.preventDefault();
		if (x < max_fields) { //max input box allowed
			x++; //text box increment
			$(wrapper).append(`
			<div class="row mb-2">
				<div class="col-5">
					<input type="text" name="judul[]" class="form-control-file">
				</div>
                <div class="col-3">
                    <input type="file" name="arsip[]" class="form-control-file">
                </div>
                <button type="button" class="btn btn-sm btn-danger remove_field col-2">Hapus</button>
            </div>`); //add input box
		}
	});

	$(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
		e.preventDefault();
		$(this).parent('div').remove();
		x--;
	});





});
