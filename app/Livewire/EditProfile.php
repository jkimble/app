<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class EditProfile extends Component
{
    public User $user;
    /* directly below makes sure user name is unique in the users table, but does not ignore current user. */
    // #[Validate('required|unique:users')] this is good for simple validation, make a rules function for more complex validation (below)
    #[Validate] // adding this blank validate attribute will run validation everytime this field is changed on the front end. used to catch blur and run rules function
    public $name = '';
    public $email = '';
    public $bio = '';

    public $successIndicator = false;

    public function render()
    {
        return view('livewire.edit-profile');
    }

    public function rules() {
        return [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ]
        ];
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
        $this->validate();

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

    /* ------- this can be used to catch blur, or other events when component is updated
    public function updated() {

    }
    */
}   
