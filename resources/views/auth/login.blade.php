@extends('layout.app')

@section('title', 'Login')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
            @include('components.alerts.errors')
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <x-form.input
                    id="email"
                    name="email"
                    type="email"
                    label="E-mail"
                    placeholder="Enter e-mail"
                    required
                />

                <x-form.input
                    id="password"
                    name="password"
                    type="password"
                    label="Password"
                    placeholder="Enter password"
                    required
                />
                <x-form.checkbox
                    id="remember"
                    name="remember"
                    label="Remember me"
                />
                <x-form.button variant="primary">Login</x-form.button>

                <p class="mt-4 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">Register</a>
                </p>
            </form>
        </div>
    </section>
@endsection



