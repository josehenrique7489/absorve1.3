<?php

session_start();

$filtro = $_GET["andar"] ?? "todos";

include_once("../conexao.php");


// ========================================
// MOSTRAR ERROS DO MYSQL
// ========================================

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


try {

    // ========================================
    // BUSCAR HISTÓRICO
    // ========================================

    if ($filtro == "todos") {

        $sql = "SELECT *
                FROM historico
                ORDER BY daata DESC";


    } elseif ($filtro == "terreo") {

        $sql = "SELECT *
                FROM historico
                WHERE andar = 'Térreo'
                ORDER BY daata DESC";


    } elseif ($filtro == "primeiro_andar") {

        $sql = "SELECT *
                FROM historico
                WHERE andar = 'primeiro'
                ORDER BY daata DESC";


    } elseif ($filtro == "segundo_andar") {

        $sql = "SELECT *
                FROM historico
                WHERE andar = 'segundo'
                ORDER BY daata DESC";


    } elseif ($filtro == "terceiro_andar") {

        $sql = "SELECT *
                FROM historico
                WHERE andar = 'terceiro'
                ORDER BY daata DESC";

    }


    // ========================================
    // EXECUTAR CONSULTA
    // ========================================

    $resultado = mysqli_query($conexao, $sql);


} catch (mysqli_sql_exception $e) {

    die("ERRO NO BANCO: " . $e->getMessage());

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ABSORVE - Histórico</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">


    <style>

        body {

            background: linear-gradient(
                135deg,
                #ffe6f0,
                #f4e1ff
            );

            min-height: 100vh;

            padding: 40px;

        }


        .card-relatorio {

            background: white;

            border-radius: 20px;

            padding: 30px;

            max-width: 1100px;

            margin: auto;

            box-shadow: 0 8px 25px rgba(0,0,0,0.15);

        }


        h1 {

            text-align: center;

            color: #b83280;

            margin-bottom: 30px;

        }


        .filtro-historico {

            max-width: 400px;

            margin: 0 auto 20px auto;

        }


        th {

            background-color: #d63384 !important;

            color: white !important;

            text-align: center;

        }


        td {

            text-align: center;

            vertical-align: middle;

        }

    </style>

</head>


<body>


<!-- ========================================
     FILTRO
======================================== -->

<div class="filtro-historico">

    <form method="GET">

        <select name="andar"
                class="form-select"
                onchange="this.form.submit()">


            <option value="todos"
                <?php

                if ($filtro == "todos") {

                    echo "selected";

                }

                ?>>

                Todos os pisos

            </option>


            <option value="terreo"
                <?php

                if ($filtro == "terreo") {

                    echo "selected";

                }

                ?>>

                Térreo

            </option>


            <option value="primeiro_andar"
                <?php

                if ($filtro == "primeiro_andar") {

                    echo "selected";

                }

                ?>>

                1º Piso

            </option>


            <option value="segundo_andar"
                <?php

                if ($filtro == "segundo_andar") {

                    echo "selected";

                }

                ?>>

                2º Piso

            </option>


            <option value="terceiro_andar"
                <?php

                if ($filtro == "terceiro_andar") {

                    echo "selected";

                }

                ?>>

                3º Piso

            </option>


        </select>

    </form>

</div>


<!-- ========================================
     HISTÓRICO
======================================== -->

<div class="card-relatorio">


    <h1>📋 Histórico do ABSORVE</h1>


    <div class="table-responsive">


        <table class="table table-bordered table-hover">


            <thead>

                <tr>

                    <th>Andar</th>

                    <th>Quantidade retirada</th>

                    <th>Quantidade total</th>

                    <th>Data e hora</th>

                </tr>

            </thead>


            <tbody>


            <?php

            if (mysqli_num_rows($resultado) > 0) {


                while ($historico = mysqli_fetch_assoc($resultado)) {

            ?>


                <tr>


                    <td>

                        <?php

                        echo $historico['andar'];

                        ?>

                    </td>


                    <td>

                        <?php

                        echo $historico['quantidade_retirada'];

                        ?>

                    </td>


                    <td>

                        <?php

                        echo $historico['quantidade_total'];

                        ?>

                    </td>


                    <td>

                        <?php

                        echo date(
                            'd/m/Y H:i',
                            strtotime($historico['daata'])
                        );

                        ?>

                    </td>


                </tr>


            <?php

                }

            } else {

            ?>


                <tr>

                    <td colspan="4">

                        Nenhum histórico registrado ainda.

                    </td>

                </tr>


            <?php

            }

            ?>


            </tbody>

        </table>

    </div>


    <!-- ========================================
         VOLTAR
    ======================================== -->

    <div class="text-center mt-4">

        <a href="adm.html"
           class="btn btn-secondary">

            ⬅ Voltar

        </a>

    </div>


</div>


</body>

</html>