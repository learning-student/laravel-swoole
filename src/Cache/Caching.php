<?php


namespace SwooleTW\Http\Cache;

use Illuminate\Cache\Repository;

/**
 * Class Caching
 * @package SwooleTW\Http\Cache
 */
class Caching
{

    /**
     * @var array
     */
    private $swooleCacheconfig;




    /**
     * Caching constructor.
     * @param array $swooleCacheconfig
     * @param array $laravelCacheConfig
     */
    public function __construct(array $swooleCacheconfig)
    {
        $this->setSwooleCacheconfig($swooleCacheconfig);
    }

    /**
     * @return array
     */
    public function getSwooleCacheconfig(): array
    {
        return $this->swooleCacheconfig;
    }

    /**
     * @param array $swooleCacheconfig
     * @return Caching
     */
    public function setSwooleCacheconfig(array $swooleCacheconfig): Caching
    {
        $this->swooleCacheconfig = $swooleCacheconfig;
        return $this;
    }

}