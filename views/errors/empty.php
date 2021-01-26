<?= $this->layout('_theme', ["title" => "Produto não encontrado"]) ?>

<section class="div-section pt-3">
    <div class="error-content container text-center my-4 px-4 py-4">
        <img width="350" class="img-fluid" src="<?= asset('assets/img/empty.svg') ?>" alt="">
        <h1 class="mt-3">Vazio</h1>
        <p class="bold text-danger">Não encontramos o produto solicitado!!</p>
        <a class="btn btn-yellow mt-2 py-3 px-5" title="Voltar para inicio" href="<?= url() ?>">Voltar para pagina inicial</a>
    </div>
</section>