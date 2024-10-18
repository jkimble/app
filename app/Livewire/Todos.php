<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Todos extends Component
{
    #[Title('Todos')]
    public $todo = '';
    public $todos = [];

    /*
    public function updated($property, $value)
    {
        $this->$property = strtoupper($value);
    }
    */ //this works, but can be simplified with;
    public function updatedTodo($value)
    {
        $this->todo = strtoupper($value);
    }

    public function add()
    {
        if (!empty($this->todo)) {
            $this->todos[] = $this->todo;
        }
        //$this->todo = ''; same as:
        $this->reset('todo');
    }

    public function mount()
    {
        $this->todos = [
            'Take out trash',
            'Do something else'
        ];
    }


    public function render()
    {
        return view('livewire.todos');
    }
}
