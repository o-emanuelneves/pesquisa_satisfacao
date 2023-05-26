<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Início</title>

    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/telainicial/index.css">

</head>

<body>
    <?php
    $session = session();

    $nome = $session->get('nome');
    ?>
    <div class="container-modal">

        <h1>Tela de início</h1>

        <h2>Seja bem vindo <?= $nome ?></h2>

        <div class="containers-buttons-index">

            <div class="button-new-users"><a href="/AuthUsers">Ver usuarios</a> <br></div>

            <div class="button-new-users"><a href="/PesquisaPerguntas/novo">Criar perguntas</a> <br></div>

        </div>
    </div>

</body>

</html>