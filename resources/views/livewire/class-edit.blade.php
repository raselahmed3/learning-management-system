
    <form class="py-4" wire:submit.prevent="classEdit">
        <div class="w-full mt-4 flex justify-between items-center gap-4">
            <div class="flex gap-4 items-center">
                <div class="min-w-max">
                    @include('components.input-form',['name'=>'name','type'=>'text','label' => 'Name', 'placeholder'=>'class name'])
                </div>
                <div class="min-w-max">
                    @include('components.input-form',['name'=>'class_time','type'=>'time','label' => 'Time', 'placeholder'=>'duration'])
                </div>
                <div class="min-w-max">
                    @include('components.input-form',['name'=>'class_date','type'=>'date','label' => 'Date', 'placeholder'=>'Date'])
                </div>
            </div>
        </div>
        @include('components.form-submit-btn',[
         'target' =>'classEdit',
         'class' => 'bg-green-500 ml-3',
         'buttonText'=>'Update'
        ])
    </form>
