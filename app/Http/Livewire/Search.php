<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{

    public $search = '';
    public User $user;

    public function delete()
    {
        $this->user->delete();
    }

    public function render()
    {
        return view('livewire.search', [
            'users' => User::where('name', 'like','%'.$this->search.'%')->get(),
        ]);
    }
}
