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
            <h1 class="left-align">Perguntas</h1>



            <div class="btn-plus">
                <div class="button-plus">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </div>

            <div class="all-questions">
                <?php foreach ($perguntas as $pergunta) : ?>
                    <div class="questions">
                        <label for=""></label>

                        <input type="text" placeholder="" name="pergunta[<?= $pergunta['id_pergunta'] ?>]" class="container-questions" value="<?= $pergunta['pergunta'] ?>" id="<?= $pergunta['id_pergunta'] ?>">

                        <i class="fa-solid fa-trash-can delete-question" onclick="deleteButton(this)"></i>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="button">
                <label for="fk_user">
                </label>
                <input type="submit" value="Salvar" class="button-save">
            </div>
        </form>
    </div>

    <div class="questionTemplate d-none">
        <label for=""></label>
        <input type="text" placeholder="" name="newpergunta[]" class="container-questions">
        <i class="fa-solid fa-trash-can delete-question"></i>
    </div>
</body>

                <div class="button">
                    <label for="fk_user">
                    </label>
                    <input type="submit" value="Salvar" class="button-save">
                </div>
            </form>
        </div>

        <div class="questionTemplate d-none">    
            <label for=""></label>           
            <input type="text" placeholder="" name="pergunta[]" class="container-questions"> 
            <i class="fa-solid fa-trash-can delete-question"></i>           
        </div>
    </body>
    <script src="/assets/js/questions.js"></script>
</html>

