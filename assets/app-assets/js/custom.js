$(document).ready(function () {
	$('#example').DataTable();

	$("#example_length").css("padding-top", "14px");
	// $("#example_filter input").css("width", "500px");
	var now = new Date();

	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);

	var today = now.getFullYear() + "-" + (month) + "-" + (day);

	$('.defaultDate').val(today);
	// $(".defaultDate").val('10/10/2020');


});
