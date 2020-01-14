<?php
    include("./conexao.php");
    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $cep=$_POST['cep'];
    $endereco=$_POST['endereco'];
    $numero=$_POST['numero'];
    $cidade=$_POST['cidade'];
    $uf=$_POST['uf'];
    $obs=$_POST['obs'];
    $pagamento=$_POST['pagto'];
    $cep = str_replace("-","",$cep);

    $id = session_id();
    echo $id;
    $sql = "INSERT INTO cadastro (cod_cadastro,nome,telefone,cep,endereco,numero,cidade,uf,obs,pagamento) 
    VALUES
    ('$id', '$nome','$telefone','$cep','$endereco','$numero','$cidade','$uf','$obs','$pagamento')";

    if($query_result = mysqli_query($con,$sql))
{
	echo  nl2br ("Formulário de Contato enviado! \n Nós entraremos em contato em breve.");
}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
$con->close();
?>