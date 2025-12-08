@extends('layout.app')

@section('title', $project->name)

@section('content')
    <div class="flex min-h-screen">
        <div class="min-w-[220px] bg-slate-800 text-white p-4 overflow-y-auto">
            <h2 class="text-lg font-semibold mb-3">Projects</h2>
            <ul class="space-y-1">
                @foreach($projects as $pr)
                    <li>
                        <a href="{{ route('projects.show', $pr->id) }}" class="@if($pr->id === $project->id) bg-slate-700 @endif block px-3 py-2 rounded-md transition hover:bg-slate-700">
                            <div class="flex justify-between items-center">
                                <span class="text-md font-semibold">{{ \Str::limit($pr->name, 13) }}</span>
                                <span class="px-2 rounded-sm bg-red-500 text-xs">{{ $pr->boards->count() }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex-1 overflow-x-auto overflow-y-hidden custom-scroll">
            @include('components.alerts.errors')
            @include('admin.projects.components.board')
            @include('components.loading')
        </div>
    </div>
@endsection
