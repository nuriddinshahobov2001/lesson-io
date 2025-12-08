@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'options' => [], // массив ['value' => 'Label']
    'selected' => null,
    'class' => '',
    'required' => true
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

    <select
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => "w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent $class"]) }}
    >
        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}" {{ (string)($selected ?? old($name)) === (string)$value ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
</div>
