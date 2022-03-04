<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
//use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Session;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    */

    use SendsPasswordResetEmails;

    public function UpdatePassword(Request $request)
    {
        $password = $request->password;
        $new_password  = $request->new_password;
    
    
    if(!Hash::check($password,Auth::user()->password)){
    echo 'The specified password does not match';
    }
    else{
        $request->user()->fill(['password' => Hash::make($new_password)])->save;
        echo 'Updated Successfully';
    
     } 
}}