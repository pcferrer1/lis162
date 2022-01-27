<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;

class Show extends Component
{
    public $rec;

    // public function mount($rec) {
    //     $this->rec = $rec;
    // }

    public function render()
    {
        return view('livewire.test.show');
    }
}
