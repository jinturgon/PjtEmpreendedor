<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>TesteExibirProduto</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            function aumentaValor(preco, val, quant) {
                var valor = parseInt(document.getElementById(quant).innerHTML);
                valor = isNaN(valor) ? 0 : valor;
                valor++;
                document.getElementById(quant).innerHTML = valor;
                var precoUnid = document.getElementById(val).innerHTML;
                var precoTotal = parseFloat(precoUnid) * valor;
                document.getElementById(preco).innerHTML = precoTotal;
            }

            function diminuiValor(preco, val, quant) {
                var valor = parseInt(document.getElementById(quant).innerHTML);
                valor = isNaN(valor) ? 0 : valor;
                valor < 1 ? valor = 1 : '';
                valor--;
                document.getElementById(quant).innerHTML = valor;
                var precoUnid = document.getElementById(val).innerHTML;
                var precoTotal = parseFloat(precoUnid) * valor;
                document.getElementById(preco).innerHTML = precoTotal;
            }
            var cls = document.getElementById("res").getElementsByTagName("td");
            var sum = 0;
            for (var i = 0; i < cls.length; i++) {
                if (cls[i].className == "countable") {
                    sum += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
                }
            }
            document.getElementById("result").innerHTML = ""+ sum + ""; 
        </script>
    </head>
    <body>
        <table border='2' id='res'>
        <tr>
            <th>Cod_produto:</th>
            <th>Categoria:</th>
            <th>Imagem:</th>
            <th>Nome:</th>
            <th>Descrição</th>
            <!--<th>Valor Unid.</th>-->
            <th>Quantidade Disponivel:</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
        </tr>

        <?php
        include("./include/conexao.php");
        $result = mysqli_query($con, "SELECT * FROM produtos WHERE QntDisponivel>1");
        $id = 1;
        $datas = array();
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $datas[] = $row;
            }
        }
        foreach ($datas as $data){
            echo "<tr>";
                echo "<td id='cod".$id."'>".$data['cod_produto']."</td>";
                echo "<td>".$data['categoria']."</td>";
                echo "<td><img src='".$data["img"]."'alt='aa'></td>";
                echo "<td>".$data['nome']."</td>";
                echo "<td>".$data['descricao']."</td>";
                echo "<td id='val".$id."'style='display:none;'>".$data['valor']."</td>";
                echo "<td>".$data['QntDisponivel']."</td>";
                echo "<td>";
                    echo "<button onclick=aumentaValor('preco".$id."','val".$id."','quant".$id."')>+</button>";
                    echo "<p id='quant".$id."' name='quantity'>0</p>";
                    echo "<button onclick=diminuiValor('preco".$id."','val".$id."','quant".$id."')>-</button>";
                echo "</td>";
                echo "<td id='preco".$id."' class='countable'>0</td>";
            echo "</tr>";
            $id++;
        }
        $con->close();
        ?>           
    </table>

    </body>
</html>