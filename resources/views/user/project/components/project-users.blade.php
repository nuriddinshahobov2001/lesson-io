<div class="absolute left-[220px] px-4 pt-4">
    <div class="flex items-center gap-4">
        <h3 class="font-extrabold text-2xl">{{ $project->name }}</h3>
        <div class="flex -space-x-3 items-center">
            @php($users = $project->members)

            @if($users->isNotEmpty())
                @foreach ($users->take(3) as $user)
                    <a href="#"
                       class="w-10 h-10 rounded-full border-2 border-white overflow-hidden
                          transform transition duration-200 hover:scale-110 hover:z-10">
                        <img src="{{ asset($user->member->avatar)  }}"
                             alt="{{ $user->member->name }}"
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
                        <div class="absolute left-0 min-w-[250px] max-w-[300px] border border-slate-300 hidden group-hover:flex flex-col space-y-2
            bg-white p-2 rounded-lg shadow-lg z-20">

                            <button class="flex p-2 justify-start items-center cursor-pointer text-blue-500 font-semibold
                   hover:text-blue-600 transition duration-300">
                                Add member +
                            </button>

                            <div class="max-h-[400px] overflow-y-auto custom-scroll">
                                @foreach ($users as $user)
                                    <a href="#" class="flex gap-3 justify-between items-center hover:bg-slate-200 hover:rounded-sm px-2 py-1 transition">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset($user->member->avatar) }}"
                                                 alt="{{ $user->member->name }}"
                                                 class="w-10 h-10 rounded-full border-2 border-gray-200 transform transition duration-200 hover:scale-110">
                                            <span class="font-medium">{{ $user->member->name }}</span>
                                        </div>
                                        <span class="text-xs font-medium bg-yellow-100 px-2 py-1 rounded-sm text-yellow-800">
                {{ $user->role }}
            </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                @endif
            @else
                <div class="flex justify-center items-center cursor-pointer">
                    <div
                        class=" border border-blue-500 px-4 rounded-md py-1 text-blue-500 hover:text-white hover:bg-blue-500 transition duration-300">
                        Add member
                    </div>
                </div>
            @endif


        </div>
    </div>
</div>
