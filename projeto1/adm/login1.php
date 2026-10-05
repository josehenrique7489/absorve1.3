<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ABSORVE - Administrador</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;

            background: linear-gradient(
                135deg,
                #ffd6e7,
                #f3d9ff,
                #e5d9ff
            );

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 30px;

            padding: 40px 35px;

            box-shadow: 0 15px 40px rgba(150, 80, 130, 0.25);
        }

        .logo {
            width: 90px;
            height: 90px;

            background: linear-gradient(
                135deg,
                #d63384,
                #b65fc4
            );

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 20px;

            font-size: 45px;

            box-shadow: 0 8px 20px rgba(214, 51, 132, 0.3);
        }

        h1 {
            text-align: center;
            color: #b52d72;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitulo {
            text-align: center;
            color: #8d6680;
            margin-bottom: 30px;
        }

        .form-label {
            color: #7c4268;
            font-weight: bold;
        }

        .form-control {
            border: 2px solid #f1c4dc;
            border-radius: 15px;
            padding: 13px 16px;

            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #d63384;

            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.15);
        }

        .btn-entrar {
            width: 100%;

            border: none;
            border-radius: 15px;

            padding: 14px;

            font-size: 18px;
            font-weight: bold;

            color: white;

            background: linear-gradient(
                135deg,
                #d63384,
                #b84fc4
            );

            box-shadow: 0 8px 20px rgba(214, 51, 132, 0.25);

            transition: 0.3s;
        }

        .btn-entrar:hover {
            transform: translateY(-3px);

            box-shadow: 0 12px 25px rgba(214, 51, 132, 0.35);

            color: white;
        }

        .voltar {
            display: block;

            text-align: center;

            margin-top: 20px;

            color: #a4477c;
            text-decoration: none;

            font-weight: bold;
        }

        .voltar:hover {
            color: #d63384;
        }

        .rodape {
            text-align: center;

            margin-top: 25px;

            color: #9b7890;

            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <div class="logo">
                👩‍💼
            </div>

            <h1>ABSORVE</h1>

            <p class="subtitulo">
                🔐 Área do Administrador
            </p>

            <form action="adm.html" method="POST">

                <div class="mb-3">
                    <label class="form-label">
                        👤 Nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        placeholder="Digite seu nome"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        🔒 Senha
                    </label>

                    <input
                        type="password"
                        name="senha"
                        class="form-control"
                        placeholder="Digite sua senha"
                        required>
                </div>

                <button type="submit" class="btn btn-entrar">
                    💕 Entrar
                </button>

            </form>

            <a href="../index.html" class="voltar">
                ← Voltar para o início
            </a>

            <div class="rodape">
                💗 ABSORVE — Cuidado, segurança e acolhimento
            </div>

        </div>

    </div>

</body>
</html>