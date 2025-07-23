@props(['type' => 'primary'])

@php
    $baseClasses = 'px-4 py-2 transition';
    $typeClasses = match($type) {
        'primary' => 'bg-[#4F46E5] hover:bg-blue-800 text-white',
        'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-700',
        default => '',
    };
@endphp

<button class="{{ $baseClasses }} {{ $typeClasses }}">
    {{ $slot }}
</button>
