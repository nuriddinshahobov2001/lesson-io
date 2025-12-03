@props([
    'id',
    'name',
    'label' => '',
    'checked' => false,
    'required' => false,
])

<div class="mb-3 flex items-center space-x-2">
    <input
        type="checkbox"
        id="{{ $id }}"
        name="{{ $name }}"
        value="1"
        {{ old($name, $checked) ? 'checked' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500'
        ]) }}
    >

    @if($label)
        <label for="{{ $id }}" class="text-gray-700 select-none cursor-pointer">
            {{ $label }}
        </label>
    @endif
</div>
