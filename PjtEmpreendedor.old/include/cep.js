		$(document).ready(function () {

			// Método para pular campos teclando ENTER
			$('.pula').on('keypress', function (e) {
				var tecla = (e.keyCode ? e.keyCode : e.which);

				if (tecla == 13) {
					campo = $('.pula');
					indice = campo.index(this);

					if (campo[indice + 1] != null) {
						proximo = campo[indice + 1];
						proximo.focus();
						e.preventDefault(e);
					}
				}
			});

			// Inseri máscara no CEP
			$("#cep").inputmask({
				mask: ["99999-999", ],
				keepStatic: true
			});

			// Método para consultar o CEP
			$('#cep').on('blur', function () {

				if ($.trim($("#cep").val()) != "") {

					$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" + $("#cep").val(), function () {

						if (resultadoCEP["resultado"]) {
							$("#endereco").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]) + ", " + unescape(resultadoCEP["bairro"]) + ", " + $("#cep").val());
							$("#cidade").val(unescape(resultadoCEP["cidade"]));
							$("#uf").val(unescape(resultadoCEP["uf"]));
						}
					});
				}
			});
		});