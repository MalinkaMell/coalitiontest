(function ($) {
	$('#submitForm').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			url: `https://coaliyiontest.local/wp-json/contact-form-7/v1/contact-forms/78/feedback`,
			type: 'POST',
			data: {
				full_name: $('#full-name').val(),
				phone_number: $('#phone-number').val(),
				email: $('#email').val(),
				message: $('#message').val(),
			},
			success: function (response) {
				console.log(response);
				$('.success_msg').css('display', 'block');
			},
			error: function (data) {
				console.log(data);
				$('.error_msg').css('display', 'block');
			},
		});
	});
})(jQuery);