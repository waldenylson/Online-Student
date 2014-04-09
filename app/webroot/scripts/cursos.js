// JavaScript Document
$(document).ready( function() {
	$("#novoCurso").validate({
		// Define as regras
		rules:{
			nome:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, 
				minlength: 5,
				maxlength: 32
			},
			descricao:{
				//E-Mail tem que ser um e-mail válido
				required: true,
				minlength: 10
			},
			periodos:{
				required: true
			}
							
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nome:{
				required: "Entre com o nome!",
				minlength: "Nome deve conter, no mínimo, 5 caracteres!",
				maxlength: "Nome deve conter no máximo 32 caracteres!"
			},
			descricao:{
				required: "Entre com a Descrição!",
				minlength: "Descrição deve conter, no mínimo, 10 caracteres!"
			},
			periodos:{
				required: "Entre com a Quantidade de Períodos!"
			}
		}
	});
});
