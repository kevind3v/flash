<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Product Class
 * @package Src\Models
 */
class Product extends DataLayer
{
    /**
     * Product constructor
     */
    public function __construct()
    {
        parent::__construct("products", ["name", "description", "price", "image"]);
    }
}
