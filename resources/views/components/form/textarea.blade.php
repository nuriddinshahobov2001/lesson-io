@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'rows' => 3,
    'placeholder' => '',
    'value' => '',
    'class' => '',
    'required' => false,
])

<div>
    @if($label)
        <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <textarea
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => "w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent $class"]) }}
    >{{ old($name, $value) }}</textarea>
</div>
