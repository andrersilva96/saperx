<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public string $phone;

    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('pages.users.show');
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
    }
}
