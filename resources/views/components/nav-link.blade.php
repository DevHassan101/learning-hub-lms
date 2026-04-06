@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center mt-4 py-2 px-6  bg-gradient-to-r from-[#442AE2] to-[#6956E7] text-[#FFFFFF]'
                : 'flex items-center mt-4 py-2 px-6';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $icon ?? '' }}
    <span class="mx-3">{{ $slot }}</span>
</a>
