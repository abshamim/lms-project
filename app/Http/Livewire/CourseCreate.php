<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $image;
    public $selectedDays = [];
    public $time;
    public $end_date;
    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required'
    ];

    public function formSubmit() {
        $this->validate();

        $course = Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => Auth::user()->id
        ]);

        foreach($this->selectedDays as $day) {

        }
    }

    public function render()
    {
        return view('livewire.course-create');
    }
}
