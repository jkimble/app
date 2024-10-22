<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class EditProfile extends Component
{
    /* -- using a form object (ProfileForm.php), all of this can be removed and added to the object (leaving here for notes)
    public User $user;
    /* directly below makes sure user name is unique in the users table, but does not ignore current user. 
    // #[Validate('required|unique:users')] this is good for simple validation, make a rules function for more complex validation (below)
    #[Validate] // adding this blank validate attribute will run validation everytime this field is changed on the front end. used to catch blur and run rules function
    public $name = '';
    public $email = '';
    public $bio = '';
    */

    // reference form objects by setting public prop
    public ProfileForm $form;

    public $successIndicator = false;

    public function render()
    {
        return view('livewire.edit-profile');
    }

    /* -- rules can also be added to the form object (ProfileForm.php)
    public function rules() {
        return [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ]
        ];
    }
    */

    // in form object (ProfileForm.php) there is no mount method. use a custom one (setUser())
    public function mount()
    {
        $this->form->setUser(Auth::user());
        /* can add below to setUser() function
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->bio = $this->user->bio;
        */
    }


    /* -- methods to do things can also be added to the form object (ProfileForm.php, as update())
    public function editUser()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->bio = $this->bio;

        $this->user->save();

        sleep(1); // adds delay, good for adding wire:loading to a component

        // to add a success message or modal, you can do a few things
        // $this->dispatch('message') in the class, 
        // x-on:save-succeed.window to add to component
        // or below method with alpine and x-show. works bc
        // we can user $wire inside of alpine statments. check this 
        // view to see x-show method

        $this->successIndicator = true;

        //$this->redirect('/edit-profile', navigate: true);
    }
    ------- below is how to handle the saving function using a form object */
    public function editUser()
    {
        $this->form->update(); // update() is declared in the form object! handles validation & saving & frontend stuff
        sleep(1);
        $this->successIndicator = true;
    }
    /* ------- this can be used to catch blur, or other events when component is updated
    public function updated() {

    }
    */
}
