<?php

namespace Laravel\Vue\Support;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void register($name, Closure|string $concrete)
 * @method static \Laravel\Vue\Component component(string $name, Closure $children = null)
 *
 * @see Laravel\Vue\Factory
 */
class Vue extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'vue';
    }
}
