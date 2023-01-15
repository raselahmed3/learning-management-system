<div>
    <form class="p-4" wire:submit.prevent="editQuiz">
        <div class="flex w-full">
            @include('components.input-form',['name'=>'name','type'=>'text','label' => 'Name', 'placeholder'=>'Type Question Name'])
        </div>

        @include('components.form-submit-btn',[
            'target' =>'editQuiz',
            'class' => 'bg-green-500 ml-3',
            'buttonText'=>'Update'
        ])
    </form>
    @if (count($questions)>0)
    <form class="p-4" wire:submit.prevent="addQuestion">
        <div class="min-w-max ml-3">
            <label for="question" class="block mb-2 text-sm font-medium text-gray-900">Add Question</label>
            <select wire:model="question" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach($questions as $question)
                    <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
            @error('correct_answer')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        @include('components.form-submit-btn',[
           'target' =>'addQuestion',
           'class' => 'bg-blue-500 ml-3',
           'buttonText'=>'Add'
       ])
    </form>
    @else
        <h3 class="my-4 text-gray-600 text-lg p-4 ml-3">Add Question</h3>
        <p class="text-red-500 px-4 ml-3">Not Found Any Question!</p>
    @endif
   <div class="p-4">
       <h3 class="my-4 text-gray-600 text-lg ml-3">Question List</h3>
       <div class="table w-full p-2">
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
                           Action
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                           </svg>
                       </div>
                   </th>
               </tr>
               </thead>
               <tbody>
               @foreach($quiz->questions as $question)
                   <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                       <td class="p-2 border-r text-left px-4">{{$question->name}}</td>
                       <td class="flex items-center justify-center">
                           <form wire:submit.prevent="removeQuiz({{$question->id}})" class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                               <button onclick="return confirm('you are sure to remove!')" type="submit">Remove</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
