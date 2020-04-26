<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 1:10 PM
 */

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

function env($key, $default = null)
{
    $value = getenv($key) ?? $_ENV[$key] ?? $_SERVER[$key];
    if ($value === false){
        return $default;
    }

    switch (strtolower($value)){
        case 'true':
            return true;
        case 'false':
            return false;
    }
    return $value;
}