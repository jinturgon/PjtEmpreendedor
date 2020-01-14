<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
        session_start();
        include("./include/conexao.php");
        @$categoria = $_POST['categoria'];
        if(!isset($categoria) || $categoria == ""){
            $selectfilter = 'WHERE QntDisponivel > 1';
        }else{
            $selectfilter = "WHERE QntDisponivel > 1 AND categoria = '".$categoria."'";
            $msg = $categoria;
        }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Vitrine Projeto Empregador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./include/style.css">
</head>

<body>
    <div id="conteudo-master">
        <div id="conteudo">
            <h1>Vitrine de Produtos</h1>
            <div class="menu">
                <form name="formCombo" action="" method="post" enctype="multipart/form-data">
                    <select name="categoria">
                        <option value="" selected="selected">Selecione uma Categoria</option>
                        <?php
                            $cat = mysqli_query($con, "SELECT * FROM produtos GROUP BY categoria");
                            if (mysqli_num_rows($cat) > 0){
                                while($catrow = mysqli_fetch_assoc($cat)){
                                    echo "<option value='".$catrow['categoria']."'>".$catrow['categoria']."</option>";
                                }
                            }
                            ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    <input type="submit" name="botao" value="Filtar">
                </form>

                <?php
                if (isset($msg)):
                ?>

                <div class="tag">
                    <?= $msg; ?>
                </div>

                <?php endif;?>

                <table border='2' cellpadding="8" cellspacing="10" width="100%">
                    <tr>
                        <?php
                    $result = mysqli_query($con, "SELECT * FROM produtos $selectfilter");
                    $id = 1;
                    $LoopH = 3;
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($id < $LoopH){
                                echo "
                                <td valign='top'>
                                <img src='".$row["img"]."'alt='aa'><br>
                                ".$row['categoria']." ".$row['nome']."<br>
                                R$ ".number_format($row['valor'],2, ',', '.')."<br>
                                <a href='processa.php?add=".$row['cod_produto']."'>
                                <img src='./include/adicionar-carrinho.png' width='44' height='44' alt='Adicionar ao Carrinho'></a>
                                </td>
                                ";
                            }elseif($id = $LoopH){
                                echo "
                                <td valign='top'>
                                <img src='".$row["img"]."'alt='aa'><br>
                                ".$row['categoria']." ".$row['nome']."<br>
                                R$ ".number_format($row['valor'],2, ',', '.')."<br>
                                <a href='processa.php?add=".$row['cod_produto']."'>
                                <img src='./include/adicionar-carrinho.png' width='44' height='44' alt='Adicionar ao Carrinho'></a>
                                </td>
                                </tr>
                                <tr>
                                ";
                                $id = 0;
                            }
                        $id++;    
                        }
                    }
                    $con->close();
                    ?>
                    </tr>
                </table>
            </div>
        </div>
        <?php
            if(empty($_POST['nome'])){

            }else{
            $_SESSION['nome']=$_POST['nome'];
            $_SESSION['telefone']=$_POST['telefone'];
            $_SESSION['cep']=$_POST['cep'];
            $_SESSION['endereco']=$_POST['endereco'];
            $_SESSION['numero']=$_POST['numero'];
            $_SESSION['cidade']=$_POST['cidade'];
            $_SESSION['uf']=$_POST['uf'];
            $_SESSION['obs']=$_POST['obs'];
            $_SESSION['pagamento']=$_POST['pagto'];
            
            $_SESSION['cep'] = str_replace("-","",$_SESSION['cep']);
            }
        ?>
</body>

</html>