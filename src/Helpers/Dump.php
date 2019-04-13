<?php


namespace SwooleTW\Http\Helpers;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;

class Dump
{

    public static function dd(...$args) : bool
    {

        // init the dumper and cloner
        $dumper = new HtmlDumper();
        $cloner = new VarCloner();


        // dump each var in the args
        foreach ($args as $arg) {
            if (defined('IN_PHPUNIT')) {
                continue;
            }
            $dumper->dump($cloner->cloneVar($arg));
        }
        return true;
    }
}