<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class Show extends Controller
{
    public function __invoke(): mixed
    {
        return view('pages.users.show', [
            'users' => User::all()
        ]);
    }
}
