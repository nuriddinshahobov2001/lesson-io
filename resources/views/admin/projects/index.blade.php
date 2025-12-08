@extends('layout.app')

@section('title', 'Projects')

@section('content')
    <div class="flex min-h-screen">
        <div class="min-w-[220px] bg-gray-800 text-white p-4 overflow-y-auto">
            <h2 class="text-md font-semibold mb-3">Projects</h2>

            <ul class="space-y-1">
                @foreach($projects as $project)
                    <li>
                        <a href="{{ route('projects.show', $project->id) }}" class=" block px-3 py-2 rounded-md transition hover:bg-slate-700">
                            <div class="flex justify-between items-center">
                                <span class="text-md font-semibold">{{ \Str::limit($project->name, 13) }}</span>
                                <span class="px-2 rounded-sm bg-red-500 text-xs">{{ $project->boards->count() }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex-1 p-6">
            <div class="flex justify-between items-center"></div>
        </div>
    </div>
@endsection
