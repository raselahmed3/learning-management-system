<?php

namespace App\Http\Livewire;

use App\Models\EClass;
use Livewire\Component;

class ClassEdit extends Component
{
    public $class_id;
    public $name;
    public $class_date;
    public $class_time;

    public function mount(){
        $class = EClass::findOrFail($this->class_id);
        $this->name = $class->name;
        $this->class_time = $class->class_duration;
        $this->class_date =  date('Y-m-d', strtotime($class->class_date));
    }
    protected $rules = [
        'name' => 'required',
        'class_date' => 'required',
        'class_time' => 'required',
    ];
    public function render()
    {
        return view('livewire.class-edit');
    }

    public function classEdit(){
        $this->validate();
        $class = EClass::findOrFail($this->class_id);

        $class->name = $this->name;
        $class->class_duration = $this->class_time;
        $class->class_date = date('Y-m-d', strtotime($this->class_date));
        $class->save();

        return flash()->addSuccess('Class Updated Successfully');
    }
}
