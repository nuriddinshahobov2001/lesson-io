@extends('layout.app')

@section('title', 'Tasks')

@section('content')
    <div class="p-6 bg-gray-100">
        @include('components.alerts.errors')
        <div id="kanban" class="flex gap-4 overflow-x-auto overflow-y-hidden p-4 bg-gray-100 custom-scroll"
             data-csrf="{{ csrf_token() }}">

            @foreach($boards as $board)
                <div class="kanban-column rounded-lg p-4 flex flex-col min-w-[300px]"
                     style="background-color: {{ $board->color }}"
                     id="column-{{ $board->id }}">

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold">{{ $board->name }}</h2>
                        @include('admin.tasks.components.edit-board-button')
                    </div>

                    <div class="task-list h-[700px] overflow-y-auto custom-scroll">
                        @foreach($board->tasks as $task)
                            <div class="task-item bg-white cursor-pointer shadow rounded p-3 mb-3 flex flex-col"
                                 data-id="{{ $task->id }}">
                                <h3 class="font-semibold">{{ $task->name }}</h3>
                                <div class="border-t border-gray-300 mt-4 mb-2"></div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-xs">{{ $task->due_date->format('d.m.Y') }}</span> |
                                        <span class="{{ $task->priority->classView() }} text-sm rounded-sm px-2">
                                    {{ $task->priority->label() }}
                                </span>
                                    </div>
                                    <div class="w-[30px] h-[30px]">
                                        <img class="w-full h-full rounded-full" src="{{ asset($task->assignedTo->avatar) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            @include('admin.tasks.components.create-new-board')
        </div>

    </div>
    @include('components.loading')
@endsection
