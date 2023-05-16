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
            <input type="text" placeholder="" name="pergunta[]" class="container-questions"> 
            <i class="fa-solid fa-trash-can delete-question"></i>           
        </div>
    </body>
</html>

<script>

    const buttonPlus = document.querySelectorAll('.button-plus')[0];

    buttonPlus.addEventListener('click', function () {
        const questionTemplate = document.querySelectorAll('.questionTemplate')[0];
        const questions = document.querySelectorAll('.questions');
        const countQuestions = questions.length + 1 ?? 1;

        const clone = questionTemplate.cloneNode(true);
        const id = `perguntas-${countQuestions}`;
        const place = `Pergunta ${countQuestions}`;
        const allQuestions = document.querySelectorAll('.all-questions')[0];

        clone.classList.remove('d-none');
        clone.classList.remove('questionTemplate');
        clone.setAttribute('id', id);
        clone.setAttribute('class', 'questions');
        clone.querySelector('label').setAttribute('for', id);
        clone.querySelector('input').setAttribute('placeholder', place);
        allQuestions.append(clone);

        const buttonDelete = clone.querySelector('.delete-question');

        buttonDelete.addEventListener('click', function () {
            const divDelete = this.parentNode;
            divDelete.remove();
        });
    })


</script>
