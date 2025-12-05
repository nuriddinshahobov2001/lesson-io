<div class="grid grid-cols-5 grid-rows-1 gap-4  mt-10">
    <div class="col-span-4 shadow-md">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Avatar</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tasks</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Role</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Registration Date</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 cursor-pointer">
                        <td class="px-4 py-2">
                            <img class="w-10 h-10 rounded-full" src="{{ asset($user->avatar) }}" alt="Avatar">
                        </td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ random_int(10,100) }}</td>
                        <td class="px-4 py-2">
                            @if($user->role  === 'admin')
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Admin</span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">User</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $user->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-start-5">
        <div class="min-h-full rounded shadow-md">
            <div class="p-6">
                <div class="flex flex-col items-center text-center gap-2">
                    <img class="w-[100px] h-[100px] rounded-full" src="https://i.pravatar.cc/100?img=2" alt="Avatar">
                    <span class="text-lg font-semibold">{{ auth()->user()->name }}</span>
                    <span class="text-sm font-light">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="mb-6">
                <div class="flex items-center justify-between border-b border-b-slate-400 px-4 py-2 mx-3">
                    <b class="text-blue-500">All task:</b>
                    <span>12</span>
                </div>
                <div class="flex items-center justify-between border-b border-b-slate-400 px-4 py-2 mx-3">
                    <b class="text-amber-500">In progress:</b>
                    <span>6</span>
                </div>
                <div class="flex items-center justify-between border-b border-b-slate-400 px-4 py-2 mx-3">
                    <b class="text-green-500">Completed:</b>
                    <span>5</span>
                </div>
                <div class="flex items-center justify-between border-b border-b-slate-400 px-4 py-2 mx-3">
                    <b class="text-red-500">Expired:</b>
                    <span>1</span>
                </div>
            </div>
        </div>
    </div>
</div>


