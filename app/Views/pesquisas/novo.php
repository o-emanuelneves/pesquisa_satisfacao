<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pesquisa</title>
</head>

<body>
    <form action="/Pesquisas/store" method="post">
        <label for="observacao">
            <input type="text" placeholder="observacao" name="observacao">
        </label> <br>
        <label for="fk_user">FK_user:
            <input type="number" name="fk_user">
        </label>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>