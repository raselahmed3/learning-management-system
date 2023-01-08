<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\EClass;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Livewire\Component;

class CourseCreate extends Component
{
    public $days = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];
    public $course_name;
    public $course_image;
    public $price;
    public $description;
    public $selectedDays = [];
    public $selectedTeachers = [];
    public $duration;
    public $end_date;

    public function render()
    {
        $teachers = User::Role('Teacher')->get();
        return view('livewire.course-create',['teachers' => $teachers]);
    }

    protected $rules = [
        'course_name' => 'required|unique:courses,name',
        'course_image' => 'required',
        'price' => 'required',
        'description' => 'required|min:150',
        'selectedDays' => 'required',
        'selectedTeachers' => 'required',
        'end_date' => 'required',
        'duration' => 'required'
    ];
    public function courseCreate(){

        $this->validate();
        $course = new Course();
        $course->name = $this->course_name;
        $course->description = $this->description;
        $course->image = $this->course_image;
        $course->price = $this->price;
        $course->save();

        $start_date = new DateTime(now());
        $end_date =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        $classNum = 0;
        foreach ($this->selectedDays as $slelectedDay) {
            foreach ($date_range as $date) {
                if($date->format("l") == $slelectedDay){
                    $classNum++;
                    $eClass = new EClass();
                    $eClass->number = $classNum;
                    $eClass->class_date = $date;
                    $eClass->class_duration = $this->duration;
                    $eClass->course_id = $course->id;
                    $eClass->save();
                }
            }
        }
        $course->teachers()->attach($this->selectedTeachers);


        flash()->addSuccess('Course created successfully!');

        return redirect()->route('course.index');
    }
}
