<?php
    require 'processa.php';
    $conecta = new shopping();
    $conecta->conexao();

    $conecta->finalizar();
?>