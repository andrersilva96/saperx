<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class Index extends Controller
{
    public function __invoke(): mixed
    {
        return view('pages.users.index', ['users' => User::orderByDesc('id')->get()]);
    }
}
