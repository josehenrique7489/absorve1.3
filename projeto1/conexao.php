<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "projeto1";

$conexao = mysqli_connect(
    $servidor,
    $usuario,
    $senha,
    $banco
);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
date_default_timezone_set('America/Sao_Paulo');
?>