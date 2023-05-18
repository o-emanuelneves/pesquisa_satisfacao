<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Respostas</title>
</head>

<body>
    <div>
        <table border="1px">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Satisfação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pesquisas as $key => $pesquisa) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $pesquisa['nome'] ?></td>
                        <td><?= $pesquisa['satisfacao'] ?>%</td>
                        <td>
                            <!--  -->
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>

</html>