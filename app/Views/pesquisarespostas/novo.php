<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>

    <link rel="stylesheet" href="/assets/css/questions.css">
</head>

<body>
    <form action="/pesquisarespostas/store" method="post">
        <div>
            <label for="resposta">Resposta</label>
        </div>

        <?php foreach ($perguntas as $pergunta) : ?>
            <div>

                <label for="<?= $pergunta['id_pergunta'] ?>"><?= $pergunta['pergunta'] ?></label>

                <input type="hidden" name="respostas[<?= $pergunta['id_pergunta'] ?>]" id="<?= $pergunta['id_pergunta'] ?>" name="pergunta">

                <label>Sim</label>
                <input type="radio" value="2" name="respostas[<?= $pergunta['id_pergunta'] ?>]"></input>
                <label>Talvez</label>
                <input type="radio" value="1" name="respostas[<?= $pergunta['id_pergunta'] ?>]"></input>
                <label>Não</label>
                <input type="radio" value="0" name="respostas[<?= $pergunta['id_pergunta'] ?>]"></input>

            </div>
        <?php endforeach; ?>

        <textarea name="pesquisa[observacao]" cols="30" rows="10"></textarea>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>