<x-menu.item
    url="{{ route('dashboard.index') }}"
    title="Dashboard"
    active="{{ request()->is('admin/dashboard*') }}"
/>
<x-menu.item
    url="{{ route('projects.index') }}"
    title="Projects"
    active="{{ request()->is('admin/projects*') }}"
/>
<x-menu.item
    url="#"
    title="{{ auth()->user()->name }}"
/>
