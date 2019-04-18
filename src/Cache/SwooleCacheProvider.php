<?php


namespace SwooleTW\Http\Cache;


use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider;
use SwooleTW\Http\Server\Facades\Server;
use SwooleTW\Http\Server\Manager;
use Swoole\Http\Response;
use Swool\Http\Request;


class SwooleCacheProvider extends ServiceProvider
{


    public function register()
    {

        $swoole = $this->app->make(Manager::class);


        $this->app->singleton(Caching::class, function () {
            $config = $this->app->make(Repository::class);


            return new Caching(
                $config->get('swoole_cache')
            );
        });


        $caching = $this->app->make(Caching::class);


        /**
         * add caching pre-event
         *
         * @var Manager $swoole
         * @var Caching $caching
         */

        $this->app->singleton(Manager::class, static function () use ($swoole, $caching) {
            $swoole->addPreEvent('request', $caching->cachePreEvent());
            $swoole->addPostEvent('request', $caching->cachePostEvent());
        });

    }

}