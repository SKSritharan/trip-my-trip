@props(['active', 'href'])

@php
    $classes = ($active ?? false)
                ? 'active'
                : '';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="{{$href}}">
        {{ $slot }}
    </a>
</li>

