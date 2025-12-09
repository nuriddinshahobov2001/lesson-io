<x-menu.item
    url="{{ route('dashboard-user.index') }}"
    title="Dashboard"
    active="{{ request()->is('user/dashboard-user*') }}"
/>

<x-menu.item
    url="{{ route('projects-user.index') }}"
    title="Project"
    active="{{ request()->is('user/projects-user*') }}"
/>
{{--<x-menu.item--}}
{{--    url="{{ route('tasks-user.index') }}"--}}
{{--    title="Tasks"--}}
{{--    active="{{ request()->is('admin/tasks*') }}"--}}
{{--/>--}}
<x-menu.item
    url="#"
    title="{{ auth()->user()->name }}"
/>
