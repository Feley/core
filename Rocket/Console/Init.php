<?php 

namespace Rocket\Console;
use League\CLImate\CLImate;

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
        $this->console = new CLImate;
        $this->console->backgroundWhite();
        $this->console->red();
        $this->console->bold()->blink()->out("Speed: The Framework For The Fast");
        $input = $this->console->input("Test Me");

    $response  = $input->prompt();
    if($response){
        if ($response == 'controllers') {
            $this->controllers();
        }else{
            $this->keywords();
        }
    }

    }

    public function shout($value='')
    {
        $this->console->shout($value);
    }
        public function whisper($value='')
    {
        $this->console->whisper($value);
    }
        public function info($value='')
    {
        $this->console->info($value);
    }
        public function comment($value='')
    {
        $this->console->comment($value);
    }
        public function error($value='')
    {
        $this->console->error($value);
    }
    public function table(array $value)
    {
        $this->console->table($value);
    }

    public function quit()
    {
        $this->console->close();
    }

    public function clear()
    {
        $this->console->clear();
    }

    public function controllers()
    {
        $this->console->out("Output The controllers");
    }

    public function keywords()
    {
        $this->console->arguments->add([
    'user' => [
        'prefix'       => 'u',
        'longPrefix'   => 'user',
        'description'  => 'Username',
        'defaultValue' => 'me_myself_i',
    ],
    'password' => [
        'prefix'      => 'p',
        'longPrefix'  => 'password',
        'description' => 'Password',
        'required'    => true,
    ],
    'iterations' => [
        'prefix'      => 'i',
        'longPrefix'  => 'iterations',
        'description' => 'Number of iterations',
        'castTo'      => 'int',
    ],
    'verbose' => [
        'prefix'      => 'v',
        'longPrefix'  => 'verbose',
        'description' => 'Verbose output',
        'noValue'     => true,
    ],
    'help' => [
        'longPrefix'  => 'help',
        'description' => 'Prints a usage statement',
        'noValue'     => true,
    ],
    'make' => [
        'description' => 'Make Command',
        'make:controller' => [
            'description' => 'Create a new controller class',
        ],
        'make:migration' => [
            'description' => 'Create a new migration file',
        ],
        'make:model' => [
            'description' => 'Create a new Model class',
        ],
        'make:middleware' => [
            'description' => 'Create a new middleware class',
        ],



    ],
]);
        $this->console->usage();
    }
}
?>