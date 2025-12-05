@extends('layout.app')

@section('title', 'Access Forbidden')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-80px)]">
        <div class="bg-white p-10 rounded-xl shadow-lg text-center max-w-md w-full">
            <h1 class="text-6xl font-extrabold text-red-500 mb-4">403</h1>
            <h2 class="text-2xl font-semibold mb-4">Access Forbidden</h2>
            <p class="text-gray-600 mb-6">
                You do not have permission to access this page.
            </p>

{{--            <a href=""--}}
{{--               class="inline-block px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">--}}
{{--                Go Home--}}
{{--            </a>--}}
        </div>
    </div>

@endsection
