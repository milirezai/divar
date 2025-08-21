<?php
namespace System\Console\Factory\Commands\Controller;
use System\Console\Factory\Commands\Command;
use System\Console\Factory\Templates\Make;

class MakeController extends Command
{
    private $name = "make:controller";
    private $description = 'Create a new controller';
    private $replace = 'ClassName';
    private $template = 'Controller.make_controller';
    private $errorMsg = 'Error in command';
    private $sucsessMsg = 'Create a controller ';
    private $existsMsg = 'Already exists ';
    private $errorAndExistColorMsg = 'red';
    private $sucsessColorMsg = 'green';
    private $movePth = 'controller';

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
        if ($this->count($argv,1))
        {
            return $this->msg($this->errorMsg,$this->errorAndExistColorMsg);
            exit;
        }
        $name = ucfirst($argv[0]);
        $path = $this->path($this->movePth, $name);
        if (file_exists($path))
        {
            return $this->msg($this->existsMsg.$name,$this->errorAndExistColorMsg);
            exit;
        }
        else
        {
            Make::move($path,$this->template,$this->replace, $name);
            return $this->msg($this->sucsessMsg.$name,$this->sucsessColorMsg);
            exit;
        }
    }
}