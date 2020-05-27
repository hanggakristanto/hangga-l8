<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    /**
     * destroy function
     */
    public function destroy($userId)
    {
        $user = User::find($userId);

        if($user) {
            $user->delete();
        }

        session()->flash('message', 'Data deleted successfully.');

        return redirect()->route('console.users.index');
    }

    public function render()
    {
        return view('livewire.console.users.index', [
            'users' => User::latest()->paginate(10)
        ]);
    }
}
