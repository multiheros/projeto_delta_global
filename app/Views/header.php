<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/header.css">
    <title>Atividade Backend</title>
</head>

<body>
    <div class='header'>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src='/assets/imgs/deltaGlobal-deltagrupo-logo-color.svg' class='deltaLogo'>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('register') ?>">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('users') ?>">Alunos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>