<?php

namespace App\Livewire;

use App\Models\Posts;
use Livewire\Component;

class PostRow extends Component
{
    public $post;

    public function mount($post) {
        $this->post = $post;
    }

    public function archive(Posts $post) {
        $this->post->archive();
    }
    
    public function render()
    {
        return view('livewire.post-row');
    }
}
