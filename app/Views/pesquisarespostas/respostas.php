<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respostas</title>
    <link rel="stylesheet" href="/assets/css/pesquisarespostas/respostas.css">
    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
</head>

<body>

    <div class="container-modal">

        <h1>Respostas</h1>

        <form>
            <div>
                <div class="questions">
                    <table>
                        <thead>
                            <tr>

                                <td>
                                    Nº
                                </td>

                                <td>
                                    Pergunntas
                                </td>



                                <td>
                                    Respostas
                                </td>
                            </tr>
                        </thead>
                        <?php foreach ($respostas as $key => $resposta) : ?>

                            <tr>
                                <td>
                                    <span class="perguntas-peguntasrespostas"><?= $key + 1 ?></span>
                                </td>

                                <td>
                                    <span class="perguntas-peguntasrespostas"><?= $resposta['pergunta'] ?></span>
                                </td>


                                <td>
                                    <span class="respostas-peguntasrespostas"><?= $resposta['resposta'] ?></span>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>

                <div class="observacoes-respostas">
                    <span class="textarea-pesquisarespostas"><?= $respostas[0]['observacao'] ?></span>
                </div>

            </div>
        </form>
    </div>

</body>


</html>