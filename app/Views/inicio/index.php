<?php
$session = session();
$id_user = $session->get('id_user');
$id_admin = 14;


?>
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

    <div class="container-modal">

        <h1>Tela de início</h1>


        <div class="containers-buttons-index">
            <?php
            // Verifique se o ID da sessão é igual a 14
            if ($id_user == $id_admin) :
            ?>
                <div class="button-users"><a href="/AuthUsers">Usuários</a> <br></div>
                <div class="button-new-users"><a href="/AuthUsers/novo">Novo Usuário</a> <br></div>
                <div class="button-make-a-questions"><a href="/PesquisaPerguntas/novo">Criar Perguntas</a></div>
                <div class="button-make-a-questions"><a href="/PesquisaRespostas/">Ver Respostas</a></div>

            <?php
            endif;

            if ($id_user != $id_admin) :
            ?>
                <div class="button-users"><a href="/PesquisaRespostas/novo">Responder Pesquisa</a> <br></div>





            <?php endif; ?>

        </div>

        <div class="gif"><iframe src="https://giphy.com/embed/9gONVX546SZADKQxIy" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            <p><a href="https://giphy.com/gifs/CanalPremiere-premiere-brasileiro-canalpremiere-9gONVX546SZADKQxIy"></a></p>
        </div>


    </div>

</body>

</html>