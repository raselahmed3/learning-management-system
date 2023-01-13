<?php

namespace App\Http\Livewire;

use App\Models\Attendence;
use App\Models\EClass;
use App\Models\Note;
use Livewire\Component;

class ClassShow extends Component
{
    public $class_id;
    public $note;
    public function render()
    {
        $class = EClass::findOrFail($this->class_id);
        return view('livewire.class-show',[
            'class' => $class,
            'notes' => $class->notes,
        ]);
    }

    public function addClassNote()
    {
        $note = new Note();
        $class = EClass::findOrFail($this->class_id);


       // dd($class->id);
        $note->description = $this->note;
        $note->save();
        $class->notes()->attach($note->id);


        $this->note = '';

        flash()->addSuccess('Note added successfully!');

    }
    public function attendence($student_id) {
        $attendce = new Attendence();

        $attendce->class_id = $this->class_id;
        $attendce->user_id = $student_id;
        $attendce->save();

        flash()->addSuccess('Presentation successfully!');
    }
}
