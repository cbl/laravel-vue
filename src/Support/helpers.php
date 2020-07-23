<?php

use Laravel\Vue\Factory;

if (! function_exists('vue')) {
    /**
     * Get vue component factory.
     *
     * @return \Laravel\Vue\Factory
     */
    function vue()
    {
        return app('vue');
    }
}
