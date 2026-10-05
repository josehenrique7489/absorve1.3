<?php

session_start();

include_once("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
    $pegar = filter_input(INPUT_POST, 'pegar', FILTER_VALIDATE_INT);

    if ($quantidade === false || $quantidade === null ||
        $pegar === false || $pegar === null) {

        die("Informe os valores corretamente.");

    }

    // 1 - Atualiza a tabela geral1
    $sql = "UPDATE geral1
            SET quantidade = '$quantidade',
                pegar = '$pegar'
            LIMIT 1";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {

        die("Erro ao atualizar: " . mysqli_error($conexao));

    }

    // 2 - Salva no histórico
    $sql_historico = "INSERT INTO historico
        (data, andar, quantidade_total, quantidade_retirada)
        VALUES
        (NOW(), 'terreo', '$quantidade', '$pegar')";

    $resultado_historico = mysqli_query($conexao, $sql_historico);

    if (!$resultado_historico) {

        die("Erro ao salvar histórico: " . mysqli_error($conexao));

    }

    echo "<h2>✅ Atualizado com sucesso!</h2>";

    echo "<p>Quantidade total: $quantidade</p>";

    echo "<p>Quantidade retirada: $pegar</p>";

    echo "<a href='relatorio.php'>Ver histórico</a>";

} else {

    echo "Acesso inválido.";

}

?>