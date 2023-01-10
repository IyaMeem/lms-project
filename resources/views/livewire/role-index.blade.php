<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissons</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($roles as $role)
            <tr>
                <td class="border px-4 py-2">{{ $role->name }}</td>
                <td class="border px-4 py-2"></td>>
                    <div class="flex items-center justify-center">
                        <a href="{{ route('role.edit', $role->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <form class="mt-2" onsubmit="return confirm('Are you sure Delete it?');" wire:submit.prevent="roleDelete({{$role->id}})" action="">
                            <button type="submit">
                                  @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>

