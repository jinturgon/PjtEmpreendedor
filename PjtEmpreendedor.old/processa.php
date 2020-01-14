<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
<?php
/*
cod_produto , categoria , img , nome , descricao , valor , QntDisponivel
*/
session_start();


// Instanciar a página do carrinho
$pagina = 'carrinho.php';
// Iniciar a classe
class shopping
{

    private $hostname = '127.0.0.1';
    private $login = 'root';
    private $senha = '';
    private $banco = 'dados_pizza';


    //Conexão com o Banco de Dados
    function conexao()
    {
        $con = mysqli_connect($this->hostname, $this->login, $this->senha, $this->banco) or die('Não foi possível conectar: ' . $con->connect_errno);
        if (!$con) {
            echo "<center><h2>Problemas com o Banco de Dados, por favor contate o Administrador</h2></center>";
            exit;
        } else { }

        mysqli_query($con, "SET CHARACTER SET 'utf8'");
    }

    private $Total;
    private $subTotal;
    // Mostrar o carrinho de compras
    function carrinho()
    {
        $con = mysqli_connect($this->hostname, $this->login, $this->senha, $this->banco) or die('Não foi possível conectar: ' . $con->connect_errno);
        // Verifica se já existe uma session
        if ($_SESSION) {
            // Seperar Nome de Quantidade ou Valores
            foreach ($_SESSION as $nome => $quantidade) {
                // Verificar se a Quantidade não está zerada
                if ($quantidade > 0 and $nome != 'ValorTotal') {
                    if (substr($nome, 0, 9) == 'produtos_') {
                        // Pegar ID da SESSION
                        $id = substr($nome, 9, (strlen($nome) - 9));
                        // Montar o Carrinho
                        $id = mysqli_real_escape_string($con, $id);
                        $PD = mysqli_query($con, "SELECT cod_produto, categoria, nome, valor FROM produtos WHERE cod_produto=" . $id);

                        while ($list = mysqli_fetch_assoc($PD)) {
                            $this->subTotal = $quantidade * number_format($list['valor'], 3);
                            echo '
                            <tr>
                                <td width="53%" height="44" bgcolor="#fff">' . $list['categoria'] . ' ' . $list['nome'] . '</td>
                                <th width="7%" height="44" valign="middle" bgcolor="#fff">' . $quantidade . ' </th>
                                <th width="11%" height="44" valign="middle" bgcolor="#fff">R$ ' . number_format($list['valor'], 2) . '
                                </th>
                                <td width="6%" height="44" valign="middle" bgcolor="#fff">
                                    <a href="processa.php?add=' . (int) $id . '">
                                        <img src="./include/adicionar-carrinho.png" width="44" height="44">
                                    </a>
                                </td>
                                <td width="6%" height="44" valign="middle" bgcolor="#fff">
                                    <a href="processa.php?menos=' . (int) $id . '">
                                        <img src="./include/diminuir-carrinho.png" width="44" height="44">
                                    </a>
                                </td>
                                <td width="6%" height="44" valign="middle" bgcolor="#fff">
                                    <a href="processa.php?del=' . (int) $id . '">
                                        <img src="./include/remover-carrinho.png" width="44" height="44">
                                    </a>
                                </td>
                                <th width="11%" heigth="44" valign="middle" bgcolor="#fff">R$ ' . number_format($this->subTotal, 2) . '</th>
                            </tr>';
                        }
                    }
                    $this->Total += $this->subTotal;
                }
            }
            $_SESSION['ValorTotal'] = number_format($this->Total, 2);
        }
        if ($this->Total == 0) {
            echo '
        <tr>
            <td colspan="7" valign="middle">Seu Carrinho está vazio</td>
        </tr>
        <tr>
            <td colspan="7" valign="middle" bgcolor="#008F7D">
                <a href="./testeexibirproduto2.php">
                    <img src="./include/continue-comprando.png" height="44" alt="">
                </a>
            </td>
        </tr>';
        } else {
            echo '
        <form action="pedidofinalizado.php" method="post">
            <tr>
                <td colspan="4"></td>
                <th colspan="2" valign="middle">Total</th>
                <th valign="middle" bgcolor="#fff" height="44">R$ ' . number_format($this->Total, 2) . '</th>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td valign="middle" bgcolor="#008F7D" height="44">
                    <a href="./vitrine.php">
                        <img src="./include/continue-comprando.png" height="44" alt="">
                    </a>
                </td>
                <td colspan="4" valign="middle">
                    <a href="versession.php" height="44" alt="">ver sessão</a>
                    <br>
                    <input type="submit" value="Finalizar Pedido" name="submit">
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <label>
                        Informações Adicionais:<br>
                        <textarea cols="40" rows="5" name="obsAD" id="obsAD" placeholder="aaa"></textarea>
                    </label>
                </td>
            </tr>
        </form>
        ';
/*
        foreach ($_SESSION as $nome => $quantidade) {
            // Verificar se a Quantidade não está zerada
            if ($quantidade > 0) {
                if (substr($nome, 0, 9) == 'produtos_') {
                    // Pegar ID da SESSION
                    $id = substr($nome, 9, (strlen($nome) - 9));
                    echo $id.'=>'.$quantidade;
                    echo "<br>";
                }
            }
        }
        echo '<pre>';
        var_dump($_SESSION);
        echo session_id();
        echo 'VALOR TOTAL ' . number_format($this->Total, 2);
        echo '</pre>'; 
*/
        }
    }

    function finalizar ()
    {
        $con = mysqli_connect($this->hostname, $this->login, $this->senha, $this->banco) or die('Não foi possível conectar: ' . $con->connect_errno);
        // Pegar o ID unico da sessão
        $id = session_id();
        // Pegar a data e o horário em que a compra foi feita
        $today = date("Y-m-d H:i:s");
        
        if (isset($_POST['obsAD'])) {
            $obsAD = $_POST['obsAD'];
        }
/*
      $sqlcont = "INSERT INTO `cadastro` (`cod_cadastro`,`nome`,`telefone`,`cep`,`endereco`,`numero`,`cidade`,`uf`,`obs`)VALUES('$id', '{$_SESSION['nome']}','{$_SESSION['telefone']}','{$_SESSION['cep']}','{$_SESSION['endereco']}', '{$_SESSION['numero']}','{$_SESSION['cidade']}','{$_SESSION['uf']}','{$_SESSION['obs']}');";
        
        $sqlcontt = "INSERT INTO `pedidos` (`cod_pedido`, `ped_datahora`, `ped_valortotal`, `ped_valorfrete`, `ped_status`, `ped_formapagto`, `ped_infoadic`) VALUES ('$id','$today','{$_SESSION['ValorTotal']}','0','0','{$_SESSION['pagamento']}','$obsAD');";
    
        mysqli_query($con, $sqlcont);
        mysqli_query($con, $sqlcontt);
    
        foreach ($_SESSION as $nome => $quantidade) {
            // Verificar se a Quantidade não está zerada
            if ($quantidade > 0) {
                if (substr($nome, 0, 9) == 'produtos_') {
                    // Pegar ID da SESSION
                    $idprod = substr($nome, 9, (strlen($nome) - 9));
                    $sqlitens = "INSERT INTO `itens_pedido`(`cod_itempedido`, `cod_pedido`, `quantidade`) VALUES ('$idprod','$id','$quantidade');";
                    mysqli_query($con, $sqlitens);
                }
            }
        } 
*/
        echo $_SESSION['ValorTotal'].'<br>';
        echo $obsAD."<br>";
        echo '<pre>';
        var_dump($_SESSION);
        echo $id;
        echo '</pre>';
    }




































    //FIM CLASS
}
// Verificação de Adição
if (isset($_GET['add'])) {
    $_SESSION['produtos_' . $_GET['add']] += '1';
    header("Location: " . $pagina);
    $Total -= $subTotal;
}
// Verificação de Subtração
if (isset($_GET['menos'])) {
    $_SESSION['produtos_' . $_GET['menos']]--;
    header("Location: " . $pagina);
    $Total -= $subTotal;
}
// Verificação para Zerar o Produto
if (isset($_GET['del'])) {
    $_SESSION['produtos_' . $_GET['del']] = 0;
    header("Location: " . $pagina);
    $Total -= $subTotal;
}
?>