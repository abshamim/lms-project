<div>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-left text-white">Permissions</th>
            <th class="border px-4 py-2 text-white">Actions</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td class="border px-4 py-2 ">{{ $role->name }}</td>
                <td class="border px-4 py-2 ">
                    @foreach ($role->permissions as $permission)
                        <span class="mb-1 inline-block text-white px-1 bg-blue-500 rounded">{{ $permission->name }}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="bg-blue-600 p-2 rounded-[50px] text-white" href="{{ route('role.edit', $role->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="roleDelete({{ $role->id }})">
                            <button class="mb-1 p-2 ml-3 rounded-[50px] bg-rose-600 text-white" type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

</div>

