@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[16px] text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
