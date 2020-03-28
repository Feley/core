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
        $this->console->black();
        $this->console->bold()->blink()->out("Speed: The Framework For The Fast");
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
}
?>