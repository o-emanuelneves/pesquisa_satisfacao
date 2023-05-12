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
                    <th>Id Resposta</th>
                    <th>Fk Pesquisa</th>
                    <th>Fk User</th>
                    <th>Fk pergunta</th>
                    <th>Resposta</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pesquisa_respostas as $pesquisa_resposta) : ?>
                    <tr>
                        <td><?= $pesquisa_resposta['id_resposta'] ?></td>
                        <td><?= $pesquisa_resposta['fk_pesquisa'] ?></td>
                        <td><?= $pesquisa_resposta['fk_user'] ?></td>
                        <td><?= $pesquisa_resposta['fk_pergunta'] ?></td>
                        <td><?= $pesquisa_resposta['resposta'] ?></td>
                        <td>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>

</html>