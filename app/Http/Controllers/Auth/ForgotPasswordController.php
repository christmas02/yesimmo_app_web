<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\fotgetPassword;
use Illuminate\Support\Facades\Hash;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function forgetPassword(Request $request){
        try {
            //code...
            //dd($request->all());
            $email = $request->get('email');

            $user = User::where('email',$email)->first();
            $user->remember_token = str_replace('/','',bcrypt(Str::random(16)));
            $user->save();

            if($user){
                Mail::to($user->email)->send(new fotgetPassword($user));
                return redirect()->back()->with('success','Vos avez recu un mail !');
            }else{
                return redirect()->back()->with('error','Cette utilisateur n\'existe pas!');
            }

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Error.');
        }

    }

    public function newPassword(){
        return view('template.motdepasseoublier');
    }


    public function saveNewpassword(Request $request){

        try {
            //code...
            //dd($request->all());
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $id_user = $request->get('id_user');

            if($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput($request->all());
                //return "false";
            }else{

                $user = User::where('id',$id_user)->first();
                $user->password = Hash::make($request->get('password'));
                $user->save();

                return redirect('connexion')->with('success', 'Opération éffectué avec succès.');

            }

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Error.');
        }

    }
}
