<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ListController extends Controller
{
 
    public function show()
    {
        $users = User::all();
        return view('weather',compact('users'));
    }
}

