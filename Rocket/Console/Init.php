<?php 

namespace Rocket\Console;
use Rocket\Console\Application;
use Rocket\Console\Command;

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
        $directory = __DIR__.'/Commands/';
        $app = new Application('Speed Console', '1.0');
        // foreach (glob($directory."/*.php") as $file) {
        //     require_once($file);
        // }
        $app->add(new Commands\InitCommand());
        $app->run();
    }

}
?>