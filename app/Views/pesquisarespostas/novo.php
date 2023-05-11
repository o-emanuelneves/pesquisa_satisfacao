<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
</head>

<body>
    <form action="/pesquisarespostas/store" method="post">
        <p>
            <label for="resposta">Resposta</label>
            <input type="number" placeholder="Resposta" name="resposta">
        </p>
        <p>
            <label for="fk_pesquisa">Fk Pesquisa</label>
            <input type="number" name="fk_pesquisa">
        </p>
        <p>
            <label for="fk_user">Fk User</label>
            <input type="number" name="fk_user">
        </p>
        <p>
            <label for="fk_pergunta">Fk Pergunta</label>
            <input type="number" name="fk_pergunta">
        </p>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>