<?php
$session = session();
$nome = $session->get('nome');
$id_user = $session->get('id_user');


if ($nome==null):
    echo json_encode(['mensagem' => "Faça login pra continuar!"]);
    header("Refresh: 2; URL=../../login"); 
   

    
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
    <h1>TESTE</h1>
    <a href="../login/logout">Sair</a>
</body>
</html>