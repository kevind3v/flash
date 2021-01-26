<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Flash</title>
    <link rel="shortcut icon" href="<?= asset("assets/img/favicon.ico") ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= package("/bootstrap/dist/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?= package("/@fortawesome/fontawesome-free/css/all.min.css"); ?>" />
    <link rel="stylesheet" href="<?= package("/cropperjs/dist/cropper.min.css"); ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">
</head>

<body>
    <header class="header navbar navbar-expand-md navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand brand" href="<?= url(); ?>">
                <i class="fas fa-bolt"></i> Flash
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navMobile" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?= url() ?>" class="nav-link mr-3" type="submit">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('novo-produto') ?>" class="btn btn-yellow" type="submit">Novo produto</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="py-4 mt-5">
        <?= $this->section('content'); ?>
    </main>

    <footer class="bg-white">
        <div class="container text-dark">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0">&copy; <?= date('Y'); ?> <span class="brand"><i class="fas fa-bolt"></i> Flash</span>, Inc.</h6>
                </div>
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <a title="Kevin Siqueira" href="https://github.com/kevind3v" title="Instagram" target="blank" class="text-warning">
                        <i class="fab fa-github mr-4"></i>
                    </a>
                    <a title="Kevin Siqueira" href="https://www.linkedin.com/in/kevinssiqueira/" title="Facebook" target="blank" class="text-warning">
                        <i class="fab fa-linkedin mr-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <div class="modal" data-backdrop="static" data-keyboard="false" id="load" tabindex="-1" role="dialog" aria-labelledby="loadTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="load  container text-center mt-5">
                <img width="80" src="<?= asset('assets/img/load.gif'); ?>" alt="">
                <p class="bold text-white">Carregando...</p>
            </div>
        </div>
    </div>


    <script src="<?= package("/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?= package("/popper.js/dist/popper.min.js"); ?>"></script>
    <script src="<?= package("/sweetalert/dist/sweetalert.min.js"); ?>"></script>
    <script src="<?= package("/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <script src="<?= package("/cropperjs/dist/cropper.min.js"); ?>"></script>
    <script src="<?= package("/jquery-mask-plugin/dist/jquery.mask.min.js"); ?>"></script>
    <script src="<?= package("/jquery-form/dist/jquery.form.min.js"); ?>"></script>
    <?= $this->section("js"); ?>
</body>

</html>