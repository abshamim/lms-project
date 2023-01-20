<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Curriculum;

class CourseShow extends Component
{
    public $course_id;

    public function render()
    {
        $courses = Course::findOrFail($this->course_id);
        return view('livewire.course-show', [
            'courses' => $courses
        ]);
    }

    public function classDelete($curriculum_id) {
        $class = Curriculum::findOrFail($curriculum_id);
        $class->delete();

        flash()->addSuccess('Successfully Deleted');
    }

}
