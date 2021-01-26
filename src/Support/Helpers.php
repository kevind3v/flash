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


###################
####  IMAGES  #####
###################

/**
 * Treat base64 image
 *
 * @param string $image
 * @return string|null
 */
function image(string $image, string $old = null): ?string
{
    if (!empty($image) && preg_match("/data:image\\/png;base64,/", $image)) {
        $first_array = explode(";", $image);
        $array = explode(",", $first_array[1]);
        if ($data = base64_decode($array[1], true)) {
            if ($old) {
                removeImage($old);
            }
            $name = time() . '.png';
            if (file_put_contents('uploads/' . $name, $data)) {
                return $name;
            }
        }
    }
    return null;
}

/**
 * Remove directory image
 * @param string $image
 * @return boolean
 */
function removeImage(string $image): void
{
    if (file_exists("uploads/{$image}")) {
        unlink("uploads/{$image}");
    }
}
