<?php 

namespace Rocket\Console;
use netesy\Console\Application;
use netesy\Console\Command;

/**
 * Initialize The Console
 * 
 * 
 * @author Emmanuel Olisah
 */
class Init 
{
    public $console;
    function __construct()
    {
        $app = new Application('Speed Console', '1.0');
        $app->add(new InitCommand());
        $app->run();
    }

}
?>