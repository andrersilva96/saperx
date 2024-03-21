<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public string $phone;

    public User $user;

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required',
            'user.doc' => 'required',
            'user.birth_date' => 'required',
            'user.phones.0' => $this->user->exists ? 'nullable' : 'required',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('pages.users.show');
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
        return redirect()->route('users.save', $this->user);
    }

    public function add()
    {
        $this->user->phones = $this->user->phones->push($this->phone);
        $this->user->save();
        $this->phone = '';
    }

    public function delete(int $id)
    {
        $this->user->phones = $this->user->phones->forget($id);
        $this->user->save();
        $this->user->refresh();
    }
}
