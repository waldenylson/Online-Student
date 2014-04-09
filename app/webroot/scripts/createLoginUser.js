// JavaScript Document
$(document).ready( function() {
	$("#createLoginUser").validate({
		// Define as regras
		rules:{
			login:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, 
				minlength: 5
			},
			senha:{				
				required: true				
			},
			confirmaSenha:{				
				required: true,
				verificarSenha: true				
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
			},
			confirmaSenha:{
				required: "Entre com a Senha Novamente!",
				verificarSenha: "Senhas não Conferem!"
			}				
		}
	});
});













