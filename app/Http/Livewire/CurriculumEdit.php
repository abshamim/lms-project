<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculumEdit extends Component
{
    public $curriculum_id;
    public $name;
    public function render()
    {
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        return view('livewire.curriculum-edit', [
            'curriculum' => $curriculum
        ]);
    }

    public function mount() {
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $this->name = $curriculum->name;
    }

    public function submitForm() {
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $curriculum->name = $this->name;
        $curriculum->save();

        flash()->addSuccess('Class Updated');
        return redirect()->route('course.show', $curriculum->course->id);
    }
}
