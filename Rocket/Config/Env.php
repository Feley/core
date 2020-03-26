<?php

namespace Rocket\Config;

use Dotenv\Dotenv;

/**
 * Enviroment Class to get enviroment details
 */
class Env 
{
    public static function load($location)
    {
        $dotenv = Dotenv::createImmutable($location);
        $dotenv->load();
    }
}