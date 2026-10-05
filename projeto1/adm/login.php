<?php

session_start();

include_once("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM adm 
            WHERE nome = '$nome' 
            AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    if (mysqli_num_rows($resultado) == 1) {

        $administrador = mysqli_fetch_assoc($resultado);

        $_SESSION['administrador'] = $administrador['nome'];
        $_SESSION['id_admin'] = $administrador['id_admin'];

        header("Location: ../index.html");
        exit();

    } else {

        ?>

        <!DOCTYPE html>

        <html lang="pt-BR">

        <head>

            <meta charset="UTF-8">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Erro de Login</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        </head>

        <body class="bg-light">

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="card shadow-lg border-0 rounded-4 text-center"
                 style="max-width: 450px; width: 100%;">

                <div class="card-body p-5">

                    <div class="display-3 mb-3">
                        ❌
                    </div>

                    <h2 class="fw-bold text-danger mb-3">
                        Usuário ou senha incorretos!
                    </h2>

                    <p class="text-muted mb-4">
                        Verifique seus dados e tente novamente.
                    </p>

                    <a href="adm.html"
                       class="btn btn-primary btn-lg rounded-3 px-4">
                        ← Tentar novamente
                    </a>

                </div>

            </div>

        </div>

        </body>

        </html>

        <?php
    }

} else {

    echo "Acesso inválido. Faça o login pelo formulário.";

}

?>