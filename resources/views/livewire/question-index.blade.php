<div>
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
                @foreach($answers as $answer)
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Answer {{ucfirst($answer)}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                </th>
                @endforeach
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                       Correct Answer
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
            @foreach($questions as $question)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r text-left px-4">{{$question->name}}</td>
                    <td class="p-2 border-r text-left px-4">{{$question->answer_a}}</td>
                    <td class="p-2 border-r text-left px-4">{{$question->answer_b}}</td>
                    <td class="p-2 border-r text-left px-4">{{$question->answer_c}}</td>
                    <td class="p-2 border-r text-left px-4">{{$question->answer_d}}</td>
                    <td class="p-2 border-r text-left px-4">{{$question->correct_answer}}</td>
                    <td class="flex items-center justify-center">
                        <a href="{{route('question.edit',$question->id)}}" class="bg-blue-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.edit')</a>
                        <a href="{{route('question.show',$question->id)}}" class="bg-green-500 p-2 mx-3 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.eye')</a>
                        <form wire:submit.prevent="deleteQuestion({{$question->id}})" class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                            <button onclick="return confirm('you are sure to delete!')" type="submit">@include('components.icons.trash')</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{$questions->links()}}
        </div>
    </div>
</div>

