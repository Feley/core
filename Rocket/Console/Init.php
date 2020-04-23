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
        $directory = '/Commands/';
        $app = new Application('Voom Framework', '1.0');
        // foreach (glob($directory."*.php") as $file) {
        //    // echo $file;
        //     print_r($file);
        //     var_dump($file);
        //   // $app->add(new Commands\$file());
        // }
        $app->add(new Commands\InitCommand());
        $app->run();
    }

}
?>