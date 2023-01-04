<?php

namespace App\Http\Livewire;

use Flasher\Laravel\Facade\Flasher;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function incrementOrDecrement( $type)
    {
       if ($type == 'increment') {
           $this->count++;
           flash()->addSuccess('successfully incremented!');
       }elseif ($type == 'decrement' && $this->count > 0) {
           $this->count--;
           flash()->addWarning('successfully decremented!');
       }
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
