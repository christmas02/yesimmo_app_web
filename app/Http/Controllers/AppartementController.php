<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\notification_inscription;
use App\Menu;
use App\Entreprise;
use App\Appartement;
use App\User;

class AppartementController extends Controller
{
    //
    public function showAppartement($id){
        $appartement = Appartement::find($id);
        //dd($id);
        return view('admin.appart.detail_appartement',compact('appartement'));
    }

    public function updadeGallerie(Request $request){

        //dd($request->all());
        try {
            //$this->validate($request,$this->rules,$this->message);

            //$image ="";
            if($request->hasfile('video')){
                $image = $request->file('video');
                $video = $input['videoname'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['videoname']);
            }


            if($request->hasfile('image_one')){
                $image = $request->file('image_one');
                $image_one = $input['image_onename'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['image_onename']);
            }

            if($request->hasfile('image_two')){
                $image = $request->file('image_two');
                $image_two = $input['image_twoname'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['image_twoname']);
            }

            if($request->hasfile('image_three')){
                $image = $request->file('image_three');
                $image_three = $input['image_threename'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['image_threename']);
            }

            if($request->hasfile('image_for')){
                $image = $request->file('image_for');
                $image_for = $input['image_forname'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['image_forname']);
            }

            if($request->hasfile('image_five')){
                $image = $request->file('image_five');
                $image_five = $input['image_fivename'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['image_fivename']);
            }

            $id = $request->get('id');

            Appartement::where('id',$id)
            ->update([
                'image_one' => $image_one,
                'image_two' => $image_two,
                'image_three' => $image_three,
                'image_for' => $image_for,
                'image_five' => $image_five,
            ]);


            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function updadePoste(Request $request){

        //dd($request->all());
        try {
            //$this->validate($request,$this->rules,$this->message);

            $designation = $request->get('designation');
            $nbre_pierce = $request->get('nbre_pierce');
            $nbre_lit = $request->get('nbre_lit');
            $nbre_salle_eau = $request->get('nbre_salle_eau');
            $montant = $request->get('montant');
            
            $description = $request->get('description');

            $id = $request->get('id');

            Appartement::where('id',$id)
            ->update([
                'titre' => $designation,
                'nbre_pierce' => $nbre_pierce,
                'nbre_lit' => $nbre_lit,
                'nbre_salle_eau' => $nbre_salle_eau,
                'montant' => $montant,
                
                'description' => $description,
            ]);


            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function activerAppartement($id){
        //dd($request->all());
        try {
            Appartement::where('id',$id)
            ->update([
                'statu' => 1,
            ]);
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
    }

    public function desactiverAppartement($id){
        //dd($request->all());
        try {
            Appartement::where('id',$id)
            ->update([
                'statu' => 0,
            ]);
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }


}
