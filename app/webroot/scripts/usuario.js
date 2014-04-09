// JavaScript Document
$(document).ready( function() {
	$("#novoUsuario").validate({
		// Define as regras
		rules:{
			nome:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, 
				minlength: 10
			},
			email:{
				//E-Mail tem que ser um e-mail válido
				required: false,
				email: true
			},
			data_nascimento:{
				required: true,
				dateBR: true
			},
			sexo:{
				required: true
			},
			naturalidade:{
				required: true,
				minlength: 2
			},
			nacionalidade:{
				required: true,
				minlength: 2
			},
			endereco:{
				required: true,
				minlength: 10
			},
			bairro:{
				required: true,
				minlength: 5
			},
			cidade:{
				required: true,
				minlength: 5
			},
			cep:{
				required: true
			},
			cpf:{
				required: true,
				verificaCPF: true
			},
			identidade:{
				required: true
			},
			emissor:{
				required: true
			}			
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nome:{
				required: "Entre com o nome!",
				minlength: "Nome deve conter, no mínimo, 10 caracteres!"
			},
			email:{
				email: "Digite um e-mail válido!"
			},
			data_nascimento:{
				required: "Entre com a data de nascimento!",
				dateBR: "Entre com uma data Válida!"				
			},
			sexo:{
				required: "Selecione o Sexo!"
			},
			naturalidade:{
				required: "Entre com a naturalidade!",
				minlength: "Naturalidade deve conter, no mínimo, 2 caracteres!"
			},
			nacionalidade:{
				required: "Entre com a nacionalidade!",
				minlength: "Nacionalidade deve conter, no mínimo, 2 caracteres!"
			},
			endereco:{
				required: "Entre com o Endereço!",
				minlength: "Endereço deve conter, no mínimo, 10 caracteres!"
			},
			bairro:{
				required: "Entre com o Bairro!",
				minlength: "Bairro deve conter, no mínimo, 5 caracteres!"
			},
			cidade:{
				required: "Entre com a Cidade!",
				minlength: "Cidade deve conter, no mínimo, 5 caracteres!"
			},			
			cep:{
				required: "Entre com o CEP!"
			},
			cpf:{
				required: "Entre com o CPF!",
				verificaCPF: "CPF inválido!"
			},
			identidade:{
				required: "Entre com a Identidade!"
			},
			emissor:{
				required: "Entre com o Órgão Emissor!"
			}
		}
	});
});

jQuery(function($){
	$("#data_nascimento").mask("99/99/9999");
	$("#cpf").mask("999.999.999-99");
	$("#cep").mask("99.999-999");
	$("#tel_residencial").mask("(99)9999-9999");
	$("#tel_celular").mask("(99)9999-9999");
	$("#tel_comercial").mask("(99)9999-9999");
	
});












