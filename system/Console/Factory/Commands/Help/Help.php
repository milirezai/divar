<?php
namespace System\Console\Factory\Commands\Help;
use System\Console\Factory\Commands\Command;

class Help extends Command
{
    private $name = "help";
    private $description = 'help commands';
     private $errorMsg = 'Error in command';
     private $errorAndExistColorMsg = 'red';

    public function name()
    {
        return $this->name;
    }
    public function description()
    {
        return $this->description;
    }
    public function handle(array $argv)
    {
        return $this->msg($this->errorMsg,$this->errorAndExistColorMsg);
    }
}