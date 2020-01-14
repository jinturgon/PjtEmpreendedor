<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Form Projeto Empregador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="./include/cep.js"></script>
    <link rel="stylesheet" type="text/css" href="./include/style.css">
</head>

<body class="form">
    <form action="vitrine.php" method="POST">
        <div class="contato-content">
            <div id="contato-info">
                <fieldset>

                    <legend>
                        <h3>Formul&aacute;rio</h3>
                    </legend>
                    <br>
                    <label>
                        Nome:<font color="#FF0000">*</font>
                        <input type="text" name="nome" required oninvalid="alert('Digite seu nome no campo acima');">
                    </label>
                    <br>
                    <br>
                    <label>
                        Telefone:<font color="#FF0000">*</font>
                        <input type="text" name="telefone" required
                            oninvalid="alert('Digite o seu Telefone no campo acima');">
                    </label>
                    <br>
                    <br>
                    <label>
                        CEP:
                        <input type="text" name="cep" id="cep" maxlength="9" size="6">
                    </label>
                    <br>
                    <br>
                    <label>
                        Endereço:<font color="#FF0000">*</font>
                        <input type="text" name="endereco" id="endereco" required>
                    </label>
                    <br>
                    <br>
                    <label>
                        Número:<font color="#FF0000">*</font>
                        <input type="text" name="numero" id="numero" required>
                    </label>
                    <br>
                    <br>
                    <label>
                        Cidade:<font color="#FF0000">*</font>
                        <input type="text" name="cidade" id="cidade" required>
                    </label>
                    <br>
                    <br>
                    <label>
                        UF:<font color="#FF0000">*</font>
                        <input type="text" name="uf" id="uf" required>
                    </label>
                    <br>
                    <br>
                    <label>
                        Observações:<br>
                        <textarea cols="40" rows="5" name="obs" id="obs"></textarea>
                    </label>
                    <fieldset>
                        <legend>Forma de Pagamento</legend>
                        <br>
                        <br>
                        <label>
                            Cartão:
                            <input type="radio" name="pagto" value="cartao">
                            <br>
                            Dinheiro Fechado:
                            <input type="radio" name="pagto" value="dinheirosemtroco">
                            <br>
                            Dinheiro com Troco:
                            <input type="radio" name="pagto" value="dinheirocomtroco">
                        </label>
                    </fieldset>

                    <input type="submit" name="Submit" value="Submit!" />
                    <br>
                    <a href="versession.php">Ver Sessão</a>

                </fieldset>
            </div>
        </div>
    </form>
</body>

</html>