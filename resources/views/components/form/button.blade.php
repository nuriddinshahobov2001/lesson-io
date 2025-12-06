@props([
    'type' => 'submit',
    'variant' => 'primary',
])

@php
    $base = "px-4 py-2 rounded font-semibold cursor-pointer text-white w-full text-center";

    $variants = [
        'primary' => "bg-blue-600 hover:bg-blue-700",
        'success' => "bg-green-600 hover:bg-green-700",
        'danger' => "bg-red-600 hover:bg-red-700",
        'info' => "bg-cyan-600 hover:bg-cyan-700",
        'secondary' => "bg-gray-600 hover:bg-gray-700",
        'warning' => "bg-yellow-500 hover:bg-yellow-600 text-black",
    ];

    $classes = $base." ".$variants[$variant];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</button>
