<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/register_user.css">
    <title>Cadastrar</title>
</head>

<body>
    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <div class='container mt-5'>
        <div>
            <h1>Cadastrar aluno</h1>
        </div>
        <form class="row g-3" method='post' enctype="multipart/form-data">
            <div class="col-md-12">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name='name' maxlength="50" placeholder="Digite seu nome">
            </div>
            <div class="col-12">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" id="inputAddress" maxlength="100" name='andress' placeholder="Digite seu endereço">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input class="form-control" type="file" name='picture' accept="image/png">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>