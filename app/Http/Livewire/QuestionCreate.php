<?php

namespace App\Http\Livewire;

use App\Models\Quastion;
use Livewire\Component;


class QuestionCreate extends Component
{
    public $questions = ['a','b','c','d'];
    public $name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer = 'a';
    public function render()
    {
        return view('livewire.question-create');
    }
    protected $rules = [
        'name' => 'required',
        'answer_a' => 'required',
        'answer_b' => 'required',
        'answer_c' => 'required',
        'answer_d' => 'required',
        'correct_answer' => 'required',
    ];
    public function createQuestion(){

        $this->validate();

        $question = new Quastion();
        $question->name = $this->name;
        $question->answer_a = $this->answer_a;
        $question->answer_b = $this->answer_b;
        $question->answer_c = $this->answer_c;
        $question->answer_d = $this->answer_d;
        $question->correct_answer = $this->correct_answer;
        $question->save();

        flash()->addSuccess('Question added successfully!');

        return redirect()->route('question.index');

    }
}
