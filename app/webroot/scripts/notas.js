// JavaScript Document
$(document).ready( function() {
	$("#notas").validate({
		// Define as regras
		rules:{
			cadeira_id:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true				
			},
			nota:{
				//E-Mail tem que ser um e-mail válido
				required: true,
				verificaNota: true
			}			
		},
		// Define as mensagens de erro para cada regra
		messages:{
			cadeira_id:{
				required: "Selecione uma Cadeira!"				
			},
			nota:{
				required: "Entre com a Nota!",
				verificaNota: "Nota Inválida!"
			}
		}
	});
});

jQuery(function($){
	$("#nota").mask("99.99");	
});














