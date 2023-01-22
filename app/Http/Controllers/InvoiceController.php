<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Facades\Invoice as FacadesInvoice;

class InvoiceController extends Controller
{
    public function index() {
        return view('invoice.index');
    }

    public function show($id) {
        $DBinvoice = Invoice::findOrFail($id);

        $customer = new Buyer([
            'name'          => $DBinvoice->user->name,
            'custom_fields' => [
                'email' => $DBinvoice->user->email
            ],
        ]);

        $invItems = [];
        foreach($DBinvoice->invItems as $item) {
            $invItems[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);
        }

        $invoice = FacadesInvoice::make()
            ->buyer($customer)
            ->addItems($invItems)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->date(now()->subWeeks(3))
            ->serialNumberFormat('{SEQUENCE}/{SERIES}');

        return $invoice->stream();
    }

    public function edit($id)
    {
        return view("invoice.edit", [
            'invoice_id' => $id
        ]);
    }
}
