<div class="bg-white shadow-2xs rounded-lg p-4 flex flex-col max-h-[240px] min-w-[300px]">

    <h2 class="font-semibold mb-2">Create new board</h2>
    <form action="{{ route('boards.store') }}" method="POST">
        @csrf
        <x-form.input
            name="board_name"
            id="board_name"
            placeholder="Enter board name"
            value="{{ old('board_name') }}"
        />

        <p>Select color</p>
        <div class="flex gap-2 mt-2">
            @foreach(\App\Enums\BoardColorsEnum::cases() as $color)
                <label class="relative cursor-pointer">
                    <input
                        type="radio"
                        name="board_color"
                        value="{{ $color->value }}"
                        class="peer sr-only"
                        {{ $color === \App\Enums\BoardColorsEnum::DEFAULT ? 'checked' : '' }}
                    />
                    <div
                        style="background-color: {{ $color->value }}"
                        class="w-8 h-8 rounded-md border-1 border-transparent peer-checked:border-blue-500 transition"
                        title="{{ $color->name }}"
                    ></div>
                </label>
            @endforeach
        </div>

        <x-form.button
            title="Create"
            variant="primary"
            class="mt-4"
        >
            Create
        </x-form.button>

    </form>
</div>
