<?php

namespace Src\Core;

use BrBunny\BrPlates\BrPlates;

abstract class Controller
{
    /** @var BrPlates */
    protected $view;

    /**
     * Controller construct
     *
     * @param $router
     */
    public function __construct($router)
    {
        $this->view = new BrPlates(BRPLATES['default']);
        $this->view->data(["router" => $router]);
    }
}
