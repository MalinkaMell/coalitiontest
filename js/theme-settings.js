(function ($) {
	let custom_uploader;
		$('#upload_image_button').on('click', function (e) {
			e.preventDefault();
			if (custom_uploader) {
				custom_uploader.open();
				return;
			}
			custom_uploader = wp.media.frames.file_frame = wp.media({
				title: 'Choose Image',
				button: {
					text: 'Choose Image',
				},
				multiple: false,
			});
			custom_uploader.on('select', function () {
				$('#upload_image').val('');
				attachment = custom_uploader.state().get('selection').first().toJSON();
				$('#upload_image').val(attachment.url);
				$('#company_logo').attr('src', attachment.url);
			});
			custom_uploader.open();
		});

})(jQuery);
