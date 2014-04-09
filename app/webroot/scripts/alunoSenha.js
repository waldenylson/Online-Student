// JavaScript Document
$(document).ready( function() {
	$("#updatePassword").validate({
		// Define as regras
		rules:{			
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













