<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
    <div class="card-product">
        <div class="product-tumb">
            <img class="" src="<?= url('uploads/') . $product->image ?>">
        </div>
        <div class="card-content pt-1">
            <h4><?= $product->name ?></h4>
            <div class="card-price">R$ <?= $product->price ?></div>
            <div class="text-center">
                <a href="<?= $router->route("web.details", ['id' => $product->id]) ?>" class="btn btn-yellow px-5">Ver Produto</a>
            </div>
        </div>
    </div>
</div>