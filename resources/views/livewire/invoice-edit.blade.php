<div>
    <h2 class="font-bold text-xl mb-2">Invoice Details</h2>
    <p class="mb-2">Invoice to: {{$invoice->user->name}}</p>

    <table class="table-auto w-full mb-5">
        <tr class="bg-emerald-500">
            <th class="border px-4 py-2 text-left text-white">Name</th>
            <th class="border px-4 py-2 text-center text-white">Price</th>
            <th class="border px-4 py-2 text-center text-white">Quantity</th>
            <th class="border px-4 py-2 text-right text-white">Total</th>
        </tr>

        @foreach($invoice->invItems as $item)
        <tr>
            <td class="border px-4 py-2 font-bold">{{$item->name}}</td>
            <td class="border px-4 py-2">${{number_format($item->price, 2)}}</td>
            <td class="border px-4 py-2">{{$item->quantity}}</td>
            <td class="border px-4 py-2 text-right font-bold">${{number_format($item->price * $item->quantity, 2)}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="border px-4 py-2 text-right font-bold">Subtotal</td>
            <td class="border px-4 py-2 text-right font-bold">${{number_format($invoice->amount()['total'], 2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="border px-4 py-2 text-right font-bold">Paid</td>
            <td class="border px-4 py-2 text-right font-bold">${{number_format($invoice->amount()['paid'], 2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="border px-4 py-2 text-right font-bold">Due</td>
            <td class="border px-4 py-2 text-right font-bold">${{number_format($invoice->amount()['due'], 2)}}</td>
        </tr>
    </table>




    @if($enableAddItem)
    <form class="mb-4" wire:submit.prevent="saveNewItem">
        <div class="flex mb-4">
            <div class="w-full">
                @include('components.form-field', [
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'placeholder' => 'Item name',
                    'required' => 'required',
                ])
            </div>

            <div class="min-w-max ml-4">
                @include('components.form-field', [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'placeholder' => 'Type price',
                    'required' => 'required',
                ])
            </div>

            <div class="min-w-max ml-4">
                @include('components.form-field', [
                    'name' => 'quantity',
                    'label' => 'Quantity',
                    'type' => 'number',
                    'placeholder' => 'Type quantity',
                    'required' => 'required',
                ])
            </div>


        </div>
        <div class="flex mb-4">
            @include('components.wire-loading-btn')

            <button wire:loading.remove type="submit" class=" py-2 px-5 mb-2 font-bold mr-3 text-white bg-indigo-700 rounded">Add</button>
            <button class="bg-red-500 py-2 px-5 mb-2 font-bold rounded text-white" wire:click="addNewItem" type="button">Cancel</button>
        </div>
    </form>
    @else
        <button class="px-3 py-2 bg-emerald-500 mt-4 rounded text-white font-bold mb-4" wire:click="addNewItem" class="underline">Add New Item</button>
    @endif


    <h3 class="font-bold text-xl mb-2">Payments</h3>
    <ul class="mb-3">
        @foreach($invoice->payments as $payment)
        <li>{{date('F j, Y - g:i:a', strtotime($payment->created_at))}} - ${{number_format($payment->amount, 2)}} - transaction ID: {{$payment->transaction_id}} <button wire:click="refund({{$payment->id}})" class="bg-red-500 rounded text-white px-3 py-2 text-xs">Refund</button></li>
        @endforeach
    </ul>
</div>

