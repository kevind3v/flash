<?= $this->layout('_theme', ["title" => $title]) ?>

<section class="intro">
    <div class="bg"></div>
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 my-3 col-md-7 text-center">
                <img class="img-fluid" style="width: 60%;" src="<?= asset('assets/img/image.svg') ?>" alt="">
            </div>
            <div class="col-12 col-md-4 my-3 text-center">
                <span class="brand"><i class="fas fa-bolt"></i> Flash</span>
                <span class="slogan text-warning">Super Veloz</span>
                <p>"A marca da velocidade"</p>
                <a href="<?= url('novo') ?>" class="btn btn-yellow">Cadastrar Produtos</a>
            </div>
        </div>
    </div>
</section>



<section class="about jumbotron bg-white py-4">
    <div class="container">
        <header>
            <h3>Sobre a <span class="text-warning">Flash</span></h3>
            <p>Sinta-se bem com Flash</p>
        </header>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mt-4 text-center">
                <div class="card-about">
                    <i class="far fa-newspaper"></i>
                    <h3>Apresentação</h3>
                    <p>A marca Flash, foi criada com o objetivo de atingir as pessoas de varias idades com o que há de melhor disponível no mercado.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4 text-center">
                <div class="card-about">
                    <i class="fas fa-bolt"></i>
                    <h3>Velocidade</h3>
                    <p>Somos treinado para ter uma velocidade grande na produção focando na melhor qualidade dos produtos.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4 text-center">
                <div class="card-about">
                    <i class="fab fa-envira"></i>
                    <h3>Qualidade</h3>
                    <p>Trabalhamos com materiais de primeira, focando na sustentábilidade ao meio ambiente e na resistencia dos produtos.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <hr>
</div>
<section class="products jumbotron bg-white py-4">
    <div class="container">
        <header>
            <h3>Nossos <span class="text-warning">Produtos</span></h3>
            <p>Aqui estão alguns dos nossos produtos.</p>
        </header>
        <div class="row">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <?= $this->insert("card", ["product" => $product]) ?>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="container py-3 text-center">
                    <img width="350" class="img-fluid" src="<?= asset('assets/img/empty.svg') ?>" alt="">
                    <h4 class="bold mt-3">Não encontramos nenhum produto!!</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>