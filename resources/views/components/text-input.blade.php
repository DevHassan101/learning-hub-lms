@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-1 w-full rounded-md form-input border-[#482EE3] focus:ring-[#482EE3] text-[14px]']) !!}>
