@include('user.project.components.project-users')
<div id="kanban" class="flex gap-4 p-4 mt-13 items-start"
     data-csrf="{{ csrf_token() }}">
    @foreach($project->boards as $board)
        <div class="kanban-column rounded-lg p-4 min-w-[300px] min-h-[70px]"
             style="background-color: {{ $board->color }}"
             id="column-{{ $board->id }}">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="font-semibold">{{ $board->name }}</h2>
                    <span class="add-task-btn text-sm font-semibold text-blue-600 hover:text-blue-800 cursor-pointer" data-board-id="{{ $board->id }}">Add new task</span>
                </div>
                <div class="flex gap-2 items-center">
                    @include('user.project.components.edit-board-button')
                </div>
            </div>

            <div class="task-list space-y-3">
                @foreach($board->tasks as $task)
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

                    @endforeach
            </div>
        </div>
    @endforeach
    @include('user.project.components.create-new-board')
</div>
@include('user.project.components.add-task-modal')
