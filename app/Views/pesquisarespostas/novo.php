<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>

    <link rel="stylesheet" href="/assets/css/questions.css">
</head>

<body>
    <form action="/pesquisarespostas/store" method="post">
        <h4>
            <label for="resposta">Resposta</label>
        </h4>
      
            <label class="btns" for="btn1">Sim</label>
            <input type="radio" value="2" name="resposta" id="btn1"></input>
            <label class="btns" for="btn2">Talvez</label>
            <input type="radio" value="1" name="resposta" id="btn2"></input>
            <label class="btns" for="btn3">Não</label>
            <input type="radio" value="0" name="resposta" id="btn3"></input>
   

        <h4>
            <label for="fk_pesquisa">Fk Pesquisa</label>
            <input type="number" name="fk_pesquisa">
        </h4>
        <h4>
            <label for="fk_user">Fk User</label>
            <input type="number" name="fk_user">
        </h4>
        <h4>
            <label for="fk_pergunta">Fk Pergunta</label>
            <input type="number" name="fk_pergunta">
        </h4>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>