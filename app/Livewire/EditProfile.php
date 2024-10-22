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

    public $successIndicator = false;

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

        sleep(1); // addds delay, good for adding wire:loading to a component

        // to add a success message or modal, you can do a few things
        // $this->dispatch('message') in the class, 
        // x-on:save-succeed.window to add to component
        // or below method with alpine and x-show. works bc
        // we can user $wire inside of alpine statments. check this 
        // view to see x-show method

        $this->successIndicator = true;

        //$this->redirect('/edit-profile', navigate: true);
    }
}
