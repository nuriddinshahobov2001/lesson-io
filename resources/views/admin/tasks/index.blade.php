@extends('layout.app')

@section('title', 'Tasks')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="grid grid-cols-4 gap-4" id="kanban" data-csrf="{{ csrf_token() }}">
            @foreach(\App\Enums\TaskStatusEnum::cases() as $status)
                <div class="{{ $status->color() }} rounded-lg p-4 flex flex-col" id="column-{{ $status->value }}">
                    <h2 class="font-semibold mb-4">{{ $status->label() }}</h2>
                    <div class="h-[700px] overflow-y-auto custom-scroll task-list">
                        @foreach($tasks->where('status', $status->value) as $task)
                            <div class="bg-white cursor-pointer shadow rounded p-3 mb-3 flex flex-col task-item"
                                 data-id="{{ $task->id }}">
                                <h3 class="font-semibold">{{ $task->name }}</h3>
                                <div class="border-t border-gray-300 mt-4 mb-2"></div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-xs">{{ $task->due_date->format('d.m.Y') }}</span> |
                                        <span
                                            class="{{ $task->priority->classView() }} text-sm rounded-sm px-2">{{ $task->priority->label() }}</span>
                                    </div>
                                    <div class="w-[30px] h-[30px]">
                                        <img class="w-full h-full rounded-full"
                                             src="{{ asset($task->assignedTo->avatar) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.loading')
@endsection

