<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respostas</title>


</head>

<body>

    <div>
        <form>
            <div>
                <?php foreach ($perguntas as $pergunta) : ?>
                    <div class="questions">
                        <input disabled type="text" placeholder="" name="pergunta[<?= $pergunta['id_pergunta'] ?>]" class="container-questions" value="<?= $pergunta['pergunta'] ?>" id="<?= $pergunta['id_pergunta'] ?>">

                        <label>Sim</label>
                        <input disabled type="radio"></input>
                        <label>Talvez</label>
                        <input disabled type="radio"></input>
                        <label>Não</label>
                        <input disabled type="radio"></input>
                    </div>
                <?php endforeach; ?>

            </div>
        </form>
    </div>

</body>


</html>