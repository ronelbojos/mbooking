<?php

namespace App\Http\Controllers;

use App\Models\User;
use function request;

class UserController extends Controller
{
    /**
     * @return Room[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return User::all();
    }

    /**
     *
     */
    public function store()
    {
        User::create(request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ])) ;
    }
}
