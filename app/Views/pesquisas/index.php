<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <h1>Tela de listar as pesquisas</h1>
    <a href="/AuthUsers/novo">Cadastrar novo</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID_Pesquisa</th>
                <th>fk_user</th>
                <th>Observacao</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesquisas as $pesquisa) : ?>
                <tr>
                    <td><?= $pesquisa['id_pesquisa'] ?></td>
                    <td><?= $pesquisa['fk_user'] ?></td>
                    <td><?= $pesquisa['observacao'] ?></td>
                    <td>
                        <a href="/Pesquisas/excluir/<?= $pesquisa['id_pesquisa'] ?>">Excluir</a>
                        <a href="/Pesquisas/ver/<?= $pesquisa['id_pesquisa'] ?>">Ver</a>

                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>