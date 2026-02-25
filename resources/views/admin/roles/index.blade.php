<x-admin-layout title="Roles" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles',
        'route' => route('admin.roles.index'),
    ],
]">

    @livewire('admin.datatables.role-table')

</x-admin-layout>
