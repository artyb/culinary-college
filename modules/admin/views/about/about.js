$(document).on('click','.add',function(e){
	e.preventDefault();
	var content = $(this).parent().parent().clone();
	$(content).find('button').attr('class','btn btn-danger btn-sm remove').text('-');
	$(content).find('.form-control').val('');
	$('tbody').append(content);
})

$(document).on('click','.remove',function(e){
	e.preventDefault();
	var content = $(this).parent().parent().remove();
})