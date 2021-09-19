<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function saveProfil(Request $request){
        try {
            //code...
            //dd($request->all());

            $user = Auth::user();
            $id = $user->id;
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            

            User::where('id',$id)
            ->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
            ]);

            
            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
           //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }

    public function savePassword(Request $request){
        try {
            //code...
            //dd($request->all());

            $user = Auth::user();
            $id = $user->id;
            $password = $request->password;
            $password_confirmation = $request->password_confirmation;


            if($password == $password_confirmation){

                User::where('id',$id)
                ->update([
                    'password' => bcrypt($password),
                ]);

            }else{
                return redirect()->back()->with('danger', 'Echec .');
            }
        
            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
           //dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }
    }
}
