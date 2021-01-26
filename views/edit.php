<?= $this->layout('_theme', ["title" => $product->name ]) ?>

<section class="div-section pt-3">

    <div class="div-content container my-4 px-4 py-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <header>
                    <h4>Editar <span class="text-warning">Produto</span></h4>
                    <p>Altere os campos desejados!!</p>
                </header>
                <form method="post" id="formEdit" action="#">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Nome do produto</label>
                            <input value="<?= $product->name ?>" type="text" class="form-control name" id="name" name="name" placeholder="Blusa Nike" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-12 mb-3">
                            <label>Foto</label>
                            <label class="file" for="upload_image">Escolher Foto</label>
                            <input type="file" class="image" id="upload_image">
                            <input type="hidden" name="image" value="#" id="image-form">
                        </div>
                        <div class="col-md-5 col-sm-12 mb-3">
                            <label for="price">Preço</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input value="<?= $product->price ?>" type="text" class="form-control price" id="price" placeholder="59,99" name="price" data-mask="000.000,00" data-mask-reverse="true" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description">Descrição do produto</label>
                        <textarea class="form-control" id="description" rows="5" name="description"><?= $product->description ?></textarea>
                    </div>
                    <button class="btn btn-yellow btn-lg text-white btn-block" type="submit">Cadastrar produto</button>
                </form>
            </div>
            <div class="col-12 d-md-none d-lg-block col-lg-1"></div>
            <div class="col-12 col-md-6 col-lg-4">
                <header class="mt-2">
                    <h5>Preview <span class="text-warning">Produto</span></h5>
                </header>
                <div class="card-product">
                    <div class="product-tumb">
                        <img class="" alt="<?= $product->name ?>" id="preview-img" src="<?= url("uploads/{$product->image}") ?>">
                    </div>
                    <div class="card-content pt-1">
                        <h4 class="card-title"><?= $product->name ?></h4>
                        <div class="card-price">R$ <span class="price"><?= $product->price ?></span></div>
                        <div class="text-center">
                            <span class="btn btn-yellow-preview px-5">Ver Produto</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-left mb-2">
                    <h5 class="bold">Cortar <span class="text-warning">Imagem</span></h5>
                </div>
                <div class="row">
                    <div class="col-11 ml-1 col-lg-7">
                        <img src="" id="image_upload">
                    </div>
                    <div class="col-12 col-lg-4 mt-2">
                        <p class="bold ml-3 mb-0">Preview</p>
                        <div class="preview"></div>
                    </div>
                </div>
                <div class="text-right mt-2">
                    <span class="close-modal" data-dismiss="modal">Cancelar</span>
                    <button type="button" id="crop" class="btn btn-yellow ml-2 px-5">Cortar Imagem</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->start('js') ?>
<script src="<?= asset('assets/js/cropper.js') ?>"></script>
<script src="<?= asset('assets/js/keyup.js') ?>"></script>
<script>
    $("#formEdit").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var load = $("#load");

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function() {
                load.modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    swal({
                        title: response.message,
                        icon: "warning",
                        buttons: [false, "Ok"],
                    })
                } else {
                    swal({
                        title: response.message,
                        icon: "success",
                        buttons: [false, "Ok"],
                    }).then(areClosed => {
                        if (areClosed) location.href = '<?= url(); ?>'
                    });
                }
            },
            complete: function() {
                load.modal('hide').fadeOut(200);
            }
        })
    });
</script>
<?= $this->end() ?>