<?php

namespace App\Http\Livewire;

use Flasher\Prime\FlasherInterface;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increase(FlasherInterface $flasher){

        $this->count++;

        // Add Flasher Notification
        $flasher->addSuccess('Item Increased');
    }

    public function decrease(FlasherInterface $flasher){

        $this->count--;

        // Add Flasher Notification
        $flasher->addSuccess('Item Decreased');
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
