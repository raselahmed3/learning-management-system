<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class InvoiceController extends Controller
{
    public function index(){
        return view('invoice.index');
    }

    public function show($id){

//        $invoiceItem = Invoice::findOrFail($id);
//
//        $seller = User::role('Super Admin')->get();
//
//        $customer = new Buyer([
//            'name'          =>  $invoiceItem->user->name,
//            'custom_fields' => [
//                'email' => $invoiceItem->user->email,
//            ],
//        ]);
//
//        $client = new Party([
//            'name'          => $seller[0]->name,
//            'custom_fields' => [
//                'email'  => $seller[0]->email,
//            ],
//        ]);
//
//        $items = [];
//        foreach ($invoiceItem->invoiceItems as $item) {
//            $items[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price);
//        }
//        foreach ($invoiceItem->payments as $item) {
//            $items[] = (new InvoiceItem())->title('Payment')->pricePerUnit(-($item->amount));
//        }
//        $dueDate = strtotime($invoiceItem->due_date ) - strtotime(now());
//
//        $invoice = \LaravelDaily\Invoices\Facades\Invoice::make()
//            ->buyer($customer)
//            ->seller($client)
//            ->payUntilDays($dueDate / 86400)
//            ->currencySymbol('$')
//            ->addItems($items);
//
//        return $invoice->stream();

        return view('invoice.show',['id'=>$id]);
    }

    public function invoiceDownload($id){
        $invoiceMain = Invoice::with(['user','invoiceItems','payments'])->findOrFail($id);

        $invoice = $invoiceMain->toArray();
        $invoice['total'] = $invoiceMain->amount()['amount'];
        $invoice['paid'] = $invoiceMain->amount()['paid'];
        $invoice['due'] = $invoiceMain->amount()['due'];
        //return var_dump($invoice);
        $pdf = Pdf::loadView('invoice.invoice-pdf',  compact('invoice'));
        return $pdf->download('invoice.pdf');

    }
}
