<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pergunta</title>


    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/questions.css">





</head>

<body>






    <div class="container-modal">

        <form action="/PesquisaPerguntas/store" method="post">
            <!-- <div> <input type="number" class="usersid" name="fk_user"> </div> -->

            <h1 class="left-align">Perguntas</h1>


            <div class="btn-plus">
                <div class="button-plus">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </div>

            <div class="questions">
                <label for="pergunta"></label>
                <input type="text" placeholder="Pergunta 1" name="pergunta[]" class="container-questions" id='pergunta'>
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <div class="questions">
                <label for="pergunta"></label>
                <input type="text" placeholder="Pergunta 2" name="pergunta[]" class="container-questions" id='pergunta'>
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <div class="questions">
                <label for="pergunta"></label>
                <input type="text" placeholder="Pergunta 3" name="pergunta[]" class="container-questions" id='pergunta'>
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <div class="questions">
                <label for="pergunta"></label>
                <input type="text" placeholder="Pergunta 4" name="pergunta[]" class="container-questions" id='pergunta'>
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <div class="questions">
                <label for="pergunta"></label>
                <input type="text" placeholder="Pergunta 5" name="pergunta[]" class="container-questions" id='pergunta'>
                <i class="fa-solid fa-trash-can"></i>
            </div>


            <div class="button">
                <input type="submit" value="Salvar" class="button-save">
            </div>


        </form>


    </div>

</body>

</html>