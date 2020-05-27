<?php

namespace App\Http\Livewire\Console;

use Livewire\Component;

class Login extends Component
{

    /**
     * public variable
     */
    public $email;
    public $password;

    /**
     * login function
     */
    public function login()
    {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(auth()->attempt(['email' => $this->email, 'password'=> $this->password])) {

            return redirect()->route('console.dashboard.index');

        } else {
            session()->flash('message', 'Your Email Address or Password is incorrect.');
            return redirect()->route('console.login');
        }

    }

    public function render()
    {
        return view('livewire.console.login');
    }
}
