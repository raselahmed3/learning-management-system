<div>
    <h1 class="text-white bg-gray-500 p-4 rounded-full inline-block">{{$count}}</h1>
   <div class="flex mt-6">
       <button wire:click="incrementOrDecrement('increment')" type="button" class="bg-green-500 text-white mr-2 py-2 px-4 rounded">
           incriment
       </button>
       <button wire:click="incrementOrDecrement('decrement')" type="button" class="bg-red-500 text-white py-2 px-4 rounded">
           decriment
       </button>
   </div>
</div>
