<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Respostas</title>

    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/tablepesquisaresposta/pesquisaresposta.css">




</head>

<body>
    <div class="container-modal">

        <h1>Satisfação Usuários</h1>


        <div class="style-table">
            <table border="1px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Satisfação</th>
                        <th>observação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesquisas as $key => $pesquisa) : ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $pesquisa['nome'] ?></td>
                            <td><?= $pesquisa['satisfacao'] ?>%</td>
                            <td><?= $pesquisa['observacao'] ?></td>
                            <td class="acoes">

                                <div class="bottons-table d-none">

                                    <div class="botton-ver btns1">
                                        <a href="/pesquisarespostas/respostas/<?= $key ?>"> <i class="fa-solid fa-eye" style="color: #ffffff;"></i></a>
                                    </div>
                                    <div class="botton-ver btns1">
                                        <a href="/pesquisarespostas/deletar/<?= $key ?>"> <i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                                    </div>
                                </div>
                                <div class="btns btns-acoes">
                                    <i class="fa-solid fa-ellipsis" style="color: #ffffff;"></i>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="/assets/js/pesquisarespostas/pesquisarespostas.js"></script>

</html>