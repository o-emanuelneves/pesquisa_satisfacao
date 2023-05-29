<?php
$session = session();
$nome = $session->get('nome');


if ($nome==null):
    header("Refresh: 0; URL=../inicio/index");
    
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Logout</h1>
    <a href="../inicio/logout">Sair</a>
</body>
</html>