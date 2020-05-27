<?php

namespace App\Http\Livewire\Console;

use Livewire\Component;

class Logout extends Component
{

    /**
     * logout function
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('console.login');
    }

    public function render()
    {
        return view('livewire.console.logout');
    }
}
