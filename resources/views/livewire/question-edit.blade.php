<div>
    <form class="p-4" wire:submit.prevent="editQuestion">
        <div class="flex w-full">
            @include('components.input-form',['name'=>'name','type'=>'text','label' => 'Name', 'placeholder'=>'Type Question Name'])
        </div>
        <div class="flex w-full mt-12">
            @foreach($questions as $question)
                @include('components.input-form',['name'=>'answer_'.$question,'type'=>'text','label' => 'Answer '.ucfirst($question), 'placeholder'=>'Type Question '.$question])
            @endforeach
        </div>
        <div class="min-w-max ml-3">
            <label for="correct_answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select correct answer</label>
            <select wire:model="correct_answer" id="correct_answer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach($questions as $question)
                    <option value="{{$question}}">{{ucfirst($question)}}</option>
                @endforeach
            </select>
            @error('correct_answer')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>

        @include('components.form-submit-btn',[
            'target' =>'editQuestion',
            'class' => 'bg-green-500 ml-3',
            'buttonText'=>'update'
        ])
    </form>

</div>
