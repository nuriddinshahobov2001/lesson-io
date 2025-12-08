<header class="bg-gray-800 text-white">
    <div class=" mx-auto flex justify-between items-center p-4 px-6">
        <a href="{{ route('dashboard.index') }}"
           class="text-xl font-bold">
            Team Task Manager
        </a>

        <nav class="flex items-center gap-4">
            @auth
                @if(request()->user()->role === 'admin')
                    @include('layout.admin-header')
                @else
                    @include('layout.user-header')
                @endif
                <div class="py-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-white cursor-pointer border border-slate-200 rounded-sm hover:bg-slate-200 hover:text-gray-800 transition duration-300">
                            Logout
                        </button>
                    </form>
                </div>

            @else
                <a href="{{ route('login.form') }}" class="hover:underline">
                    Вход
                </a>
                <a href="{{ route('register.form') }}" class="hover:underline">
                    Регистрация
                </a>
            @endauth
        </nav>
    </div>
</header>
