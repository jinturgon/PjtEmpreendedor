<?php
session_start(); 
session_regenerate_id(); 
    echo '<br><br>
          Ao entrar nesta página, a sessão será destruida!
          <br><br>';
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';

    $id = session_id();
    $today = date("Y-m-d H:i:s");

    if (isset($_POST['obsAD'])) {
        $obsAD = $_POST['obsAD'];
    }else{
        $obsAD = null;
    }

    echo "INSERT INTO `cadastro` (`cod_cadastro`,`nome`,`telefone`,`cep`,`endereco`,`numero`,`cidade`,`uf`,`obs`)VALUES('$id', '{$_SESSION['nome']}','{$_SESSION['telefone']}','{$_SESSION['cep']}','{$_SESSION['endereco']}', '{$_SESSION['numero']}','{$_SESSION['cidade']}','{$_SESSION['uf']}','{$_SESSION['obs']}');";
    echo "<br>";
    if (isset($_SESSION['ValorTotal'])){
        echo "INSERT INTO `pedidos` (`cod_pedido`, `ped_datahora`, `ped_valortotal`, `ped_valorfrete`, `ped_status`, `ped_formapagto`, `ped_infoadic`) VALUES ('$id','$today','{$_SESSION['ValorTotal']}','0','0','{$_SESSION['pagamento']}','$obsAD');";
        echo "<br>";
    }
    

    foreach ($_SESSION as $nome => $quantidade) {
        // Verificar se a Quantidade não está zerada
        if ($quantidade > 0) {
            if (substr($nome, 0, 9) == 'produtos_') {
                // Pegar ID da SESSION
                $idprod = substr($nome, 9, (strlen($nome) - 9));
                echo "INSERT INTO `itens_pedido`(`cod_itempedido`, `cod_pedido`, `quantidade`) VALUES ('$idprod','$id','$quantidade');"."<br>";
            }
        }
    }
    
?>