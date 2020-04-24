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
 
class KeyCommand extends Command
{
    protected $commandName = "key:generate";
    protected $commandDescription = "Set the application key";

    protected function configure()
    {
        $this->setName($this->commandName)->setDescription($this->commandDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<success>Application key generated successfully</success>");
        $this->setCode(1);
    }
}
?>