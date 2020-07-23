@php
    $bindAttributes($attributes); 

    if($slot) {
        $component->child((string) $slot);
    }
@endphp

{!! $component !!}