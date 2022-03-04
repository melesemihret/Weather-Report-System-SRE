<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function show()
    {
        $users = User::all();
        return view('status',compact('users'));
    }
}
