// JavaScript Document
$(document).ready( function() {
	$("#login").validate({
		// Define as regras
		rules:{
			usuario:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, 
				minlength: 5
			},
			senha:{
				//E-Mail tem que ser um e-mail válido
				required: true				
			}			
		},
		// Define as mensagens de erro para cada regra
		messages:{
			usuario:{
				required: "Entre com o Usuário!",
				minlength: "Usuário deve conter, no mínimo, 5 caracteres!"
			},
			senha:{
				required: "Entre com a Senha!"				
			}
		}
	});
});













