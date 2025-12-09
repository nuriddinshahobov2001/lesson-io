<div class="relative inline-block group"
     tabindex="-1">

    <button class="px-3 rounded hover:bg-white focus:bg-gray-300 focus:outline-none cursor-pointer">
        ⋮
    </button>

    <div class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50
                hidden
                group-focus-within:block
                pointer-events-auto">

        <button class="edit-board-btn block w-full text-left px-3 py-2 hover:bg-gray-100 hover:rounded-lg focus:outline-none"
                data-board-id="{{ $board->id }}">
            Edit
        </button>

        <button class="delete-board-btn block w-full text-left px-3 py-2 hover:bg-gray-100 hover:rounded-lg focus:outline-none text-red-600"
                data-board-id="{{ $board->id }}">
            Delete
        </button>
    </div>

</div>
