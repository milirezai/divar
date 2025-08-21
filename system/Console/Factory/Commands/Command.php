<?php
namespace System\Console\Factory\Commands;

use System\Console\Factory\Traits\General;

abstract class Command
{
    use General;
    abstract public function name();
    abstract public function description();
    abstract public function handle(array $args);
}