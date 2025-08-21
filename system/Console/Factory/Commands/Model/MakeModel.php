<?php
namespace System\Console\Factory\Commands\Model;
use System\Console\Factory\Commands\Command;
use System\Console\Factory\Templates\Make;

class MakeModel extends Command
{
    private $name = "make:model";
    private $description = 'Create a new model';
    private $replace = ["ClassName","TableName"];
    private $template = 'Model.make_model';
    private $errorMsg = 'Error in command';
    private $sucsessMsg = 'Create a model ';
    private $existsMsg = 'Already exists ';
    private $errorAndExistColorMsg = 'red';
    private $sucsessColorMsg = 'green';
    private $movePth = 'model';

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
            Make::move($path,$this->template,$this->replace,[$name, strtolower($name).'s']);
            return $this->msg($this->sucsessMsg.$name,$this->sucsessColorMsg);
            exit;
        }
    }
}