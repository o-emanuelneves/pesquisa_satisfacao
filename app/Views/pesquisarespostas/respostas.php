<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respostas</title>


</head>

<body>

    <div>
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