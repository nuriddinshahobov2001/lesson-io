<div class="relative inline-block group"
     tabindex="-1">

    <button class="px-3 rounded hover:bg-slate-200 focus:bg-gray-300 focus:outline-none cursor-pointer">
        ⋮
    </button>

    <div class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50
                hidden
                group-focus-within:block
                pointer-events-auto">

        <button class="block w-full text-left px-3 py-2 hover:bg-gray-100 focus:outline-none">
            ✏️ Редактировать
        </button>
        <form action="{{ route('boards.destroy', $board->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="block w-full text-left px-3 py-2 hover:bg-gray-100 focus:outline-none">
                🗑️ Удалить
            </button>
        </form>
        <button class="block w-full text-left px-3 py-2 hover:bg-gray-100 focus:outline-none">
            ➕ Добавить задачу
        </button>
    </div>

</div>
