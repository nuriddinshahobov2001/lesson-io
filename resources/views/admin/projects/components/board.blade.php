@include('admin.projects.components.project-users')
<div id="kanban" class="flex gap-4 p-4 mt-13 items-start"
     data-csrf="{{ csrf_token() }}">
    @foreach($project->boards as $board)
        <div class="kanban-column rounded-lg p-4 min-w-[300px] min-h-[150px]"
             style="background-color: {{ $board->color }}"
             id="column-{{ $board->id }}">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold">{{ $board->name }}</h2>
                <div class="flex gap-2 items-center">
                    @include('admin.projects.components.edit-board-button')
                </div>
            </div>

            <div class="task-list space-y-3">
                @forelse($board->tasks as $task)
                    <div class="task-item bg-white cursor-pointer shadow rounded p-3"
                         data-id="{{ $task->id }}">
                        <h3 class="font-semibold">{{ $task->name }}</h3>
                        <div class="border-t border-gray-300 mt-4 mb-2"></div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-xs">{{ (!empty($task->due_date)) ? $task->due_date->format('d.m.Y'): 'Date not specified' }}</span> |
                                <span class="{{ $task->priority->classView() }} text-sm rounded-sm px-2">
                                    {{ $task->priority->label() }}
                                </span>
                            </div>
                            <div class="w-[30px] h-[30px]">
                                @if(!empty($task->assignedTo->avatar))
                                    <img class="w-full h-full rounded-full"
                                     src="{{ asset($task->assignedTo->avatar) }}" alt="">

                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="flex flex-col items-center justify-center py-8 border border-dashed border-blue-600 rounded-md">
                        <button
                            class="add-task-btn bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-md transition duration-200 flex items-center gap-2"
                            data-board-id="{{ $board->id }}">
                            Add new task
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    @endforeach
    @include('admin.projects.components.create-new-board')
</div>
@include('admin.projects.components.add-task-modal')
