<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Resposta</title>
</head>

<body>
    <form action="/pesquisarespostas/store" method="post">
        <p>
            <label for="resposta">Resposta</label>
            <input type="number" placeholder="Resposta" name="resposta" value="<?= $pesquisa_respostas['resposta'] ?>">
        </p>
        <p>
            <label for="fk_pesquisa">Fk Pesquisa</label>
            <input type="number" name="fk_pesquisa" value="<?= $pesquisa_respostas['fk_pesquisa'] ?>" disabled>
        </p>
        <p>
            <label for="fk_user">Fk User</label>
            <input type="number" name="fk_user" value="<?= $pesquisa_respostas['fk_user'] ?>" disabled>
        </p>
        <p>
            <label for="fk_pergunta">Fk Pergunta</label>
            <input type="number" name="fk_pergunta" value="<?= $pesquisa_respostas['fk_pergunta'] ?>" disabled>
        </p>
        <input type="submit" value="Atualizar">
        <input type="hidden" name="id_resposta" value="<?= $pesquisa_respostas['id_resposta'] ?>">
    </form>
</body>

</html>