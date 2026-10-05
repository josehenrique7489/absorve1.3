<?php

session_start();
include_once("../conexao.php");

// ===============================
// SOMA DOS 4 ANDARES
// ===============================

$sql = "
    SELECT
        COALESCE((SELECT SUM(quantidade) FROM terreo), 0) AS terreo,
        COALESCE((SELECT SUM(quantidade) FROM primeiro_andar), 0) AS primeiro,
        COALESCE((SELECT SUM(quantidade) FROM segundo_andar), 0) AS segundo,
        COALESCE((SELECT SUM(quantidade) FROM terceiro_andar), 0) AS terceiro
";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$dados = mysqli_fetch_assoc($resultado);
 
// Quantidade de cada andar
$terreo = $dados['terreo'];
$primeiro = $dados['primeiro'];
$segundo = $dados['segundo'];
$terceiro = $dados['terceiro'];

// Soma geral
$total = $terreo + $primeiro + $segundo + $terceiro;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ABSORVE - Soma Geral</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            min-height: 100vh;
            margin: 0;

            background: linear-gradient(
                135deg,
                #ffe6f0,
                #f5e1ff
            );

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
            max-width: 750px;

            background: white;

            padding: 45px 35px;

            border-radius: 30px;

            box-shadow:
                0 15px 40px
                rgba(180, 90, 140, 0.20);
        }

        .icone {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .titulo {
            color: #d63384;

            font-size: 40px;

            font-weight: bold;

            margin-bottom: 5px;
        }

        .subtitulo {
            color: #8d6680;

            font-size: 20px;

            margin-bottom: 30px;
        }

        .andar {
            border-radius: 20px;

            padding: 20px;

            margin-bottom: 15px;

            color: white;

            box-shadow:
                0 7px 18px
                rgba(100, 70, 100, 0.15);
        }

        .nome-andar {
            font-size: 18px;

            font-weight: bold;
        }

        .quantidade {
            font-size: 35px;

            font-weight: bold;
        }

        .terreo {
            background: linear-gradient(
                135deg,
                #8e7dff,
                #6f9bf7
            );
        }

        .primeiro {
            background: linear-gradient(
                135deg,
                #d63384,
                #b84fc4
            );
        }

        .segundo {
            background: linear-gradient(
                135deg,
                #ec6f9e,
                #d85c91
            );
        }

        .terceiro {
            background: linear-gradient(
                135deg,
                #c84ccf,
                #e66f9e
            );
        }

        .total {
            margin-top: 25px;

            padding: 30px;

            border-radius: 25px;

            background: linear-gradient(
                135deg,
                #d63384,
                #b84fc4
            );

            color: white;

            box-shadow:
                0 10px 25px
                rgba(180, 70, 130, 0.25);
        }

        .total-texto {
            font-size: 20px;

            font-weight: bold;
        }

        .total-numero {
            font-size: 55px;

            font-weight: bold;
        }

        .voltar {
            display: inline-block;

            margin-top: 25px;

            padding: 10px;

            border-radius: 50%;

            transition: 0.3s;
        }

        .voltar:hover {
            transform: scale(1.1);

            background-color: #ffe6f0;
        }

    </style>

</head>

<body>

<div class="pagina">

    <div class="card-absorve text-center">

        <!-- Cabeçalho -->

        <div class="icone">
            🌸 🩸 🌸
        </div>

        <h1 class="titulo">
            ABSORVE
        </h1>

        <p class="subtitulo">
            Quantidade de absorventes por andar 💗
        </p>

        <hr>

        <!-- TÉRREO -->

        <div class="andar terreo">

            <div class="nome-andar">
                🌷 TÉRREO
            </div>

            <div class="quantidade">
                <?php echo $terreo; ?>
            </div>

            <div>
                absorventes
            </div>

        </div>


        <!-- PRIMEIRO ANDAR -->

        <div class="andar primeiro">

            <div class="nome-andar">
                🌷 1º ANDAR
            </div>

            <div class="quantidade">
                <?php echo $primeiro; ?>
            </div>

            <div>
                absorventes
            </div>

        </div>


        <!-- SEGUNDO ANDAR -->

        <div class="andar segundo">

            <div class="nome-andar">
                🌷 2º ANDAR
            </div>

            <div class="quantidade">
                <?php echo $segundo; ?>
            </div>

            <div>
                absorventes
            </div>

        </div>


        <!-- TERCEIRO ANDAR -->

        <div class="andar terceiro">

            <div class="nome-andar">
                🌷 3º ANDAR
            </div>

            <div class="quantidade">
                <?php echo $terceiro; ?>
            </div>

            <div>
                absorventes
            </div>

        </div>


        <!-- TOTAL -->

        <div class="total">

            <div class="total-texto">
                🩸 TOTAL GERAL
            </div>

            <div class="total-numero">
                <?php echo $total; ?>
            </div>

            <div>
                absorventes disponíveis nos 4 andares
            </div>

        </div>


        <!-- VOLTAR -->

        <div>

            <a href="./adm.html" class="voltar">

                <img
                    src="../img/voltar.png"
                    alt="Voltar"
                    width="50"
                    height="50">

            </a>

        </div>

        <p class="text-secondary mt-3">
            🌷 Cuidado e acolhimento para todas
        </p>

    </div>

</div>

</body>

</html>