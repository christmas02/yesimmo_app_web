<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

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
        $inputVal = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            
            if(auth()->user()->confirmation_token != null){
                    return redirect('connexion')->with('error','Compte inactif, veiller contacter notre service client, au +225 05 65 12 10 84');
            }else{
                if (auth()->user()->role == "superadmin") {
                    return redirect()->route('espace.superadmin');
                }elseif(auth()->user()->role == "agent"){
                    //dd(auth()->user()->role);
                    return redirect()->route('espace.agent');
                }else{
                    return redirect()->route('acceuil');
                }
            }
            
        }else{
            return redirect('connexion')->with('error','Infromation invalide, veiller contacter notre service client, au +225 0 84');
        }     
    }


    protected function credentials(Request $request)
    {
        return array_merge(
            $request->only($this->username(), 'password'),
            ['confirmation_token' => null]
        );
    }
}
