<?php
namespace System\Console\Factory;
use System\Console\Factory\Traits\General;
use System\Console\Factory\Commands\Help\Help;

sleep(1);
class Cli
{
    use General;
    private static $commands = [];
    private static function registerCommand()
    {
        $commands = require __DIR__."/Commands/RegisterCommand.php";
        return $commands;
    }
    public static function run(array $argv)
    {
        self::$commands = self::registerCommand();
        if (!empty($argv[1]))
        {
            foreach (self::$commands as $command)
            {
                $command = new $command();
                if ($argv[1] == $command->name()){
                    array_shift($argv);
                    array_shift($argv);
                    print_r($command->handle($argv));
                }
            }
        }
        else
        {
            $help = new Help();
            print_r($help->handle($argv));
        }
    }
}