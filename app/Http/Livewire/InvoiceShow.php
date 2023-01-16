<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Stripe\StripeClient;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceShow extends Component
{
    public $invoice_id;
    public $invoice;
    public $modal = false;
    public $name;
    public $amount;
    public $quantity;
    public $modelPayment;
    public $cardNo =  4242424242424242;
    public $expireDate = '12/34';
    public $ccvNumber = '567';
    public $paymentAmount =100;
    public $type;
    public $invoiceItem_id;


    public $rules = [
        'name' => 'required',
        'amount' => 'required',
        'quantity' => 'required',
    ];
    public function mount(){
        $this->invoice = Invoice::findOrFail($this->invoice_id);
        $this->paymentAmount = number_format($this->invoice->amount()['due'],2);
    }
    public function render()
    {
        return view('livewire.invoice-show');
    }

    public function toggleModal($type){
        if ($type == 'invoice'){
            $this->modal = !$this->modal;
        }elseif ($type == 'payment'){
            $this->modelPayment = !$this->modelPayment;
        }
    }

    public function addInvoice(){
        $this->validate();
       if ($this->type == 'edit'){
           $invoiceItem = InvoiceItem::findOrFail($this->invoiceItem_id);
           $invoiceItem->name = $this->name;
           $invoiceItem->price = $this->amount;
           $invoiceItem->quantity = $this->quantity;
           $invoiceItem->invoice_id = $this->invoice_id;
           $invoiceItem->save();
           flash()->addSuccess('InvoiceItem Update successfully');
       }else{
           $invoiceItem = new InvoiceItem();
           $invoiceItem->name = $this->name;
           $invoiceItem->price = $this->amount;
           $invoiceItem->quantity = $this->quantity;
           $invoiceItem->invoice_id = $this->invoice_id;
           $invoiceItem->save();
           flash()->addSuccess('InvoiceItem added successfully');
       }
        $this->toggleModal('invoice');

        return redirect()->route('invoice-show',$this->invoice_id);
    }

    public function payment(){
        $validation = Validator::make([
                'cardNo' => $this->cardNo,
                'expireDate' => $this->expireDate,
                'ccvNumber' => $this->ccvNumber,
                'paymentAmount' => $this->ccvNumber,
             ], [
            'cardNo' => 'required',
            'expireDate' => 'required',
            'ccvNumber' => 'required',
            'paymentAmount' => 'required',
          ]);
        if($validation->fails()){
           flash()->addWarning('Fill all fields with appropriate data');
           return true;
        }else{
           $stripe = new StripeClient(env('STRIPE_SECRET'));

          try {
              $token = $stripe->tokens->create([
                  'card' => [
                      'number' => $this->cardNo,
                      'exp_month' => explode('/', $this->expireDate)[0],
                      'exp_year' => explode('/', $this->expireDate)[1],
                      'cvc' => $this->ccvNumber,
                  ],
              ]);
          }catch(\Exception $e){
              flash()->addWarning('Card Number Not Found!');
              return true;
          }

            $charge = $stripe->charges->create([
                'card' => $token->id,
                'currency' => 'USD',
                'amount' => intval($this->paymentAmount *100),
                'description' => 'Invoice #'.$this->invoice->id,
            ]);

            $invoicePayment = new Payment();

            $invoicePayment->amount = $this->paymentAmount;
            $invoicePayment->invoice_id = $this->invoice->id;
            $invoicePayment->transaction_id = $charge->id;
            $invoicePayment->save();

            flash()->addSuccess('Payment Successfully!');

            return redirect()->route('invoice-show',$this->invoice_id);
        }


    }
    public function invoiceItemDelete($id){
         $invoiceItem = InvoiceItem::findOrFail($id);

         $invoiceItem->delete();

         flash()->addSuccess('Invoice Item deleted  successfully');

        return redirect()->route('invoice-show',$this->invoice_id);
    }

    public function refund($id){
        $paymentItem = Payment::findOrFail($id);
        if(strlen($paymentItem->transaction_id) === 8){
            $paymentItem->delete();

            flash()->addSuccess('Cash Refund successfully');
            return redirect()->route('invoice-show',$this->invoice_id);
        }else{
            $stripe = new StripeClient(env('STRIPE_SECRET'));
           try{
               $stripe->refunds->create([
                   'charge' => $paymentItem->transaction_id,
               ]);

               $paymentItem->delete();
               flash()->addSuccess('Payment Refund successfully');
               return redirect()->route('invoice-show',$this->invoice_id);
           }catch(\Exception $e){
               flash()->addError('Something went wrong');
            }
        }
    }

    public function invoiceItemEdit($id){
        $this->type = 'edit';
        $this->invoiceItem_id = $id;
        $invoiceItem = InvoiceItem::findOrFail($id);
        $this->name = $invoiceItem->name;
        $this->amount = $invoiceItem->price;
        $this->quantity = $invoiceItem->quantity;
        $this->toggleModal('invoice');

    }

}
