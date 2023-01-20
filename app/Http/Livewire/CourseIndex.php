<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::all();
        return view('livewire.course-index', [
            'courses' => $courses
        ]);

        return view('livewire.course-index');
    }

    public function courseDelete($id){

        // Permission check
        // permission_check('lead-management');

        $course = Course::findOrFail($id);
        $course->delete();

        flash()->addSuccess('Successfully Deleted');
    }
}
