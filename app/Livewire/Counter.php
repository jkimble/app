<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Counter extends Component
{
    #[Title('Counter')]
    public $count = 1;

    public function increment($by)
    {
        $this->count = $this->count + $by;
    }

    public function decrement($by) {
        $this->count = $this->count - $by;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
