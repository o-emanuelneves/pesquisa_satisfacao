<?php
$session = session();
 

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

        <form action="/Inicio/autenticar" method="post">
            <label for="nome">Digite seu nome completo</label>
            <input type="text" name="nome" id="nome">

            <button type="submit">Entrar</button>
        </form>

    </div>

</body>

</html>