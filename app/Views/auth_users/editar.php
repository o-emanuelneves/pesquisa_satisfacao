<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Usuários</title>
</head>

<body>
    <form action="/AuthUsers/store" method="post">
        <label for="nome">
            <input type="text" placeholder="Nome" name="nome" value="<?= $auth_user['nome'] ?>">
        </label>
        <input type="hidden" name="id_user" value="<?= $auth_user['id_user'] ?>">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>