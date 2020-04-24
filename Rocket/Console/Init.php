<?php 

namespace Rocket\Console;
use Rocket\Console\Application;
use Rocket\Console\Command;

/**
 * Initialize The Console
 * 
 * @author Emmnauel [netesy] Olisah
 * @copyright 2020 Voom Framework
 * @version 0.0.5
 */
class Init 
{
    public $console;
    function __construct()
    {
        $directory = '/Commands/';
        $app = new Application('Voom Framework', '1.0');
        // foreach (glob($directory."*.php") as $file) {
        //    // echo $file;
        //     print_r($file);
        //     var_dump($file);
        //   // $app->add(new Commands\$file());
        // }
        $app->add(new Commands\InitCommand());
        $app->add(new Commands\KeyCommand());
        $app->run();
    }

}
?>