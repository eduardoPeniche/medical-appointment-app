@php

$links = [
    [
        'icon' => 'fa-solid fa-gauge',
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
        'active' => request()->routeIs('admin.dashboard'),
    ],
    [
        'header' => 'Gestión'
    ],
    [
        'icon' => 'fa-solid fa-shield-halved',
        'name' => 'Roles y Permisos',
        'href' => route('admin.roles.index'),
        'active' => request()->routeIs('admin.roles.*'),
    ],
];
@endphp

<aside id="top-bar-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
        <a href="/" class="flex items-center ps-2.5 mb-5">
            <img src="https://50061841.fs1.hubspotusercontent-na1.net/hub/50061841/hubfs/Frame%202%20(1).png?width=108&height=108" class="h-6 me-3" alt="Meditec Logo" />
            <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">Meditec</span>
        </a>
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    {{-- Revisar si existe la llave header --}}
                    @isset($link['header'])
                        <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                            {{ $link['header'] }}
                        </div>
                        {{-- Si no existe, usa la etiqueta como estaba definida antes --}}
                    @else
                        <a href="{{ $link['href'] }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">
                            <span class="w-6 h-6 inline-flex justify-center items-center text-gray-500">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    @endisset
                </li>
            @endforeach
        </ul>
    </div>
</aside>
