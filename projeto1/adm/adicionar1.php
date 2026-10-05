
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ABSORVE - Atualizar Quantidade</title>

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
            max-width: 550px;
            background: white;
            padding: 45px;
            border-radius: 30px;
            box-shadow: 0 15px 40px rgba(180, 90, 140, 0.20);
        }

        .logo {
            color: #d63384;
            font-size: 36px;
            font-weight: bold;
        }

        .subtitulo {
            color: #8d6680;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .form-label {
            color: #7d5270;
            font-weight: bold;
        }

        .form-control {
            border: 2px solid #f0c9dc;
            border-radius: 15px;
            padding: 13px;
        }

        .form-control:focus {
            border-color: #d63384;
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.15);
        }

        .botao {
            width: 100%;
            border: none;
            border-radius: 17px;
            padding: 15px;
            background: linear-gradient(135deg, #d63384, #b84fc4);
            color: white;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 7px 18px rgba(180, 70, 130, 0.20);
            transition: 0.3s;
        }

        .botao:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(180, 70, 130, 0.30);
            color: white;
        }

        .voltar {
            display: inline-block;
            margin-top: 25px;
            padding: 8px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .voltar:hover {
            transform: scale(1.1);
            background-color: #ffe6f0;
        }

        .icone {
            font-size: 45px;
        }

    </style>

</head>

<body>

    <div class="pagina">

        <div class="card-absorve">

            <div class="text-center">

                <div class="icone">
                    🌸🩸🌸
                </div>

                <h1 class="logo">
                    ABSORVE
                </h1>

                <p class="subtitulo">
                    Atualizar quantidade de absorventes 💗
                </p>

            </div>

            <hr>

            <form action="adicionar.php" method="POST">

                <!-- Quantidade disponível -->
                <div class="mb-4">

                    <label class="form-label">
                        🩸 Quantidade de absorventes:
                    </label>

                    <input
                        type="number"
                        name="quantidade"
                        min="0"
                        class="form-control"
                        placeholder="Digite a quantidade"
                        required>

                </div>


                <!-- Quantidade para retirar -->
                <div class="mb-4">

                    <label class="form-label">
                        📦 Quantidade doadas:
                    </label>

                    <input
                        type="number"
                        name="pegar"
                        min="0"
                        class="form-control"
                        placeholder="Digite a quantidade"
                        required>

                </div>


                <!-- Botão -->
                <button type="submit" class="botao">
                    💾 Atualizar
                </button>

            </form>


            <!-- Voltar -->
            <div class="text-center">

                <a href="./adm.html" class="voltar">

                    <img
                        src="../img/voltar.png"
                        alt="Voltar"
                        width="50"
                        height="50">

                </a>

            </div>

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

