<div class="flex items-center space-x-2">
    <x-button class="bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-xs px-3 py-1.5" href="{{route('admin.roles.edit', $role)}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>

    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <x-button type="submit" class="bg-red-600 hover:bg-red-700 focus:ring-red-500 text-xs px-3 py-1.5">
            <i class="fa-solid fa-trash"></i>
        </x-button>
    </form>

</div>
