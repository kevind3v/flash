<?php

ob_start();

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(url());
$router->namespace("Src\App");

/** Routes Web */
$router->group(null);
$router->get('/', "Web:home", "web.home");
$router->get('/novo-produto', "Web:form", "web.form");
$router->post('/novo-produto', "Web:create", "web.create");

/** Details */
$router->get('/detalhe/{id}', "Web:details", "web.details");
$router->get('/detalhe/{id}/editar', "Web:formEdit", "web.formEdit");
$router->post('/detalhe/{id}/editar', "Web:edit", "web.edit");
$router->post('/detalhe/delete', "Web:delete", "web.delete");

/**
 * Errors
 */
$router->group("ops");
$router->get("/{errcode}", "Web:error");

/** Routes dispatch  */
$router->dispatch();

/** If there is an error in the routes */
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}

ob_end_flush();
