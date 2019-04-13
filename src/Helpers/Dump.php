<?php


namespace SwooleTW\Http\Helpers;

use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;

class Dump
{

    /**
     *  dump variables if only HtmlDumper and VarCloner exists
     *
     * @param mixed ...$args
     * @return bool
     */
    public static function dd(...$args): bool
    {

        if (!class_exists(HtmlDumper::class) || !class_exists(VarCloner::class)) {
            return false;
        }

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