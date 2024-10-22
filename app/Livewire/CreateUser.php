<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateUser extends Component
{
    #[Rule('required|min:5')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|min:5')]
    public $bio;

    #[Rule('required|min:5|alpha_num')]
    public $password;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function createUser()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'bio' => $this->bio,
            'password' => $this->password
        ]);

        Auth::login($user);

        $this->redirect('/', navigate: true);
    }
}
