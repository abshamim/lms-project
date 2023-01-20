<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculumShow extends Component
{
    public $curriculum_id;
    public function render()
    {
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        return view('livewire.curriculum-show', [
            'curriculum' => $curriculum
        ]);
    }
}
