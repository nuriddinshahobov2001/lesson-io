@props([
    'url' => '',
    'title' => 'Menu',
    'className' => 'hover:text-white',
    'active' => ''
])
@php
    $isActive = $active;
@endphp
<a href="{{ $url }}" class="{{ $className }} {{ $isActive ? 'text-white' : 'text-gray-400' }}   transition duration-200">{{ $title }}</a>
