<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Toastr;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request ->all();
        {
            $this->validate($request,[
                'email'    => 'required|email',
                'password' => 'required',
                
            ]);
                $email  =   $request->email;
                $password  =   $request->password;
            
                // remember login
                /* $remember   =   $request->has('$remember')? true:false;
                if(auth()->attempt(['email'=>$email,'password'=>$password],$remember)){
                    $user= auth()->user();
                    return dd($user);
                }
                else{
                    return view('fail,Wrong UserName or Password !','Error');
                    
                } */
                //remember login
               /*  $credentials = $request->getCredentials();

                if(!Auth::validate($credentials)):
                    return redirect()->to('login')
                        ->withErrors(trans('auth.failed'));
                endif;
        
                $user = Auth::getProvider()->retrieveByCredentials($credentials);
        
                Auth::login($user, $request->get('remember'));
        
                if($request->get('remember')):
                    $this->setRememberMeExpiration($user);
                endif;
        
                return $this->authenticated($request, $user); */

                
                // $this->validate($request, [
                //     'email' => 'required|email',
                //     'password' => 'required',
                // ]);
            
            
                $remember = $request->has('remember') ? true : false; 
            
            
                if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember))
                {
                    if(auth()->user()->is_admin == 1){
                        return redirect()->route('admin.home');
    
                    }else{
                        return redirect()->route('home');
                    }
                    //dd($user);
                }else{
                    return back()->with('error','your username and password are wrong.');
                }

                /// role 
                
            if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
                if(auth()->user()->is_admin == 1){
                    return redirect()->route('admin.home');

                }else{
                    return redirect()->route('home');
                }


            }else{
                return redirect()->route('login')->with('error','Please, enter proper email or password!');
            }
        }
    }
}
