<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesquisa respostas</title>
</head>

<body>
    <form action="/PesquisaRespostas/store" method="post">
        <p>
            <label for="resposta">Resposta</label>
                <input type="number" placeholder="Resposta" name="resposta">

            </label>
            <input type="submit" value="Enviar">
        </p>
        <p>
            <label for="fk_pesquisa">Id Pesquisa</label>
            <input type="number" name="fk_pesquisa">
        </p>
        <p>
            <label for="fk_user">Id User</label>
            <input type="number" name="fk_user">
        </p>
        <p>
            <label for="fk_pergunta">Id Pergunta</label>
            <input type="number" name="fk_pergunta">
        </p>
    </form>
</body>

</html>