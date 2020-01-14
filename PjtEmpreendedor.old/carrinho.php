<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    require 'processa.php';
    $conecta = new shopping();
    $conecta->conexao();
    ?>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <title>Vitrine Projeto Empregador</title>
    <link rel="stylesheet" type="text/css" href="./include/style.css">
</head>

<body>
    <div id="conteudo-master">
        <div id="conteudo">
            <h1>Vitrine de Produtos - Carrinho de Compras </h1>
            <table cellspadding="4" cellspacing="4" border="0" width="100%">
                <?php
                $conecta->carrinho();
                ?>
            </table>
        </div>
    </div>
</body>

</html>