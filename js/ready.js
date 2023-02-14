$(document).ready(function(){

	$('.password').on('click','.password__show',function(){
		$(this).toggleClass('password__show--active');
		const password = $(this).prev('input');
		if (password.attr('type')==='password')
			password.attr('type','text');
		else
			password.attr('type','password');
		return false;
	});
	
	$(document).on('submit','.form--ajax',function(){
		const forma   = $(this);
		const error   = forma.find('.form__errors');
		const success = forma.find('.form__success');

		success.html('').hide();
		error.html('').hide();
		
		let errors = [];
		forma.find('input[data-empty]').each(function()
		{
			const input = $(this);
			const type  = this.type;
			const empty = input.data('empty');
			let   value = input.val();

			if (type==='checkbox')
				value = input.prop('checked');

			if (empty && !value) {
				if (errors.length==0) {
					input.focus();
				}
				errors.push(empty);
			}
		});

		if (errors.length) {
			error.html(errors.join('<br>')).show();
			return false;
		}

		data = new FormData(forma[0]);
		$.ajax({
			url: forma.attr('action'),
			type: 'POST',
			contentType: false,
			processData: false,
			data: data,
			dataType: 'json',
			success: function(res,status)
			{
				if (res.errors.length) {
					error.html(res.errors.join('<br>')).show();
				}
				else {
					success.html(res.success).show();
					forma.find('.form__body').slideToggle(1000);
					forma.trigger('reset');
				}
			},
			error: function(xhr,status,err)
			{
				error.html(status+': '+err).show();
			}
		});

		return false;
	});

});