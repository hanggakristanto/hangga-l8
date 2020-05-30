<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    /**
     * destroy function
     */
    public function destroy($userId)
    {
        $user = User::find($userId);

        if($user) {
            $user->delete();
        }

        session()->flash('success', 'Data deleted successfully.');

        return redirect()->route('console.users.index');
    }

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.users.index', [
            'users' => $this->search === null ? User::latest()->paginate(10) : User::where('name', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
