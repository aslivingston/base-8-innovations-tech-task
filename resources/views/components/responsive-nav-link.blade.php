@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full px-3 py-2 text-base font-bold text-gray-900'
    : 'block w-full px-3 py-2 text-base font-medium text-gray-400 hover:text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>