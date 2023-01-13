<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Register</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($leads as $lead)
            <tr>
                <td class="border px-4 py-2 ">{{ $lead->name }}</td>
                <td class="border px-4 py-2 ">{{ $lead->email }}</td>
                <td class="border px-4 py-2 ">{{ $lead->phone }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($lead->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('lead.edit', $lead->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <a class="px-3" href="{{ route('lead.show', $lead->id) }}">
                            @include('components.icons.view')
                        </a>

                        <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="leadDelete({{ $lead->id }})">
                            <button class="mb-1" type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
