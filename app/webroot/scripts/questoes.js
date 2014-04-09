// JavaScript Document
$(document).ready( function() {
	$("#novaQuestao").validate({
		// Define as regras
		rules:{
			enunciado:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, 
				minlength: 10
			},
			resposta1:{
				required: true			
			},
			resposta2:{
				required: true			
			},
			resposta3:{
				required: true			
			},
			resposta4:{
				required: true			
			},
			correta:{
				required: true			
			},
			pontuacao:{
				required: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			enunciado:{
				required: "Entre com o Enunciado da Questão!",
				minlength: "Nome deve conter, no mínimo, 10 caracteres!"
			},
			resposta1:{
				required: "Entre com Texto p/ alternatica A!"
			},
			resposta2:{
				required: "Entre com Texto p/ alternatica B!"
			},
			resposta3:{
				required: "Entre com Texto p/ alternatica C!"
			},
			resposta4:{
				required: "Entre com Texto p/ alternatica D!"
			},
			correta:{
				required: "Selecione a Alternatica Correta!"
			},
			pontuacao:{
				required: "Entre com a pontuação da Questão!"
			}
		}
	});	
});

jQuery(function($){
	$("#pontuacao").mask("99.99");	
});