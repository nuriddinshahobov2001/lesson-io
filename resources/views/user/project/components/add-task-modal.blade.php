<!-- Modal for creating new task -->
<div id="createTaskModal" class="fixed inset-0 bg-black/60 hidden z-50 transition-all duration-300 ease-out"
     style="backdrop-filter: blur(2px);">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div
            class="bg-white rounded-lg shadow-2xl max-w-md w-full transform transition-all duration-300 ease-out scale-95 opacity-0"
            id="modalContent">
            <div class="flex items-center justify-between px-6 py-4 border-b border-b-slate-300">
                <h3 class="text-lg font-semibold text-gray-900">Create new task</h3>
                <button class="close-modal text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="createTaskForm" action="{{ route('tasks.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="board_id" id="modalBoardId">
                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <x-form.input
                    label="Task name"
                    name="name"
                    id="taskName"
                    placeholder="Enter task name"
                    required
                />

                <x-form.textarea
                    id="taskDescription"
                    name="description"
                    label="Description (optional)"
                    rows="3"
                    placeholder="Enter task description"
                />

                <x-form.select
                    id="taskPriority"
                    name="priority"
                    label="Priority"
                    required
                    :options="\App\Enums\TaskPriorityEnum::getKeyValue()"
                    :selected="1"
                />
                <x-form.input
                    label="Due date"
                    name="due_date"
                    type="date"
                    required
                    id="taskDueDate"
                />
                <x-form.select
                    id="assignedTo"
                    name="assigned_to"
                    label="Assigned to"
                    required
                    :options="$users"
                    :selected="1"
                />

                <div class="flex justify-end space-x-3 pt-4">
                    <x-form.button type="button" class="close-modal" variant="secondary">
                        Cancel
                    </x-form.button>
                    <x-form.button type="submit" variant="primary">
                        Create task
                    </x-form.button>
                </div>
            </form>
        </div>
    </div>
</div>
