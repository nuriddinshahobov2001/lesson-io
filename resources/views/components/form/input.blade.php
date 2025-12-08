@props([
    'id',
    'name',
    'type' => 'text',
    'label' => '',
    'value' => '',
    'required' => false,
])

<div>
    @if($label)
        <label class="block text-gray-700 mb-1" for="{{ $id }}">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full border border-slate-300 focus:outline-none focus:border-blue-800 rounded px-3 py-2'
        ]) }}
    >
</div>
