<?php

namespace App\Livewire\Forms;

use App\Enums\Country;
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
    public $recieve_emails = false;
    public $recieve_updates = false;
    public $recieve_offers = false;
    public Country $country;

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
            'country' => ['required']
        ];
    }

    public function setUser(User $user)
    {
        //$this->user = Auth::user(); ----- user passed as param
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->bio = $this->user->bio;
        $this->country = $this->user->country;
        $this->recieve_emails = $this->user->recieve_emails;
        $this->recieve_updates = $this->user->recieve_updates;
        $this->recieve_offers = $this->user->recieve_offers;
    }

    public function update()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->bio = $this->bio;
        $this->user->country = $this->country;
        $this->user->recieve_emails = $this->recieve_emails;
        $this->user->recieve_updates = $this->recieve_updates;
        $this->user->recieve_offers = $this->recieve_offers;

        $this->user->save();
    }
}
