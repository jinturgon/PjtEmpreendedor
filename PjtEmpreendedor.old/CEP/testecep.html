<!DOCTYPE html>
<html>
<head>
	<title>Consulta de CEP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		input[type='text']{
			color: red;
		}

		#mensagem{
			color: red;
		}
	</style>
</head>
<body>
	<div class='container'>
		<br>
		<fieldset>
			<legend><h1>Formulário - Consulta de CEP</h1></legend>
			
			<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>		    

				<div class="row">
			  		<div class="col-md-2">
					   	<div class="form-group">
					        <label>CEP</label>
			      			<input type="text" class="form-control pula" id="cep" maxlength="12" name="cep" placeholder="Informe o CEP">
					    </div>
			  		</div>
			  		<div class="col-md-8">
					   <div class="form-group">
					       <label>Rua, Logradouro, Travessa <span>*</span> <span id='mensagem'></span></label>
			      		   <input type="text" class="form-control pula" id="rua" name="rua" placeholder="Informe a Rua, Logradouro, Travessa" required>
					    </div>
			  		</div>
			  		<div class="col-md-2">
					   <div class="form-group">
					       <label>Número</label>
			      		   <input type="text" class="form-control pula" id="numero" name="numero" placeholder="Informe o Número">
					    </div>
			  		</div>
			  	</div>	

			  	<div class="row">
			  		<div class="col-md-3">
					    <div class="form-group">
					        <label>Bairro</label>
			      			<input type="text" class="form-control pula" id="bairro" name="bairro" placeholder="Informe o Bairro">
					    </div>
			  		</div>
			  		<div class="col-md-3">
					    <div class="form-group">
					       <label>Cidade</label>
			      			<input type="text" class="form-control pula" id="cidade" name="cidade" placeholder="Informe a Cidade">
					    </div>
			  		</div>
			  		<div class="col-md-1">
					   <div class="form-group">
					        <label>UF</label>
			      			<input type="text" class="form-control pula" id="uf" maxlength="2" name="uf" placeholder="UF">
					    </div>
			  		</div>
			  		<div class="col-md-5">
					   <div class="form-group">
					        <label>Complemento</label>
			      			<input type="text" class="form-control pula" id="complemento" name="complemento" placeholder="Informe o Complemento do Endereço">
					    </div>
			  		</div>
			  	</div>

			    <button type="submit" class="btn btn-primary" id='botao'> 
			      <i class="fa fa-floppy-o"></i> Gravar
			    </button>
			</form>
		</fieldset>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {

		// Método para pular campos teclando ENTER
	    $('.pula').on('keypress', function(e){
	        var tecla = (e.keyCode?e.keyCode:e.which);

	        if(tecla == 13){
	            campo = $('.pula');
	            indice = campo.index(this);

	            if(campo[indice+1] != null){
	                proximo = campo[indice + 1];
	                proximo.focus();
	                e.preventDefault(e);
	            }
	        }
	    });

	     // Inseri máscara no CEP
	    $("#cep").inputmask({
	        mask: ["99999-999",],
	        keepStatic: true
	    });

	     // Método para consultar o CEP
		$('#cep').on('blur', function(){

			if($.trim($("#cep").val()) != ""){

				$("#mensagem").html('(Aguarde, consultando CEP ...)');
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){

			  		if(resultadoCEP["resultado"]){
						$("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#uf").val(unescape(resultadoCEP["uf"]));
					}

					$("#mensagem").html('');
				});				
			}			
		});
	});	
	</script>
</body>
</html>