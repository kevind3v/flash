<?php

namespace Src\App;

use BrBunny\BrUploader\Base64;
use Src\Core\Controller;
use Src\Models\Product;

/**
 * Web Class
 * @package Src\App
 */
class Web extends Controller
{

    /**
     * Web constructor
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /** Display home page */
    public function home(): void
    {
        $this->view->show("home", [
            "title" => "Pagina Inicial",
            "products" => (new Product())->find()->order('id DESC')->fetch(true),
        ]);
    }

    /** Display product form */
    public function form(): void
    {
        $this->view->show("form", [
            "title" => "Novo Produto"
        ]);
    }

    /**
     * Create product
     * @param array $data
     */
    public function create(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $data)) {
            $response["message"] = "Preencha todos os campos!";
            $response["error"] = true;
            echo json_encode($response);
            return;
        }

        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $image = (new Base64("uploads", "images"))
            ->upload($data['image'], $data['name'] . "-" . time());
        $product->image = $image;
        if ($product->save()) {
            $response['message'] = "Produto cadastrado com sucesso";
            $response['error'] = false;
            echo json_encode($response);
            return;
        }

        $response['message'] = "Algo deu errado!! Tente novamente!";
        $response['error'] = true;
        echo json_encode($response);
        return;
    }

    /**
     * Display product details
     * @param array $data
     */
    public function details(array $data): void
    {
        $idProduct = filter_var($data['id'], FILTER_VALIDATE_INT);
        $product = (new Product())->findById($idProduct);
        if (!empty($product)) {
            $this->view->show("details", [
                "product" => $product
            ]);
            return;
        }
        $this->view->show("errors/empty");
    }

    /**
     * Display edit form
     * @param array $data
     */
    public function formEdit(array $data): void
    {
        $idProduct = filter_var($data['id'], FILTER_VALIDATE_INT);
        $product = (new Product())->findById($idProduct);
        if (!empty($product)) {
            $this->view->show("edit", [
                "product" => $product
            ]);
            return;
        }
        $this->view->show("errors/empty");
    }

    /**
     * Edit product
     * @param array $data
     */
    public function edit(array $data): void
    {
        if (in_array("", $data)) {
            $response["message"] = "Preencha todos os campos!";
            $response["error"] = true;
            echo json_encode($response);
            return;
        }
        $idProduct = filter_var($data['id'], FILTER_VALIDATE_INT);
        $product = (new Product())->findById($idProduct);
        if ($product) {
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            if (!empty($data['image']) && $data['image'] != "#") {
                $image = (new Base64("uploads", "images"))
                    ->upload($data['image'], $data['name'] . "-" . time());
                Base64::remove($product->image);
                $product->image = $image;
            }
            if ($product->save()) {
                $response['message'] = "Produto atualizado com sucesso";
                $response['error'] = false;
                echo json_encode($response);
                return;
            }
        }
        $this->view->show("errors/empty");
    }

    /**
     * Delete product
     * @param array $data
     */
    public function delete(array $data): void
    {
        if (!empty($data['id'])) {
            $idProduct = filter_var($data["id"], FILTER_VALIDATE_INT);
            $product = (new Product())->findById($idProduct);
            if ($product) {
                Base64::remove($product->image);
                $product->destroy();
            }
            $response["message"] = "Produto excluído com sucesso!";
            $response['error'] = false;
            echo json_encode($response);
        }
        return;
    }

    /**
     * Display errors
     * @param array $data
     */
    public function error(array $data)
    {
        $dataError = new \stdClass();
        $dataError->code = $data['errcode'];
        $dataError->title = "Oops!! Conteúdo indisponível";
        $dataError->message = "O conteúdo que você tentou acessar não existe, 
        está indisponível no momento ou foi removido :(";

        $this->view->show("errors/error", [
            "title" => "Novo Produto",
            "error" => $dataError
        ]);
    }
}
