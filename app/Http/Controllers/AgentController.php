<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Appartement;
use App\Residence;
use App\Reservation;
use App\Galerie;
use App\Clic;

class AgentController extends Controller
{
    //

    public function getlistAppartement($id){
        $listlistAppart = Appartement::where('user_id',$id)
        ->where('type',2)
        ->OrderBy('id','desc')->get();
        return $listlistAppart;
    }

    Public function getlistResidence($id){
        $listlistResidence = Appartement::where('user_id',$id)
        ->where('type',1)
        ->OrderBy('id','desc')->get();
        return $listlistResidence;
    }

    public function index(){
        $user = Auth::user();
        $id_user = $user->id;

        $visiteRes = Clic::where('clics.type',1)
        ->leftjoin('appartements','appartements.id','=','clics.id_appartement')
        ->where('appartements.user_id',$id_user)
        ->count();

        $visiteApp = Clic::where('clics.type',2)
        ->leftjoin('appartements','appartements.id','=','clics.id_appartement')
        ->where('appartements.user_id',$id_user)
        ->count();

        $listReservation = Reservation::
        leftjoin('appartements','appartements.id','=','reservations.id_appartement')
        ->where('appartements.user_id',$id_user)
        ->count();

        //dd($visiteRes);

        return view('agent.home',compact('visiteRes', 'visiteApp', 'listReservation'));
    }

    public function listAppartement(){
        $user = Auth::user();
        $id = $user->id;
        $appartements = $this->getlistAppartement($id);
        return view('agent.list_appartement',compact('appartements'));
    }

    public function showAppartement($id){
        $appartement = Appartement::find($id);
        $ref = $appartement->ref;
        $galerie = Galerie::where('id_appartement',$ref)->get();
        $imgPossible = 4 - count($galerie);
        //dd($imgPossible);
        return view('agent.detail_appartement',compact('appartement','galerie', 'imgPossible'));
    }

    public function deletImage(Request $request){
        try {
            $id = $request->get('id');

            $image = Galerie::find($id);
            $image->delete();

            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
           //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        } 

    }

    public function addGaleri(Request $request){
        //dd($request->file('images'));
        $matricule = $request->get('matricule');
        $imgPossible = $request->get('imgPossible');
        $images = array();
            if ($files=$request->file('images')) {
                if (count($files) <= $imgPossible) {
                    //
                    foreach ($files as $file) {
                        //
                        $name = time() . '.' . $file->getClientOriginalName();
                        //$name = time() . '.' . $file->getClientOriginalExtension();
                        //$file->move('image',$name);
                        $storage_data = Storage::disk('public')->put($name, file_get_contents($file));
                        $images[]=$name;
                        //
                        //$extension = $file->getClientOriginalExtension();
                        //$image_two = time(). '.' . $image->getClientOriginalname();
                        //$filename = time() . '.' . $file->getClientOriginalExtension();
                        //$storage_data = Storage::disk('public')->put($filename, file_get_contents($file));
                        //$file_path = Storage::url($filename);
                        //$new_path = asset($file_path);
                        //$images[]=$filename;
                      
                        Galerie::create([
                            'image' => $name,
                            'id_appartement' => $matricule
                        ]);
                    }
                } else {
                    
                    return redirect()->back()->with('danger', "Enregistrement impossible, vous pouvez enregistrez que  ".$imgPossible);
                }

                return redirect()->back()->with('success', "Opération éffectué avec succès.");
            }


    }

    public function updateImage(Request $request){
        try {
            $id = $request->get('id');
            $table = $request->get('table');

            $file = $request->file('image');
            $name_img = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));

            if($table == 1){

                Appartement::where('id',$id)
                ->update([
                    'image_one' => $name_img,
                ]);

            }else{

                Galerie::where('id',$id)
                ->update([
                    'image' => $name_img,
                ]);

            }

            return redirect()->back()->with('success', "Opération éffectué avec succès.");

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }


    }

    public function updateImgProfile(Request $request){

        //dd($request);

        $user = Auth::user();
        $id = $user->id;

        $file = $request->file('file');
        $name_img = $file->getClientOriginalName();
        $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));

        User::where('id',$id)->update(['img' => $name_img,]);
        

    }

    public function addResidence(){
        return view('agent.add_residence');
    }

    public function listResidence(){
        $user = Auth::user();
        $id = $user->id;
        $residences = $this->getlistResidence($id);
        return view('agent.list_residences',compact('residences'));
    }

    public function addAppartement(){
        return view('agent.add_appartement');
    }


    public function saveAppartement(Request $request){
        //dd($request->all());
        try {
            //$this->validate($request,$this->rules,$this->message);

            $user = Auth::user();
            $id = $user->id;

            $file = $request->file('image_five');
            $name_img = $file->getClientOriginalName();
            $storage_data = Storage::disk('public')->put($name_img, file_get_contents($file));

            if($request->get('type') == 1){
                $matricule = 'RES'.time();
            }elseif($request->get('type') == 2){
                $matricule = 'APP'.time();
            }


            $residence = New Appartement;

            $residence->titre = $request->get('designation');
            $residence->nom_residence = $request->get('nom_residence');
            $residence->nbre_pierce = $request->get('nbre_pierce');
            $residence->nbre_lit = $request->get('nbre_lit');
            $residence->nbre_salle_eau = $request->get('nbre_salle_eau');
            $residence->montant = $request->get('montant');
            $residence->localisations = $request->get('autocomplete');
            $residence->latitude = $request->get('latitude');
            $residence->longitude = $request->get('longitude');
            $residence->description = $request->get('description');
            //$residence->video = $video;
            $residence->type = $request->get('type');
            $residence->ref = $matricule;
            $residence->image_one = $name_img;
            $residence->user_id = $id;
            $residence->statu = 0;


            $images = array();
            if ($files=$request->file('images')) {
                if (count($files) <= 4) {
                    //
                    foreach ($files as $file) {
                        //
                        $name =  time() . '.' .$file->getClientOriginalName();
                        //$name = time() . '.' . $file->getClientOriginalExtension();
                        //$file->move('image',$name);
                        $storage_data = Storage::disk('public')->put($name, file_get_contents($file));
                        $images[]=$name;
                        //
                        //$extension = $file->getClientOriginalExtension();
                        //$image_two = time(). '.' . $image->getClientOriginalname();
                        //$filename = time() . '.' . $file->getClientOriginalExtension();
                        //$storage_data = Storage::disk('public')->put($filename, file_get_contents($file));
                        //$file_path = Storage::url($filename);
                        //$new_path = asset($file_path);
                        //$images[]=$filename;
                      
                        Galerie::create([
                            'image' => $name,
                            'id_appartement' => $matricule
                        ]);
                    }
                } else {
                    $cotaValide = count($files) - 1 ;
                    return redirect()->back()->with('danger', "Enregistrement impossible vous disposer d'un cota de ".$cotaValide);
                }
            }
            
            // save du menu nourriture ---- #########
            $residence->save();
            //return redirect()->back()->with('success', 'Opération éffectué avec succès.');
            if($request->get('type') == 1){
                return redirect('/liste/residence')->with('success', 'Opération éffectué avec succès.');
            }elseif($request->get('type') == 2){
                return redirect('/agent/list/appartement')->with('success', 'Opération éffectué avec succès.');
            }

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }


    public function showResidence($id){
        $appartement = Appartement::find($id);
        $ref = $appartement->ref;
        $galerie = Galerie::where('id_appartement',$ref)->get();
        $imgPossible = 4 - count($galerie);
        return view('agent.detail_appartement',compact('appartement','galerie', 'imgPossible'));
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


    public function getReservation(){
        $user = Auth::user();
        $id = $user->id;
        $listReservation = Reservation::
        leftjoin('appartements','appartements.id','=','reservations.id_appartement')
        ->where('appartements.user_id',$id)
        ->select('appartements.ref as reference',
                 'appartements.titre as titre',
                 'appartements.id as id',
                 'reservations.name as nomClient',
                 'reservations.phone as phoneClient',
                 'reservations.statu', 
                 'reservations.created_at',
                 'reservations.id as idReservation', 
                 'reservations.type', 
                 'reservations.datedebut', 
                 'reservations.datefin', 
                 'reservations.coutSejour', 
                 'reservations.nbreJour', 
                 'reservations.created_at as date')
        ->orderBy('created_at', 'DESC')
        ->get();

        
        return view('agent.list_reservation',compact('listReservation'));
    }

    public function rapportReservation(Request $request){

        try {

            //dd($request);

            $id = $request->get('id');
            $statu = $request->get('consulation');
            $motif = $request->get('motif');

           
            Reservation::where('id',$id)
                ->update([
                    'statu' => $statu,
                    'motif' => $motif,
            ]);

            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
             //dd($th);
             return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }
}
