<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Users extends Component
{
    public $ids;
    public $name;
    public $email;
    public $password;
    public $search = '';

    public function mount()
    {
        return view('list-user');
    }

    public function store()
    {
        $validates = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create($validates);
        session()->flash('message', 'User Create Successfully ! ');
        $this->resetInputFields();
        $this->emit('userAdded');
    }

    public function resetInputFields()
    {
        $this->ids = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        $users = User::orderBy('id', 'DESC')->get();
        if ($this->search == '') {
            return view('livewire.users.users', ['users' => $users]);
        } else {
            return $this->search();
        }
    }

    public function search()
    {
        return view('livewire.users.users', [
            'users' => User::where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->ids = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = bcrypt($user->password);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::find($this->ids);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
        session()->flash('message', 'User updated Successfully ! ');
        $this->resetInputFields();
        $this->emit('userUpdated');
    }

    public function delete($id)
    {
        $user = User::find($id)->delete();
        session()->flash('message', 'User deleted Successfully ! ');
    }
}
