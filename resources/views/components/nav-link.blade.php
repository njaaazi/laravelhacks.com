@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 text-sm font-medium leading-5 text-gray-700'
            : 'inline-flex items-center px-1 text-sm font-medium leading-5 text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
