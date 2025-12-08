<div class="absolute left-[220px] px-4 pt-4">
    <div class="flex items-center gap-4">
        <h3 class="font-extrabold text-2xl">{{ $project->name }}</h3>
        <div class="flex -space-x-3 items-center">
            @php
                $users = [
                    ['name' => 'John Doe',     'avatar' => 'https://i.pravatar.cc/100?img=1'],
                    ['name' => 'Sarah Smith',  'avatar' => 'https://i.pravatar.cc/100?img=2'],
                    ['name' => 'Michael Ray',  'avatar' => 'https://i.pravatar.cc/100?img=3'],
                    ['name' => 'Anna Brown',   'avatar' => 'https://i.pravatar.cc/100?img=4'],
                    ['name' => 'Tom Walker',   'avatar' => 'https://i.pravatar.cc/100?img=5'],
                    ['name' => 'Emily Clark',  'avatar' => 'https://i.pravatar.cc/100?img=6'],
                ];
            @endphp
            {{-- Первые 3 аватара --}}
            @foreach (array_slice($users, 0, 3) as $user)
                <a href="#"
                   class="w-10 h-10 rounded-full border-2 border-white overflow-hidden
                          transform transition duration-200 hover:scale-110 hover:z-10">
                    <img src="{{ $user['avatar'] }}"
                         alt="{{ $user['name'] }}"
                         class="w-full h-full object-cover">
                </a>
            @endforeach
            {{-- +N аватар --}}
            @if (count($users) > 3)
                <div class="relative group">
                    <div class="w-10 h-10 bg-gray-300 text-sm font-semibold flex items-center justify-center
                                rounded-full border-2 border-white cursor-pointer">
                        +{{ count($users) - 3 }}
                    </div>

                    {{-- Всплывающий список с остальными аватарами --}}
                    <div class="absolute left-0 w-[200px] hidden group-hover:flex flex-col space-y-2
                                bg-white p-2 rounded-lg shadow-lg z-20">
                        @foreach (array_slice($users, 3) as $user)
                            <a href="#"
                               class="flex gap-3 items-center hover:bg-slate-200 hover:rounded-sm">
                                <img src="{{ $user['avatar'] }}"
                                     alt="{{ $user['name'] }}"
                                     class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-200
                                      transform transition duration-200 hover:scale-110">
                                {{ $user['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
