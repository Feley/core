<?php

namespace Rocket\Console;

use netesy\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 *  The Initialization command for Feley Framework
 *  @ author Emmanuel Olisah
 *  @ MIT 2020
 */
 
class InitCommand extends \netesy\Console\Command
{
    protected $commandName = "speed:init";
    protected $commandDescription = "Initialize Feley Framework";
    protected $commandArgumentName = "environment";
    protected $commandArgumentDescription = "Framework Environment";

    protected function configure()
    {
        $this->setName($this->commandName)->setDescription($this->commandDescription)->addArgument($this->commandArgumentName, InputArgument::OPTIONAL, $this->commandArgumentDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<error>I am a symfony/console error</error>");
    }
}
?>