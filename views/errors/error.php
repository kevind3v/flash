<?= $this->layout('_theme', ["title" => $title]) ?>

<section class="div-section pt-3">
    <div class="error-content container text-center my-4 px-4 py-4">
        <p class="error"><?= $error->code; ?></p>
        <h1><?= $error->title; ?></h1>
        <p class="error-text"><?= $error->message; ?></p>
        <a class="btn btn-yellow mt-4 py-3 px-5" title="Voltar para inicio" href="<?= url() ?>">Voltar para pagina inicial</a>
    </div>
</section>