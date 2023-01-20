<div>
    <table class="w-full table-auto">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">ID</th>
            <th class="border px-4 py-2 text-left text-white">User</th>
            <th class="border px-4 py-2 text-left text-white">Due Date</th>
            <th class="border px-4 py-2 text-white">Amount</th>
            <th class="border px-4 py-2 text-white">Paid</th>
            <th class="border px-4 py-2 text-white">Due</th>
            <th class="border px-4 py-2 text-white">Actions</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2 ">{{ $invoice->id }}</td>
                <td class="border px-4 py-2 ">{{ $invoice->user->name }}</td>
                <td class="border px-4 py-2 ">{{ date('F j, Y', strtotime($invoice->due_date)) }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['total'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['paid'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['due'] }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="bg-blue-600 p-2 rounded-[50px] text-white" href="">
                            @include('components.icons.edit')
                        </a>

                        <a class="p-2 mx-2 bg-slate-600 rounded-[50px] text-white" href="{{ route('invoice-show', $invoice->id) }}">
                            @include('components.icons.view')
                        </a>

                        <form onclick="return confirm('Are you sure?')" wire:submit.prevent="invoiceDelete({{ $invoice->id }})">
                            <button class="mb-1 p-2 rounded-[50px] bg-rose-600 text-white" type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">{{ $invoices->links() }}</div>
</div>
