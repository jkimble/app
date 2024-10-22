<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditProfile extends Component
{
    public User $user;
    public $name = '';
    public $email = '';
    public $bio = '';
    //public $user = '';

    public function render()
    {
        return view('livewire.edit-profile');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->bio = $this->user->bio;
    }

    public function editUser()
    {
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->bio = $this->bio;
        
        $this->user->save();

        $this->redirect('/edit-profile', navigate: true);
    }
}
