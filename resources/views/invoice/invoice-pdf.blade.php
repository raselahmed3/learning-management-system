<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        .p-16 {
            padding: 4rem;
        }
        .relative {
            position: relative;
        }
        .justify-between {
            justify-content: space-between;
        }
        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
        .font-bold {
            font-weight: 700;
        }
        .mt-4 {
            margin-top: 1rem;
        }
        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }
        .text-gray-900 {
            color:rgb(17 24 39);
        }
        .red{
            color:red;
        }
        .w-1 {
            width: 25%;
        }
        .table{
            display:table;
        }
        .w-full {
            width: 100%;
        }
        .mb-2 {
            margin-bottom: 0.5rem;
        }
        .p-2 {
            padding: 0.5rem;
        }
        table {
            text-indent: 0;
            /* 1 */
            border-color: inherit;
            /* 2 */
            border-collapse: collapse;
            /* 3 */
        }
        .bg{
            background-color: rgb(136 19 55);
        }
        .border{
            border: 1px solid #333;
        }
        .border-b{
            border-bottom: 1px solid #333;
        }
        .border-r{
            border-right: 1px solid #333;
        }
        .content {
            position: relative;
        }

        .content2 {
            position: absolute;
            width: 200px;
            right: 0;
        }

        .block {
            display: block;
            margin-bottom:7px
        }

        .inline {
-            display: inline-block;
        }
        .shadow.px-10.py-4.w-72 {
            margin-top: 11px;
        }
    </style>
</head>
<body>
<div>
    <div class="p-16">
        <div class="relative">
            <div>
                <div style="float: left" class="text-2xl font-bold">Invoice #{{$invoice['id']}}</div>
                <div style="float: right">
                    <div class="mt-4">
                        <div class="text-lg text-gray-900">Learning Management System</div>
                        <div class="text-gray-600">2XCR+MRM, Bheramara Shapla Cottor </br> Bus Station</div>
                    </div>
                    <div class="text-gray-500">{{date('F j,Y',strtotime(now()))}}</div>
                </div>
            </div>
            <div style="clear: both" class="w-1">
                <div class="text-lg text-gray-900 mb-2">Bill to</div>
                <address class="text-gray-600 italic">
                    <p class="mb-2"><span>Name: </span>{{$invoice['user']['name']}}</p>
                    <p><span>Email: </span>{{$invoice['user']['email']}}</p>
                </address>
            </div>
            <!-- Table -->
            <div class="table w-full p-2 mt-4">
                <table class="w-full border">
                    <thead>
                    <tr class="bg-gray-50  border-b">
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Name
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Quantity
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Price
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Total
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice['invoice_items'] as $invoiceItem)
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="p-2 border-r text-left px-4">{{$invoiceItem['name']}}</td>
                            <td class="p-2 border-r text-left px-4">{{$invoiceItem['quantity']}}</td>
                            <td class="p-2 border-r text-left px-4">{{number_format($invoiceItem['price'],2)}}</td>
                            <td class="p-2 border-r text-left px-4">{{number_format($invoiceItem['price'] * $invoiceItem['quantity'],2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h3 class="text-lg">Payment Details</h3>
            <div class="table w-full p-2 mt-4">
                <table class="w-full border">
                    <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Date
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Transaction ID
                            </div>
                        </th>

                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Amount
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice['payments'] as $payment)
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="p-2 border-r text-left px-4">{{date('F j,Y h:i:s A',strtotime($payment['created_at']))}}</td>
                            <td class="p-2 border-r text-left px-4">{{$payment['transaction_id']}}</td>
                            <td class="p-2 border-r text-left px-4">${{number_format($payment['amount'],2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div  class="w-full content">
                    <div class="content2">
                        <div class="shadow px-10 py-4 w-72">
                            <div class="block">
                                <span  class="inline">Subtotal:</span>
                                <span class="inline">${{number_format($invoice['total'],2)}}</span>
                            </div>
                            <div class="block">
                                <span  class="inline">Paid:</span>
                                <span  class="inline">-${{number_format($invoice['paid'],2)}}</span>
                            </div>
                            <div class="block">
                                <span class="inline">Due:</span>
                                <span  class="inline">${{number_format($invoice['due'],2)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
