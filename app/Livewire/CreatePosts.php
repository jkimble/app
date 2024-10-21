<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Posts;
use Livewire\Attributes\Rule;

class CreatePosts extends Component
{

    // this is livewire specific. attaching these above properties will allow you to not need to list properties in $this->validate
    #[Rule('required|min:5', as: 'Post Title')] // the 'as' changes the name in the error message to be the 'as' value instead of the input name/label
    public $title = '';

    #[Rule('required', message: 'Please enter some content')] // this allows you to change the whole error message
    public $content = '';

    // can add other validation rules such as min bt just adding it: required|min:5|etc

    public function render()
    {
        return view('livewire.create-posts');
    }

    public function save()
    {

        /*
        $this->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        */ // Not needed anymore bc of the validation rules above the properties
        $this->validate();


        Posts::create([
            'post_title' => $this->title,
            'post_content' => $this->content
        ]);

        $this->redirect('/posts');
    }
}
