$(document).ready(function(){
	$("#PessoasIdPais").on('change', function(){
		var countryId = $(this).val();
		if(countryId == 33){
			$("#PessoasIdEstado").parent().slideDown(400);
			$("#PessoasIdEstado").change();
		} else{
			$("#PessoasIdCidade").parent().slideUp(400, function(){
				$("#PessoasIdEstado").parent().slideUp(400);
			})
		}
	});
	$("#PessoasIdEstado").on('change', function(){
		var state = $(this).val();
		var base = $("#base").val();
		$("#PessoasIdCidade").html('');
		$("#PessoasIdCidade").parent().slideUp(400, function(){
			$.post(base+"/pessoas/getCities", {state : state}, function(response){
				$("#PessoasIdCidade").html(response);
				$("#PessoasIdCidade").parent().slideDown(400);
			});
		});
	});
    $('#PessoasTelefone1').focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask('(99) 99999-999?9');
        } else {
            element.mask('(99) 9999-9999?9');
        }
    }).trigger('focusout');
	$('#PessoasTelefone2').focusout(function(){
	        var phone, element;
	        element = $(this);
	        element.unmask();
	        phone = element.val().replace(/\D/g, '');
	        if(phone.length > 10) {
	            element.mask('(99) 99999-999?9');
	        } else {
	            element.mask('(99) 9999-9999?9');
	        }
	    }).trigger('focusout');
	$('#PessoasTelefone3').focusout(function(){
	        var phone, element;
	        element = $(this);
	        element.unmask();
	        phone = element.val().replace(/\D/g, '');
	        if(phone.length > 10) {
	            element.mask('(99) 99999-999?9');
	        } else {
	            element.mask('(99) 9999-9999?9');
	        }
	    }).trigger('focusout');
	$("#PessoasCpf").mask("999.999.999-99");
   	$("#PessoasCep").mask("99999-999");
   	$("#PessoasDtNascimento").mask("99/99/9999");
   	$("#ssn").mask("999-99-9999");

   	$("#PessoasIdPais").val(33);
   	$("#PessoasIdPais").change();
});