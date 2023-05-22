<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>

    <link rel="stylesheet" href="/assets/css/pesquisarespostas/pesquisarespostas.css">
    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
</head>

<body>

    <div class="container-modal">

        <form action="/pesquisarespostas/store" method="post">
            <div>
                <label for="resposta"><h1>Resposta</h1></label>
            </div>
            
            <?php foreach ($perguntas as $pergunta) : ?>

                <div class="container-respostas">

                    <div class="container-questions"><label class= "perguntas" for="<?= $pergunta['id_pergunta'] ?>"><?= $pergunta['pergunta'] ?></label> </div>

                    <input type="hidden" name="respostas[<?= $pergunta['id_pergunta'] ?>]" id="<?= $pergunta['id_pergunta'] ?>" name="pergunta">

                    <input class="button-answers"type="radio" value="2" name="respostas[<?= $pergunta['id_pergunta'] ?>]" id="sim-<?= $pergunta['id_pergunta'] ?>"></input>
                    <label class="box" for= "sim-<?= $pergunta['id_pergunta'] ?>" class= "respostas">Sim</label>

                    <input  class="button-answers" type="radio" value="1" name="respostas[<?= $pergunta['id_pergunta'] ?>]" id="talvez-<?= $pergunta['id_pergunta'] ?>" ></input>
                    <label class="box"  for="talvez-<?= $pergunta['id_pergunta'] ?>" class= "respostas" >Talvez</label>
                    
                    <input class="button-answers" type="radio" value="0" name="respostas[<?= $pergunta['id_pergunta'] ?>]" id="nao-<?= $pergunta['id_pergunta'] ?>"  ></input>
                    <label class="box"  for="nao-<?= $pergunta['id_pergunta'] ?>" class= "respostas">Não</label>
                    

                </div>

            <?php endforeach; ?>

            <h2>Observações</h2>

            <div class="observacoes-respostas">
                <textarea class="textarea-pesquisarespostas"  name="pesquisa[observacao]"    cols="30" rows="10"    ></textarea>                
            </div>
            
            <div class="container-enviar"><input class="button-save" type="submit" value="Enviar"></div>

        </form>
    </div>


    
</body>

<script src="/assets/js/pesquisarespostas/pesquisaresposta.js"></script>

</html>