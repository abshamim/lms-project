<div>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-left text-white">Email</th>
            <th class="border px-4 py-2 text-left text-white">Phone</th>
            <th class="border px-4 py-2 text-white">Register</th>
            <th class="border px-4 py-2 text-white">Actions</th>
        </tr>
        @foreach ($leads as $lead)
            <tr>
                <td class="border px-4 py-2 ">{{ $lead->name }}</td>
                <td class="border px-4 py-2 ">{{ $lead->email }}</td>
                <td class="border px-4 py-2 ">{{ $lead->phone }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($lead->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="bg-fuchsia-600 p-2 rounded-[50px] text-white" href="{{ route('lead.edit', $lead->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <a class="p-2 mx-2 bg-slate-600 rounded-[50px] text-white" href="{{ route('lead.show', $lead->id) }}">
                            @include('components.icons.view')
                        </a>

                        <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="leadDelete({{ $lead->id }})">
                            <button class="mb-1 p-2 rounded-[50px] bg-rose-600 text-white" type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">{{ $leads->links() }}</div>
</div>
