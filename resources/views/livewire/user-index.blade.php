<div>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-left text-white">Email</th>
            <th class="border px-4 py-2 text-white">Register</th>
            <th class="border px-4 py-2 text-white">Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2 ">{{ $user->name }}</td>
                <td class="border px-4 py-2 ">{{ $user->email }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($user->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="bg-fuchsia-600 p-2 rounded-[50px] text-white" href="{{ route('user.edit', $user->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <a class="p-2 mx-2 bg-slate-600 rounded-[50px] text-white" href="{{ route('user.show', $user->id) }}">
                            @include('components.icons.view')
                        </a>

                        <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="userDelete({{ $user->id }})">
                            <button class="mb-1 p-2 rounded-[50px] bg-rose-600 text-white" type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">{{ $users->links() }}</div>
</div>
