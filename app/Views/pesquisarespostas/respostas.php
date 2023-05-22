<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respostas</title>
    <link rel="stylesheet" href="/assets/css/pesquisarespostas/respostas.css">
    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">


</head>

<body>

    <div class="container-modal">

        <h1>Respostas</h1>

        <form>
            <div>
                <?php foreach ($perguntas as $pergunta) : ?>

                    <div class="container-respostas">
                    
                        <input disabled type="text" placeholder="" name="pergunta[<?= $pergunta['id_pergunta'] ?>]" class="container-questions" value="<?= $pergunta['pergunta'] ?>" id="<?= $pergunta['id_pergunta'] ?>">


                        


                        <input class="button-answers" disabled type="radio"></input>
                        <label class="box">Sim</label>
                        

                        <input class="button-answers" disabled type="radio"  ></input>
                        <label class="box">Talvez</label>
                        
                        

                        <input class="button-answers" disabled type="radio"  ></input>
                        <label class="box">Não</label>

                        

                        


                    </div>
                <?php endforeach; ?>

            </div>
        </form>
    </div>

</body>


</html>