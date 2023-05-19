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
        <div id="wrapper"></div>
        <div class="style-table">
            <table>
            
                <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    
                </thead>
          
                <tbody>
                    <?php foreach ($auth_users as $auth_user) : ?>
                        <tr>
                            <div class="users-id">
                                <td><?= $auth_user['id_user'] ?></td>
                            </div>
                            <td><?= $auth_user['nome'] ?></td>
                            <td class="acoes">

                                <div class="bottons-table d-none">
                                    <div class="botton-ver btns1"><a href="/AuthUsers/ver/<?= $auth_user['id_user'] ?>"> <i class="fa-solid fa-eye" style="color: #ffffff;"></i></a></div>

                                    <div class="botton-excluir btns1"> 
                                        <a href="/AuthUsers/excluir/<?= $auth_user['id_user'] ?>"><i class="fa-solid fa-trash-can delete-question" style="color: #ffffff;"></i></a>
                                    </div>
                                
                                </div>
                                <div class="btns btns-acoes"><i class="fa-solid fa-ellipsis" style="color: #ffffff;"></i></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>


<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="/assets/js/btns.js"></script>

</html>