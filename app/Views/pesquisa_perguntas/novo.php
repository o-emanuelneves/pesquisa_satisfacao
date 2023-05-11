<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pergunta</title>
</head>

<body>
    <form action="/PesquisaPerguntas/store" method="post">
        <label for="pergunta">
            <input type="text" placeholder="pergunta" name="pergunta">
        </label> <br>
        <label for="fk_user">FK_user: Esse campo será retirado no futuro, só coloquei para poder incluir a pergunta no banco de dados enquanto não criamos o login
            <input type="number" name="fk_user">
        </label>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>