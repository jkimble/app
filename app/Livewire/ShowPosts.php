<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Posts;

class ShowPosts extends Component
{
    public function render()
    {
        return view('livewire.show-posts', [
            'posts' => Posts::all()
        ]);
    }

    public function delete(Posts $post) {
        $post->delete();
        $this->redirect('/posts');
    }
}
