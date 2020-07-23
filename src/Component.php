<?php

namespace Laravel\Vue;

/**
 * A Vue component builder.
 *
 * @see https://vuejs.org/v2/guide/render-function.html#createElement-Arguments
 */
class Component
{
    /**
     * Component tag name.
     *
     * @var string
     */
    protected $tag;

    /**
     * Component data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Children/Default Slot.
     *
     * @var array
     */
    protected $children = [];

    /**
     * CSS classes.
     *
     * @var array
     */
    protected $classes = [];

    /**
     * Component props.
     *
     * @var array
     */
    protected $props = [];

    /**
     * DOM properties.
     *
     * @var array
     */
    protected $domProps = [];

    /**
     * CSS styles.
     *
     * @var array
     */
    protected $styles = [];

    /**
     * Slot name.
     *
     * @var string
     */
    protected $slot;

    /**
     * Ref name.
     *
     * @var string
     */
    protected $ref;

    /**
     * Key name.
     *
     * @var string
     */
    protected $key;

    /**
     * If you are applying the same ref name to multiple elements in the render
     * function. This will make `$refs.myRef` become an array.
     *
     * @var bool
     */
    protected $refInFor = true;

    /**
     * Event handlers.
     *
     * @var array
     */
    protected $events = [];

    /**
     * Create new Component instance.
     *
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        $this->tag = $tag;

        $this->beforeMount();
    }

    /**
     * Prepare component for being mounted.
     *
     * @return void
     */
    public function beforeMount()
    {
    }

    /**
     * Mounted lifecycle hook.
     *
     * @return void
     */
    public function mounted()
    {
    }

    /**
     * Rendering lifecycle hook.
     *
     * @return void
     */
    public function rendering()
    {
    }

    /**
     * Rendered lifecycle hook.
     *
     * @return void
     */
    public function rendered()
    {
    }

    /**
     * Add event handler.
     *
     * @param  string $event
     * @param  mixed  $handler
     * @return $this
     */
    public function on($event, $handler)
    {
        $this->events[$event] = $handler;

        return $this;
    }

    /**
     * Get event by name.
     *
     * @param string $name
     */
    public function getEvent($event)
    {
        return $this->events[$event] ?? null;
    }

    /**
     * Get events.
     *
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set key.
     *
     * @param  string $key
     * @return $this
     */
    public function key($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key.
     *
     * @return string|null
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set ref name.
     *
     * @param  string $ref
     * @return $this
     */
    public function ref($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref name.
     *
     * @return string|null
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set refInFor.
     *
     * @param  bool  $refInFor
     * @return $this
     */
    public function refInFor(bool $refInFor)
    {
        $this->refInFor = $refInFor;

        return $this;
    }

    /**
     * Determines if refInFor is true.
     *
     * @return bool
     */
    public function isRefInFor()
    {
        return $this->refInFor;
    }

    /**
     * Set component slot name.
     *
     * @param  string $name
     * @return $this
     */
    public function slot($name)
    {
        $this->slot = $name;

        return $this;
    }

    /**
     * Get component slot name.
     *
     * @return string|null
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * Set style.
     *
     * @param  string $name
     * @param  string $value
     * @return $this
     */
    public function style($name, $value)
    {
        $this->styles[$name] = $value;

        return $this;
    }

    /**
     * Get style by name.
     *
     * @param  string $name
     * @return string
     */
    public function getStyle($name)
    {
        return $this->styles[$name];
    }

    /**
     * Get styles.
     *
     * @return array
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Bind prop by name.
     *
     * @param  string $name
     * @param  mixed  $value
     * @return $this
     */
    public function prop($name, $value)
    {
        $this->props[$name] = $value;

        return $this;
    }

    /**
     * Bind multiple props.
     *
     * @param  array $props
     * @return $this
     */
    public function bind(array $props)
    {
        $this->props = array_merge($this->props, $props);

        return $this;
    }

    /**
     * Get prop value by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getProp($name)
    {
        return $this->props[$name] ?? null;
    }

    /**
     * Get props.
     *
     * @return array
     */
    public function getProps()
    {
        return $this->props;
    }

    /**
     * Set dom prop.
     *
     * @param  string $name
     * @param  mixed  $value
     * @return string
     */
    public function domProp($name, $value)
    {
        $this->domProps[$name] = $value;

        return $this;
    }

    /**
     * Get dom prop.
     *
     * @param  string $name
     * @return mixed
     */
    public function getDomProp($name)
    {
        return $this->domProps[$name] ?? null;
    }

    /**
     * Set classes.
     *
     * @param  array|string $class
     * @return $this
     */
    public function class($class)
    {
        $this->classes = $class;

        return $this;
    }

    /**
     * Add class.
     *
     * @param  string $class
     * @return $this
     */
    public function addClass($class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Get classes.
     *
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Add child.
     *
     * @param  string|self $child
     * @return $this
     */
    public function child($child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Get component children.
     *
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Render component.
     *
     * @return array
     */
    public function render(): array
    {
        $this->mounted();
        $this->rendering();

        $rendered = [
            'tag'      => $this->tag,
            'children' => [],
            'classes'  => $this->classes,
            'props'    => $this->props,
            'domProps' => $this->domProps,
            'styles'   => $this->styles,
            'slot'     => $this->slot,
            'ref'      => $this->ref,
            'refInFor' => $this->refInFor,
            'key'      => $this->key,
        ];

        $this->rendered();

        return $rendered;
    }

    /**
     * Get attribute.
     *
     * @param  string $attribute
     * @return mixed
     */
    public function __get($attribute)
    {
        return $this->data[$attribute]
            ?? $this->props[$attribute]
            ?? null;
    }

    /**
     * Convert component to string.
     *
     * @return string
     */
    public function __toString()
    {
        $rendered = json_encode(collect($this->render())->filter(function ($value) {
            return (bool) $value;
        }));

        return '<php-component :component="'.htmlspecialchars($rendered).'">'.implode("\n", $this->children).'</php-component>';
    }
}
