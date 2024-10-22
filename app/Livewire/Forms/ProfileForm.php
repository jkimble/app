<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ProfileForm extends Form
{
    public User $user;
    #[Validate]
    public $name = '';
    public $email = '';
    public $bio = '';

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ]
        ];
    }

    public function setUser(User $user) {
        //$this->user = Auth::user(); ----- user passed as param
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->bio = $this->user->bio;
    }

    public function update()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->bio = $this->bio;

        $this->user->save();
    }
}
