<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;

class Create extends Component
{

    /**
     * public variable
     */
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => bcrypt($this->password)
        ]);

        if($user) {
            session()->flash('message', 'Data saved successfully');
        } else {
            session()->flash('message', 'Data failed to save');
        }

        redirect()->route('console.users.index');

    }

    public function render()
    {
        return view('livewire.console.users.create');
    }
}
