<?php

namespace Laravel\Vue;

use Closure;

class Factory
{
    /**
     * Registered component names.
     *
     * @var array
     */
    protected $registered = [];

    /**
     * Register Vue component.
     *
     * @param  string         $name
     * @param  Closure|string $concrete
     * @return void
     */
    public function register($component, $concrete = null)
    {
        if (! $concrete instanceof Closure) {
            $concrete = $this->getClosure($component, $concrete);
        }

        $this->registered[$component] = $concrete;
    }

    /**
     * Create Vue component instance.
     *
     * @param  string    $name
     * @return Component
     */
    public function component($name)
    {
        if ($this->isRegistered($name)) {
            return call_user_func($this->registered[$name], $name);
        }

        return new Component($name);
    }

    /**
     * Determines if Vue component is registered.
     *
     * @param  string $name
     * @return bool
     */
    public function isRegistered($name)
    {
        return array_key_exists($name, $this->registered);
    }

    /**
     * Get the closure that creates a new Vue component.
     *
     * @param  string  $component
     * @param  string  $concrete
     * @return Closure
     */
    protected function getClosure($component, $concrete)
    {
        return function ($name) use ($concrete) {
            return new $concrete($name);
        };
    }
}
