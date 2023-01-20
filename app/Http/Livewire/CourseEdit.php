<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseEdit extends Component
{
    public $name;
    public $description;
    public $price;
    public $course_id;

    public function mount() {
        $courses = Course::findOrFail($this->course_id);
        $this->name = $courses->name;
        $this->description = $courses->description;
        $this->price = $courses->price;
    }

    public function render()
    {
        $courses = Course::paginate(10);
        return view('livewire.course-edit', [
            'courses' => $courses
        ]);
    }

    public function submitForm() {
        $course = Course::findOrFail($this->course_id);
        $course->name = $this->name;
        $course->description = $this->description;
        $course->price = $this->price;
        $course->save();


        flash()->addSuccess('Course Updated');
    }
}
