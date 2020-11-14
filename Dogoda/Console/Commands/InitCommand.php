<?php

namespace Rocket\Console\Commands;

use Rocket\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
/**
 *  The Initialization command for Feley Framework
 * @author Emmnauel [netesy] Olisah
 * @copyright 2020 Voom Framework
 * @version 0.0.5
 */
 
class InitCommand extends \netesy\Console\Command
{
    protected $commandName = "feley:init";
    protected $commandDescription = "Initialize Feley Framework";
    protected $commandArgumentName = "environment";
    protected $commandArgumentDescription = "Framework Environment";

    protected function configure()
    {
        $this->setName($this->commandName)->setDescription($this->commandDescription)->addArgument($this->commandArgumentName, InputArgument::OPTIONAL, $this->commandArgumentDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<error>Application successfully Initialized</error>");
        $this->setCode(1);
    }
}
?>