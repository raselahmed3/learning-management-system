<div>
    <div class="p-16">
        <div class="flex justify-between items-center mb-4">
            <a href="{{route('invoice-download',$invoice_id)}}" class="inline-block  text-white bg-yellow-700 hover:bg-blue-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 cursor-pointer text-center" type="button">
                Download
            </a>
            <butto wire:click="toggleModal('invoice')" class="inline-block  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 cursor-pointer text-center" type="button">
                Add Invoice
            </butto>
        </div>
        <div class="relative">
            <div class="flex justify-between">
                <div class="text-2xl font-bold">Invoice #{{$invoice->id}}</div>
                <div class="">
                    <svg class="w-6 h-6" viewBox="0 0 39 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M38.1622 1.47093L22.6807 5.26078C22.5339 5.29495 22.3817 5.2995 22.2331 5.27414C22.0844 5.24879 21.9424 5.19404 21.8152 5.11312L14.4967 0.331871C14.3629 0.244902 14.2118 0.187926 14.0539 0.164864C13.896 0.141802 13.7349 0.153201 13.5819 0.198277L0.915185 3.92484C0.799036 3.95271 0.695356 4.01814 0.620271 4.11096C0.545186 4.20379 0.502904 4.3188 0.5 4.43812V12.0178L13.5819 8.17171C13.7349 8.12664 13.896 8.11524 14.0539 8.1383C14.2118 8.16136 14.3629 8.21834 14.4967 8.30531L21.8152 13.0795C21.941 13.1635 22.0831 13.2201 22.2322 13.2455C22.3814 13.271 22.5342 13.2647 22.6807 13.2272L38.5 9.36V1.72406C38.4982 1.65256 38.4684 1.5846 38.4172 1.53469C38.3659 1.48477 38.2971 1.45685 38.2256 1.45687L38.1622 1.47093Z" fill="#FF7F66"></path>
                        <path d="M28.8241 19.7311L22.6808 21.2077C22.5341 21.2435 22.3816 21.2488 22.2327 21.2234C22.0838 21.198 21.9417 21.1424 21.8152 21.06L14.4967 16.2788C14.4675 16.2581 14.4344 16.2437 14.3995 16.2364C14.3645 16.2291 14.3284 16.2291 14.2934 16.2364C14.2584 16.2436 14.2253 16.258 14.1961 16.2786C14.1669 16.2992 14.1423 16.3256 14.1237 16.3561C14.0913 16.3957 14.0739 16.4455 14.0745 16.4967V23.6897C14.0742 23.7776 14.096 23.8642 14.1378 23.9415C14.1796 24.0189 14.2401 24.0846 14.3137 24.1327L21.8152 29.0545C21.9422 29.1358 22.0846 29.1901 22.2334 29.2143C22.3823 29.2385 22.5345 29.232 22.6808 29.1952L29.176 27.6413C30.2256 27.388 31.1601 26.7905 31.8298 25.9441C32.4995 25.0977 32.8659 24.0515 32.8704 22.9725V22.8248C32.8574 21.9645 32.5034 21.1445 31.8859 20.5447C31.2685 19.9449 30.4381 19.6144 29.5771 19.6256C29.323 19.6331 29.0705 19.6685 28.8241 19.7311Z" fill="#FF7F66"></path>
                        <path d="M28.8241 35.678L22.6808 37.1545C22.5339 37.1887 22.3817 37.1933 22.2331 37.1679C22.0845 37.1426 21.9424 37.0878 21.8152 37.0069L14.4967 32.2256C14.4676 32.2057 14.4349 32.1916 14.4004 32.1844C14.3658 32.1771 14.3302 32.1767 14.2956 32.1832C14.2609 32.1898 14.2279 32.2031 14.1984 32.2224C14.1689 32.2418 14.1435 32.2668 14.1237 32.296C14.0917 32.3386 14.0745 32.3904 14.0745 32.4436V39.6366C14.0742 39.7245 14.096 39.8111 14.1378 39.8884C14.1796 39.9658 14.24 40.0315 14.3137 40.0795L21.8152 45.0014C21.941 45.0854 22.0831 45.142 22.2322 45.1674C22.3814 45.1929 22.5342 45.1866 22.6808 45.1491L29.1759 43.5881C30.2268 43.3372 31.1626 42.7402 31.8328 41.8934C32.5029 41.0465 32.8684 39.999 32.8704 38.9194V38.7717C32.8574 37.9114 32.5034 37.0914 31.8859 36.4916C31.2685 35.8918 30.4381 35.5612 29.5771 35.5725C29.3227 35.5766 29.0698 35.612 28.8241 35.678Z" fill="#FF7F66"></path>
                        <path opacity="0.32" d="M22.2163 29.1881V21.2498C22.3695 21.2815 22.5276 21.2815 22.6808 21.2498L25.3267 20.5467L26.8748 28.1405L22.6526 29.167C22.5103 29.205 22.3616 29.2122 22.2163 29.1881ZM28.423 35.7483L22.6808 37.1545C22.5276 37.1862 22.3695 37.1862 22.2163 37.1545V45.1561C22.3695 45.1877 22.5276 45.1877 22.6808 45.1561L29.9711 43.3702L28.423 35.7483ZM22.2163 13.2483C22.3695 13.2799 22.5276 13.2799 22.6808 13.2483L23.7856 12.9811L22.2163 5.27484V13.2483Z" fill="#111928"></path>
                        <g opacity="0.16">
                            <path opacity="0.16" d="M14.0745 8.1436C14.2237 8.17206 14.3667 8.22682 14.4967 8.30532L21.8152 13.0866C21.936 13.1668 22.0729 13.2196 22.2163 13.2413V5.26782C22.0729 5.24617 21.936 5.19337 21.8152 5.11314L14.4967 0.331885C14.3667 0.253384 14.2237 0.198624 14.0745 0.170166V8.1436Z" fill="#111928"></path>
                            <path opacity="0.16" d="M22.2163 37.1686C22.0738 37.14 21.9377 37.0851 21.8152 37.0069L14.4967 32.2256C14.436 32.1856 14.3619 32.1713 14.2907 32.1858C14.2194 32.2003 14.1569 32.2424 14.1167 32.303C14.089 32.3447 14.0743 32.3936 14.0745 32.4436V39.6366C14.0742 39.7245 14.096 39.8111 14.1378 39.8884C14.1796 39.9658 14.24 40.0315 14.3137 40.0795L21.8152 45.0014C21.9387 45.0763 22.0745 45.1287 22.2163 45.1561V37.1686Z" fill="#111928"></path>
                            <path opacity="0.16" d="M14.4967 16.2788C14.436 16.2388 14.3619 16.2244 14.2907 16.2389C14.2194 16.2534 14.1569 16.2956 14.1167 16.3561C14.089 16.3978 14.0743 16.4467 14.0745 16.4968V23.6897C14.0742 23.7776 14.096 23.8642 14.1378 23.9416C14.1796 24.0189 14.24 24.0846 14.3137 24.1327L21.8152 29.0546C21.9376 29.1317 22.0738 29.1843 22.2163 29.2093V21.2499C22.0725 21.2257 21.9356 21.1705 21.8152 21.0882L14.4967 16.2788Z" fill="#111928"></path>
                        </g>
                    </svg>
                    <div class="mt-4">
                        <div class="text-lg text-gray-900">Learning Management System</div>
                        <div class="text-gray-600">2XCR+MRM, Bheramara Shapla Cottor </br> Bus Station, ভেড়ামারা - দৌলতপুর </br> - মেহেরপুর সড়ক, ভেড়ামারা</div>
                    </div>
                    <div class="text-gray-500">{{date('F j,Y',strtotime(now()))}}</div>
                </div>
            </div>
            <div class="w-1/4">
                <div class="text-lg text-gray-900 mb-2">Bill to</div>
                <address class="text-gray-600 italic">
                  <p class="mb-2"><span>Name: </span>{{$invoice->user->name}}</p>
                  <p><span>Email: </span>{{$invoice->user->email}}</p>
                </address>
            </div>
            <!-- Table -->
            <div class="table w-full p-2 mt-4">
                <table class="w-full border">
                    <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Name
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Quantity
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Price
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Total
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Action
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice->invoiceItems as $invoiceItem)
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="p-2 border-r text-left px-4">{{$invoiceItem->name}}</td>
                            <td class="p-2 border-r text-left px-4">{{$invoiceItem->quantity}}</td>
                            <td class="p-2 border-r text-left px-4">{{number_format($invoiceItem->price,2)}}</td>
                            <td class="p-2 border-r text-left px-4">{{number_format($invoiceItem->price * $invoiceItem->quantity,2)}}</td>
                            <td class="flex items-center justify-center">
                                <button wire:click="invoiceItemEdit({{$invoiceItem->id}})" class="bg-blue-500 mx-2 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.edit')</button>
                                <form wire:submit.prevent="invoiceItemDelete({{$invoiceItem->id}})" class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                                    <button onclick="return confirm('you are sure to delete!')" type="submit">@include('components.icons.trash')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="w-full mr-4 mt-2  flex justify-end">
                    <div class="shadow px-10 py-4 w-72">
                        <div class="flex gap-4 items-center">
                            <div class="text-lg font-medium">Subtotal:</div>
                            <div class="text-gray-600">${{number_format($invoice->amount()['amount'],2)}}</div>
                        </div>
                       <div class="flex gap-4 items-center">
                           <div class="text-lg font-medium">Paid:</div>
                           <div class="text-gray-600">-${{number_format($invoice->amount()['paid'],2)}}</div>
                       </div>
                        <div class="flex gap-4 items-center">
                            <div class="text-lg font-medium">Due:</div>
                            <div class="text-gray-600">${{number_format($invoice->amount()['due'],2)}}</div>
                        </div>
                    </div>
                </div>
            </div>
           <div class="flex py-4 items-center justify-between">
               <h3 class="text-lg">Payment Details</h3>
               @if ($invoice->amount()['due']>0)
               <button wire:click="toggleModal('payment')" class="lms-btn bg-green-600 !mt-0" type="button">Payment Now</button>
               @endif
           </div>
            <div class="table w-full p-2 mt-4">
                <table class="w-full border">
                    <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Date
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Transaction ID
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>

                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Amount
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Action
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice->payments as $payment)
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="p-2 border-r text-left px-4">{{date('F j,Y h:i:s A')}}</td>
                            <td class="p-2 border-r text-left px-4">{{$payment->transaction_id}}</td>
                            <td class="p-2 border-r text-left px-4">${{number_format($payment->amount,2)}}</td>
                            <td class="p-2 border-r text-left px-4">
                                <button wire:click="refund({{$payment->id}})" type="button" class="py-1 px-4 rounded bg-red-500 text-white">Refund</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Main modal for Invoice -->
    @if ($modal)
    <div class="fixed inset-0 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto  h-modal md:h-full">
        <div class="bg-gray-700 opacity-75 absolute top-0 left-0 h-full w-full"></div>
        <div class="relative w-full h-full max-w-md opacity-100 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <button wire:click="toggleModal('invoice')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 ">@if($type == 'edit') Edit @else Add @endif Invoice</h3>
                    <form class="space-y-6" wire:submit.prevent="addInvoice">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Invoice Name</label>
                            <input type="text" wire:model="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type Invoice Name" required>
                        </div>
                        <div>
                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Invoice Amount</label>
                            <input type="number" step=".01"  wire:model="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type Invoice amount" required>
                        </div>
                        <div>
                            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Invoice Quantity</label>
                            <input type="number"  wire:model="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type Invoice quantity" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">@if($type == 'edit') Update @else Save @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal for Payment -->
    @if ($modelPayment)
        <div class="fixed inset-0 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto  h-modal md:h-full">
            <div class="bg-gray-700 opacity-75 absolute top-0 left-0 h-full w-full"></div>
            <div class="relative w-full h-full max-w-md opacity-100 md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <button wire:click="toggleModal('payment')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="authentication-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 ">Payment</h3>
                        <form class="space-y-6" wire:submit.prevent="payment">
                            <div>
                                <label for="card_no" class="block mb-2 text-sm font-medium text-gray-900">Card Number</label>
                                <input type="text" wire:model="cardNo" id="card_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Payment Card Number" required>
                            </div>
                            <div>
                                <label for="expireDate" class="block mb-2 text-sm font-medium text-gray-900">Payment Expire Date</label>
                                <input type="text"  wire:model="expireDate" id="expireDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Expire Moth/Year" required>
                            </div>
                            <div>
                                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">CCV Number</label>
                                <input type="number"  wire:model="ccvNumber" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="CCV Number" required>
                            </div>
                            <div>
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Payment Amount</label>
                                <input type="number"  wire:model="paymentAmount" max="{{number_format($invoice->amount()['due'],2)}}" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Payment Amount" required>
                            </div>
                            @include('components.form-submit-btn',[
                               'target' =>'payment',
                               'class' => 'bg-green-500',
                               'buttonText'=>'Payment'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
