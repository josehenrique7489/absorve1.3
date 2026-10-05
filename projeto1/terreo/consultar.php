
<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>ABSORVE - geral</title>

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
            max-width: 700px;
            background: white;
            padding: 45px;
            border-radius: 30px;
            box-shadow: 0 15px 40px rgba(180, 90, 140, 0.20);
        }

        .logo {
            color: #d63384;
            font-size: 38px;
            font-weight: bold;
        }

        .subtitulo {
            color: #8d6680;
            margin-bottom: 30px;
        }

        .informacao {
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            color: white;
            box-shadow: 0 7px 18px rgba(100, 70, 100, 0.15);
        }

        .disponivel {
            background: linear-gradient(135deg, #d63384, #c14bbd);
        }

        .retirada {
            background: linear-gradient(135deg, #9b7cff, #e06bb3);
        }

        .numero {
            font-size: 40px;
            font-weight: bold;
            display: block;
        }

        .texto {
            font-size: 18px;
        }

        .voltar {
            display: inline-block;
            margin-top: 15px;
            padding: 10px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .voltar:hover {
            transform: scale(1.1);
            background-color: #ffe6f0;
        }

        @media (max-width: 600px) {

            .card-absorve {
                padding: 30px 20px;
            }

            .logo {
                font-size: 30px;
            }

            .numero {
                font-size: 32px;
            }

        }

    </style>

</head>

<body>

    <div class="pagina">

        <div class="card-absorve text-center">

            <div class="mb-3">
                🌸 🩸 🌸
            </div>

            <h1 class="logo">
                🩸 ABSORVE
            </h1>

            <h2 class="subtitulo">
                Quantidade de absorventes - primeiro andar
            </h2>

            <hr>

            <?php

            $result_terreo = "SELECT * FROM terreo";

            $resultado = mysqli_query($conexao, $result_terreo);

            if (!$resultado) {

                die("Erro na consulta: " . mysqli_error($conexao));

            }

            while ($row_terreo = mysqli_fetch_assoc($resultado)) {

            ?>

                <!-- Quantidade disponível -->
                <div class="informacao disponivel">

                    <span class="texto">
                        🩸 Quantidade disponível
                    </span>

                    <span class="numero">
                        <?php echo $row_terreo['quantidade']; ?>
                    </span>

                </div>


                <!-- Quantidade retirada -->
                <div class="informacao retirada">

                    <span class="texto">
                        📦 Quantidade retirada
                    </span>

                    <span class="numero">
                        <?php echo $row_terreo['pegar']; ?>
                    </span>

                </div>

            <?php

            }

            ?>

            <div class="mt-4">

                <a href="./terreo.html" class="voltar">

                    <img src="../img/voltar.png"
                        alt="Voltar"
                        width="50"
                        height="50">

                </a>

            </div>

            <p class="mt-3 text-secondary">
                🌷 Cuidado e acolhimento para todas
            </p>

        </div>

    </div>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>