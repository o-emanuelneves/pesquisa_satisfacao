<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <h1>Tela de listar todos os usuários</h1>
    <a href="/AuthUsers/novo">Cadastrar novo</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auth_users as $auth_user) : ?>
                <tr>
                    <td><?= $auth_user['id_user'] ?></td>
                    <td><?= $auth_user['nome'] ?></td>
                    <td>
                        <a href="/AuthUsers/editar/<?= $auth_user['id_user'] ?>">Editar</a>
                        <a href="/AuthUsers/excluir/<?= $auth_user['id_user'] ?>">Excluir</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>