$(document).ready(function(){
	$("#PessoaContatoIdPais").on('change', function(){
		var countryId = $(this).val();
		if(countryId == 33){
			$("#PessoaContatoIdEstado").parent().slideDown(400);
			$("#PessoaContatoIdEstado").change();
		} else{
			$("#PessoaContatoIdCidade").parent().slideUp(400, function(){
				$("#PessoaContatoIdEstado").parent().slideUp(400);
			})
		}
	});
	$("#PessoaContatoIdEstado").on('change', function(){
		var state = $(this).val();
		var base = $("#base").val();
		$("#PessoaContatoIdCidade").html('');
		$("#PessoaContatoIdCidade").parent().slideUp(400, function(){
			$.post(base+"/pessoas/getCities", {state : state}, function(response){
				$("#PessoaContatoIdCidade").html(response);
				$("#PessoaContatoIdCidade").parent().slideDown(400);
			});
		});
	});
	$('#PessoaContatoTelefone1').focusout(function(){
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
	$('#PessoaContatoTelefone2').focusout(function(){
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
	$('#PessoaContatoTelefone3').focusout(function(){
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
	$("#PessoaFisicaCpf").mask("999.999.999-99");
	$("#PessoaContatoCep").mask("99999-999");
	$("#PessoaFisicaDataNascimento").mask("99/99/9999");
	$("#PessoaContatoIdPais").val(33);
	$("#PessoaContatoIdPais").change();

	$("#buscaProcValor").keyup(function(){   		
		var letras = $(this).val();
		if(letras != "")
		{
			$("#div-result").html('');
			$("#div-result").slideDown(400, function(){

			});
		}
		if(letras == "")
		{
			$("#div-result").html('');
			$("#div-result").slideUp(400,function(){

			});
		}
	});

	$("#btnLimparProc").on('click',function(){   				
			$("#div-result").html('');
			$("#div-result").slideUp(400,function(){
				$("#buscaProcValor").val("") 
			});
	});


	$("#buscaValor").keyup(function(){   		
		var letras = $(this).val();
		var base = $("#base").val();
		if(letras != "")
		{
			//$("#wrapper-pessoas").html('');
			$.post(base+"/pessoas/searchPessoa", {string : letras}, function(response){
				$("#wrapper-pessoas").html(response);
			});
		}
		if(letras == "")
		{
			//$("#wrapper-pessoas").html('');
			$.post(base+"/pessoas/searchPessoa", {string : letras}, function(response){
				$("#wrapper-pessoas").html(response);		
			});
		}
	});
	$(".listaalfabeto").on('click','li',function(){   
		var letras = $(this).text();
		var base = $("#base").val();
		if(letras != "")
		{
			//$("#wrapper-pessoas").html('');
			$.post(base+"/pessoas/searchPessoaInicial", {string : letras}, function(response){

				$("#wrapper-pessoas").html(response);
			});
		}
		if(letras == "")
		{
			//$("#wrapper-pessoas").html('');
			$.post(base+"/pessoas/searchPessoaInicial", {string : letras}, function(response){
				$("#wrapper-pessoas").html(response);		
			});
		}
	});/*
	$(".itm").on('click',function(){   		
		var id = $(this).attr("id");
		var base = $("#base").val();
		$("#frame-big cards").html();
		 $.get(base+"/pessoas/editar/"+id);
    
		$.post(base+"/pessoas/editar/"+id, function(response){
			$("#frame-big cards").html(response);
		});
	
	});*/
	
});