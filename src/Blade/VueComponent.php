<?php

namespace Laravel\Vue\Blade;

use Illuminate\Support\Str;
use Illuminate\View\Component as BladeComponent;
use Laravel\Vue\Component;
use Laravel\Vue\Support\Vue;

class VueComponent extends BladeComponent
{
    /**
     * Component instance.
     *
     * @var Component
     */
    public $component;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($component)
    {
        $this->component = Vue::component($component);
    }

    /**
     * Bind attributes.
     *
     * @return void
     */
    public function bindAttributes($attributes)
    {
        foreach ($attributes as $name => $value) {
            if (Str::contains($name, ':')) {
                $value = [
                    last(explode(':', $name)),
                    $value,
                ];
                $name = explode(':', $name)[0];
            }

            if (method_exists($this->component, $name)) {
                if (is_array($value)) {
                    $this->component->{$name}(...$value);
                } else {
                    $this->component->{$name}($value);
                }
            } else {
                $this->component->prop($name, $value);
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('vue::component');
    }
}
