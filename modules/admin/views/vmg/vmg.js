$(document).on('click','.addvision',function(e){
	e.preventDefault();
	var content = $(this).parent().parent().clone();
	$(content).find('button').attr('class','remove btn btn-danger btn-sm').text('-');
	$(content).find('input').val('');
	$('.tbody1').append(content);
})

$(document).on('click','.addmission',function(e){
	e.preventDefault();
	var content = $(this).parent().parent().clone();
	$(content).find('button').attr('class','remove btn btn-danger btn-sm').text('-');
	$(content).find('input').val('');
	$('.tbody2').append(content);
})

$(document).on('click','.addgoal',function(e){
	e.preventDefault();
	var content = $(this).parent().parent().clone();
	$(content).find('button').attr('class','remove btn btn-danger btn-sm').text('-');
	$(content).find('input').val('');
	$('.tbody3').append(content);
})

$(document).on('click','.remove',function(){
	$(this).parent().parent().remove();
})