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
                <h2>Respostas</h2>
                <?php foreach ($respostas as $resposta) : ?>
                    <div class="questions">
                        <span><?= $resposta['pergunta'] ?></span>
                        <span><?= $resposta['resposta'] ?></span>
                    </div>
                <?php endforeach; ?>
                
                <span><?= $respostas[0]['observacao'] ?></span>

            </div>
        </form>
    </div>

</body>


</html>