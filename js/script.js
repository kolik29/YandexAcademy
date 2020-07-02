$(() => {
	$('#js_file').change(function () {
		$(this).siblings('label').text($(this)[0].files[0].name)
	})

	$('#js_resizeImg').click(() => {
		var data = new FormData();
		data.append('file', $('#js_file')[0].files[0]);
		data.append('size', $('#js_percent').val());

		$.ajax({
			url: 'resize.php',
			method: 'POST',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: data,
			success: (data) => {
				console.log(data);
			}
		})
	});
})