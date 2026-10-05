
<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ABSORVE - Atualizar primeiro andar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe6f0, #f5e1ff);
            font-family: Arial, sans-serif;
        }

        .pagina {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .card-absorve {
            width: 100%;
            max-width: 600px;
            background: white;
            padding: 50px 35px;
            border-radius: 30px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(180, 90, 140, 0.20);
        }

        .icone {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .titulo {
            color: #d63384;
            font-size: 38px;
            font-weight: bold;
        }

        .subtitulo {
            color: #8d6680;
            font-size: 19px;
            margin-bottom: 30px;
        }

        .mensagem-sucesso {
            background: #fce4ef;
            color: #a52865;
            border: none;
            border-radius: 18px;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .mensagem-erro {
            background: #ffe1e1;
            color: #b02a37;
            border: none;
            border-radius: 18px;
            padding: 20px;
            font-size: 17px;
            font-weight: bold;
        }

        .botao {
            display: inline-block;
            margin-top: 25px;
            padding: 13px 30px;
            border-radius: 17px;
            background: linear-gradient(135deg, #d63384, #b84fc4);
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .botao:hover {
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 8px 20px rgba(180, 70, 130, 0.25);
        }

    </style>

</head>

<body>

    <div class="pagina">

        <div class="card-absorve">

            <div class="icone">
                🌸🩸🌸
            </div>

            <h1 class="titulo">
                ABSORVE
            </h1>

            <p class="subtitulo">
                Atualização do estoque - primeiro andar 💗
            </p>

            <hr class="mb-4">

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $quantidade = filter_input(
                    INPUT_POST,
                    'quantidade',
                    FILTER_VALIDATE_INT
                );

                $pegar = filter_input(
                    INPUT_POST,
                    'pegar',
                    FILTER_VALIDATE_INT
                );


                if (
                    $quantidade === false ||
                    $quantidade === null ||
                    $pegar === false ||
                    $pegar === null
                ) {

                    echo "
                    <div class='mensagem-erro'>
                        ❌ Informe a quantidade e a quantidade retirada.
                    </div>
                    ";

                } else {

                    $sql = "UPDATE terceiro_andar
                            SET quantidade = '$quantidade',
                                pegar = '$pegar'
                            LIMIT 1";

                    $resultado = mysqli_query($conexao, $sql);


                    if ($resultado) {
                        $sql = "INSERT INTO historico
                        (daata, andar, quantidade_total, quantidade_retirada)
                        VALUES
                        (NOW(), 'terceiro', '$quantidade', '$pegar')";

                    mysqli_query($conexao, $sql);
                        echo "
                        <div class='mensagem-sucesso'>
                            ✅ Dados atualizados com sucesso! 🌷
                        </div>

                        <p class='mt-3 text-secondary'>
                            O estoque do térreo foi atualizado.
                        </p>
                        ";

                    } else {

                        echo "
                        <div class='mensagem-erro'>
                            ❌ Erro ao atualizar:<br>
                            " . mysqli_error($conexao) . "
                        </div>
                        ";

                    }

                }

            } else {

                echo "
                <div class='mensagem-erro'>
                    ❌ Acesso inválido.<br>
                    Envie os dados pelo formulário.
                </div>
                ";

            }

            ?>

            <a href="./terceiro.html" class="botao">
                🔙 Voltar
            </a>

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

