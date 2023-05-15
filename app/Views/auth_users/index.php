<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/listusers.css">


</head>

<body>

<div class="container-modal">



    <h1>Tela de listar todos os usuários</h1>

    <div class="new-users"><a href="/AuthUsers/novo">Cadastrar novo</a></div>


<div class="style-table"> 

    <table>

    <div class="header-list">
    
                <thead>
                     <tr>
                              <th>ID</th>
                              <th>Nome</th>
                              <th>Ações</th>
                      </tr>
                </thead>
    </div>



        <tbody>
            <?php foreach ($auth_users as $auth_user) : ?>
                <tr>
                    <div class="users-id">
                        <td><?= $auth_user['id_user'] ?></td>
                    </div>
                    <td><?= $auth_user['nome'] ?></td>
                    <td>
<div class="bottons-table">
    
                        <div class="botton-excluir">   <a href="/AuthUsers/excluir/<?= $auth_user['id_user'] ?>">Excluir</a></div>
    
    
                        <div class="botton-ver"><a href="/AuthUsers/ver/<?= $auth_user['id_user'] ?>">Ver</a></div>
</div>

                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

   </div>
</div>


</body>

</html>