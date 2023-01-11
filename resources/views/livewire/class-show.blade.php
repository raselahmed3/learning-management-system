<div class="flex justify-center">
    <div class="rounded-sm shadow-sm bg-white pb-3">
        <img class="h-40" src="{{asset($class->course->image)}}">

        <div class="mt-4">
            <div class="flex">
                <h1 class="text-3xl font-bold text-gray-900">
                    {{$class->course->name}}
                </h1>
            </div>


            <ul class="flex flex-wrap items-center gap-4 mt-5 text-gray-700">

                <li class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>${{number_format($class->course->price,2)}}</span>
                </li>
            </ul>
        </div>
        <h3 class="text-lg py-4">Teachers</h3>
        <ul class="flex flex-wrap gap-4">
            @foreach($class->course->teachers as $teacher)
                <li>
                    <p><span>Name: </span> {{$teacher->name}}</p>
                    <p><span>Email: </span> {{$teacher->email}}</p>
                </li>
            @endforeach
        </ul>
        <h3 class="text-lg py-4">Description</h3>
        <p class="text-gray-600">{{$class->course->description}}</p>
        <h3 class="text-lg py-4">Class Details</h3>
        <p class="py-2 text-gray-600"><span>Name: </span>{{$class->name}}</p>
        <p class="py-2 text-gray-600"><span>Date: </span> {{date('l,F j,Y',strtotime($class->class_date))}}</p>
        <p class="py-2 text-gray-600"><span>Class Time: </span>{{date('H:i A',strtotime($class->class_duration))}}</p>

        <h3 class="text-lg py-4">Students</h3>
        <div class="table w-full">
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
                            Email
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Attendence
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($class->course->students as $student)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-2 border-r text-left px-4">
                          {{$student->name}}
                        </td>
                        <td class="p-2 border-r text-left px-4">
                            {{$student->email}}
                        </td>
                        <td class="p-2 border-r text-left px-4">
                            <div class="flex justify-center gap-4 items-center">
                                <a href="" class="bg-green-500 text-white py-2 px-4 rounded">Present</a>
                                <a href="" class="bg-red-500 text-white py-2 px-4 rounded">Absent</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="py-4">
            <h4 class="text-lg text-gray-600 py-4">Note List</h4>
            @if (!$notes->isEmpty())
                @foreach($notes as $note)
                    <p class="text-sm font-medium py-2 border-b border-gray-300">{{$note->description}}</p>
                @endforeach
            @else
                <p class="text-red-400 text-sm font-bold">Not Found any notes!</p>
            @endif
        </div>
        <form wire:submit.prevent="addClassNote" class="py-4">
            <label for="message" class="block mb-2 font-medium text-gray-900">Add New Notes</label>
            <textarea id="message" rows="4" wire:model="note" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            @include('components.form-submit-btn',[
              'target' =>'addClassNote',
              'class' => 'bg-green-500',
              'buttonText' => 'Save',
         ])
        </form>
    </div>
</div>
