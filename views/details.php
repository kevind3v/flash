<?= $this->layout('_theme', ["title" => $product->name]) ?>

<section class="div-section pt-3">
  <div class="div-content container my-5 px-4 py-4">
    <header>
      <h4>Detalhes <span class="text-warning">Produto</span></h4>
    </header>
    <div class="row mt-5">
      <div class="col-12 col-md-4 text-center">
        <img alt="<?= $product->name ?>" class="img-fluid" src="<?= url($product->image) ?>" />
      </div>
      <div class="col-12 col-md-8">
        <h4 class="bold"><?= $product->name ?></h4>
        <span class="details-price">R$ <?= $product->price ?></span>

        <p class="details-title mt-2 mb-0">Descrição:</p>
        <p class="details-desc"><?= $product->description ?></p>

        <div class="buttons mt-4 text-center text-md-left">
          <p class="details-title mb-1">Ações:</p>

          <a href="<?= $router->route("web.formEdit", ['id' => $product->id]) ?>" class="mt-1 btn btn-border btn-b-green">
            <i class="far fa-edit mr-1"></i>Editar
          </a>

          <a data-action="<?= url("/detalhe/delete") ?>" data-id="<?= $product->id ?>" class="mt-1 btn btn-border btn-b-danger">
            <i class="far fa-trash-alt mr-1"></i>Excluir
          </a>

        </div>
      </div>
    </div>
  </div>
</section>


<?php
$this->start("js");
?>
<script>
  $(() => {
    $("body").on("click", "[data-action]", function(e) {
      e.preventDefault();
      var data = $(this).data();

      swal({
          title: "Excluir Produto",
          text: 'Vai mesmo excluir "<?= $product->name ?>"??',
          icon: "warning",
          buttons: ["Cancelar", "Sim"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: data.action,
              data: data,
              type: "POST",
              dataType: "json",
              success: function(callback) {
                if (callback.message) {
                  swal({
                      title: callback.message,
                      icon: "success",
                      buttons: [false, "Ok"],
                    })
                    .then(areClosed => {
                      if (areClosed) location.href = '<?= url(); ?>'
                    });
                }
              },
              error: function() {
                swal({
                  title: 'Oops!! Erro ao excluir!!',
                  icon: "error",
                });
              }
            });
          }
        });
    });
  });
</script>
<?php
$this->end();
?>