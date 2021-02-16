<?php

/**
 * Constant Url Base of the project, change if necessary
 */

define("ROOT", "http://localhost/flash");


/** Constant for database configuration  */

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "flash",
    "username" => "root",
    "passwd" => "",
    "options" => [
        // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ],
]);

/**
 * Constante for view configuration
 */
define("BRPLATES", [
    "default" =>  dirname(__DIR__, 1) . "/views",
]);
