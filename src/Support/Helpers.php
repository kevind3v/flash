<?php

##################
####   URL   #####
##################

/**
 * Function for treat variable
 * @param string $path
 * @return string
 */
function path(string $path): string
{
    return ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

/**
 * function to work with routing
 * @param string $path
 * @return string
 */
function url(string $path = "/"): string
{
    return ROOT . "/" . path($path);
}

/**
 * Function used to import assets into the project as CSS or JS
 * @param string $path
 * @return string
 */
function asset(string $path): string
{
    return ROOT . "/views/" . path($path);
}

/**
 * Function used to import packages in node_modules
 * @param string $path
 * @return string
 */
function package(string $path): string
{
    return ROOT . "/node_modules/" . path($path);
}
