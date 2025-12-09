@extends('layout.app')

@section('title', 'Projects')

@section('content')
    <div class="flex min-h-[calc(100vh-80px)]">
        <div class="min-w-[220px] bg-gray-800 text-white p-4 overflow-y-auto">
            <h2 class="text-md font-semibold mb-3 text-slate-500">Projects</h2>

            <ul class="space-y-1">
                @foreach($projects as $project)
                    <li>
                        <a href="{{ route('projects-user.show', $project->id) }}" class=" block px-3 py-2 rounded-md transition hover:bg-slate-700">
                            <div class="flex justify-between items-center">
                                <span class="text-sm">{{ \Str::limit($project->name, 13) }}</span>
                                <span class="px-2 rounded-sm bg-red-500 text-xs">{{ $project->boards?->count() }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex-1 p-6 flex items-center justify-center">
            <div class="text-center text-gray-500">

                <!-- Иконка -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="mx-auto mb-3 w-14 h-14 opacity-70"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 7.5A2.25 2.25 0 0 1 5.25 5h3.375c.621 0 1.205.292 1.584.792L12 8.25h6.75A2.25 2.25 0 0 1 21 10.5v6.75A2.25 2.25 0 0 1 18.75 19.5H5.25A2.25 2.25 0 0 1 3 17.25V7.5Z"/>
                </svg>

                <!-- Заголовок -->
                <div class="text-2xl font-semibold text-gray-600">
                    Select a Project
                </div>

                <!-- Подзаголовок -->
                <div class="mt-1 text-sm text-gray-400">
                    Choose a project from the left menu to get started
                </div>

            </div>
        </div>


    </div>
@endsection
