@extends('layout.app')

@section('title', 'Register')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>

            @include('components.alerts.errors')
            @include('components.alerts.success')

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-form.input
                    id="name"
                    name="name"
                    type="name"
                    label="Name"
                    placeholder="Enter name"
                    class="mb-4"
                    required
                />

                <x-form.input
                    id="email"
                    name="email"
                    type="email"
                    label="E-mail"
                    placeholder="Enter e-mail"
                    class="mb-4"
                    required
                />

                <x-form.input
                    id="password"
                    name="password"
                    type="password"
                    label="Password"
                    placeholder="Enter password"
                    class="mb-4"
                    required
                />

                <x-form.input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    label="Confirmation password"
                    placeholder="Confirmation password"
                    class="mb-4"
                    required
                />

                <x-form.button variant="primary">Register</x-form.button>

                <p class="mt-4 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Login</a>
                </p>
            </form>
        </div>
    </section>
@endsection



