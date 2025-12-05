@extends('layout.app')

@section('title', 'Tasks')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="grid grid-cols-4 gap-4">
            @foreach(\App\Enums\TaskStatusEnum::values() as $statusLabel)
                @php
                    $status = 'bg-amber-200';
                    if ($statusLabel === 'in-progress'){
                        $status = 'bg-blue-200';
                    }elseif($statusLabel === 'completed'){
                        $status = 'bg-green-200';
                    }elseif ($statusLabel === 'failed'){
                        $status = 'bg-red-200';
                    }
                @endphp
                <div class="{{ $status }} rounded-lg p-4 flex flex-col">
                    <h2 class="font-semibold mb-4">{{ ucfirst($statusLabel) }}</h2>
                    <div class=" h-[700px] overflow-y-auto custom-scroll">
                        @foreach($tasks->where('status', $statusLabel) as $task)
                            <div class="bg-white cursor-pointer shadow rounded p-3 mb-3 flex flex-col">
                                <h3 class="font-semibold">{{ $task->name }}</h3>
                                <div class="border-t border-gray-300 mt-4 mb-2"></div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-xs">
                                            {{ $task->due_date->format('d.m.Y') }}
                                        </span> |
                                        <span class="{{ $task->priority->classView() }} text-sm rounded-sm px-2">
                                            {{ $task->priority->label() }}
                                        </span>
                                    </div>
                                    <span class="text-xs font-semibold">{{ $task->assignedTo?->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
