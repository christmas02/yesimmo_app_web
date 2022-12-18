<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\notification_inscription;
use App\Menu;
use App\Entreprise;
use App\Residence;
use App\Appartement;
use App\User;
use App\Galerie;
use App\Reservation;
use Illuminate\Support\Facades\DB;
use App\Mail\activeAppartement;

class AdminContrller extends Controller
{
    //
    protected $rules = [
        "designation" => "required",
        "montant" => "required",
        "description" => "required",
        "image" => "required",
    ];

    protected $message = [
        "required" => "le champs :attribute est requis !"
    ];

    protected $rule = [
        "denomination" => "required",
        "name" => "required",
        "tel_name" => "required",
        "tel_entrep" => "required",
        "email_entrep" => "required",
        "localisation" => "required",
        "nbre_emp" => "required",
        "image" => "required",
    ];

    protected $validator = [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'role' => ['required'],
            'employer' => ['required'],
    ];

    public function email(){
        return view('mails.notification');
    }


    Public function getlistResidence(){
        $listlistResidence = Appartement::where('type',1)
        ->leftjoin('users','users.id','=','appartements.user_id')
        ->select('users.name','appartements.*')
        ->get();
        return $listlistResidence;
    }


    Public function getlistAppartement(){
        $listlistAppart = DB::table('appartements')->where('appartements.type',2)
        ->leftjoin('users','users.id','=','appartements.user_id')
        ->select('users.name','appartements.*')
        ->OrderBy('appartements.id','desc')->get();
        //dd($listlistAppart);
        return $listlistAppart;
    }

    Public function getEntreprise(){
        $listEtreprise = Entreprise::all();
        return $listEtreprise;
    }

    Public function getfirstMenus($id){
        $firstMenu = Menu::find($id);
        return $firstMenu;
    }

    Public function getAgent(){
        $Agent = User::where('role','agent');
        return $Agent;
    }

    public function index(){
        return view('admin.home');
    }

    public function addResidence(){
        return view('admin.add_residence');
    }

    public function addAppartement(){
        return view('admin.add_appartement');
    }

    public function showResidence($id){
        $appartement = Appartement::find($id);
        $ref = $appartement->ref;
        $galerie = Galerie::where('id_appartement',$ref)->get();
        $imgPossible = 4 - count($galerie);
        return view('admin.detail_appartement',compact('appartement','galerie', 'imgPossible'));
    }

    public function listResidence(){
        $residences = $this->getlistResidence();
        return view('admin.list_residences',compact('residences'));
    }

    public function listAppartement(){
        $appartements = $this->getlistAppartement();
        return view('admin.list_appartement',compact('appartements'));
    }


    public function saveResidence(Request $request){

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

            $residence = New Residence;

            $residence->titre = $request->get('designation');
            $residence->nbre_pierce = $request->get('nbre_pierce');
            $residence->nbre_lit = $request->get('nbre_lit');
            $residence->nbre_salle_eau = $request->get('nbre_salle_eau');
            $residence->montant = $request->get('montant');
            $residence->localisations = $request->get('autocomplete');
            $residence->latitude = $request->get('latitude');
            $residence->longitude = $request->get('longitude');
            $residence->description = $request->get('description');
            $residence->video = $video;
            $residence->image_one = $image_one;
            $residence->image_two = $image_two;
            $residence->image_three = $image_three;
            $residence->image_for = $image_for;
            $residence->image_five = $image_five;
            $residence->user_id = 0;
            $residence->statu = 0;
            
            // save du menu nourriture ---- #########
            $residence->save();
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function saveAppartement(Request $request){

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

            $appartement = New Appartement;

            $appartement->titre = $request->get('designation');
            $appartement->nbre_pierce = $request->get('nbre_pierce');
            $appartement->nbre_lit = $request->get('nbre_lit');
            $appartement->nbre_salle_eau = $request->get('nbre_salle_eau');
            $appartement->montant = $request->get('montant');
            $appartement->localisations = $request->get('autocomplete');
            $appartement->latitude = $request->get('latitude');
            $appartement->longitude = $request->get('longitude');
            $appartement->description = $request->get('description');
            $appartement->video = $video;
            $appartement->ref = 'APP'.time();
            $appartement->image_one = $image_one;
            $appartement->image_two = $image_two;
            $appartement->image_three = $image_three;
            $appartement->image_for = $image_for;
            $appartement->image_five = $image_five;
            $appartement->user_id = 0;
            $appartement->statu = 0;
            
            // save du menu nourriture ---- #########
            $appartement->save();
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function saveAgent(Request $request)
    {
        //dd($data);
        try {
            //code...
            //$this->validate($request,$this->validator,$this->message);

            $name = $request->get('name');
            $lastname = $request->get('lastname');
            $email = $request->get('email');
            $phone = $request->get('phone');
            $role = $request->get('role');
            $password = Hash::make($request->get('password'));
            $employer = $request->get('employer');

            $userExiste = User::where('email',$email)->first();

            if($userExiste){
                return redirect()->back()->with('warning', 'Utilisateur existe deja !.');
            }

            $user = New User;

            $user->name = $name." ".$lastname;
            $user->email = $email;
            $user->role = $role;
            $user->employer = $employer;
            $user->phone = $phone;
            $user->password = $password;

            $user->save();
    
            // Communication mail 
            Mail::to($email)
            ->send(new notification_inscription());
    
            return redirect()->back()->with('success', 'Opération éffectué avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
        
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

            Residence::where('id',$id)
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

            Residence::where('id',$id)
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

    public function activerResidence($id){
        //dd($request->all());
        try {
            $agent = Appartement::where('id',$id)->first();
            $user = User::where('id',$agent->user_id)->first();
            //dd($agent->user_id);
            Appartement::where('id',$id)
            ->update([
                'statu' => 1,
            ]);

            $data = [
                "name" => $user->name

            ];
            
            Mail::to($user->email)->send(new activeAppartement($data));

            return redirect()->back()->with('success', 'Opération éffectué avec succès.');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }
    }

    public function desactiverResidence($id){
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


    public function listAgent(){
        $agent = User::where('role','=','agent')->get();
        //dd($agent);
        return view('admin.list_agent',compact('agent'));
    }

    public function addAgent(){
        return view('admin.add_agent');
    }

    public function getReservation(){
        $listReservation = Reservation::leftjoin('appartements','appartements.id','=','reservations.id_appartement')
        ->leftjoin('users','users.id','=','appartements.user_id')
        ->select('appartements.ref as reference',
                 'appartements.titre as designation',
                 'appartements.localisations',
                 'appartements.image_one',
                 'users.name as nomPropriere',
                 'users.phone as phonePropriere',
                 'reservations.name as nomClient',
                 'reservations.phone as phoneClient',
                 'reservations.datedebut',
                 'reservations.datefin',
                 'reservations.nbreJour',
                 'reservations.coutSejour',
                 'reservations.type',
                 'reservations.statu',
                 'reservations.id as idReservation',
                 'reservations.created_at as date')
        ->get();
        //dd($listReservation);
        return view('admin.list_reservation',compact('listReservation'));
    }

    public function saveEntreprise(Request $request){

        //dd($request->all());
        try 
        {
            //$this->validate($request,$this->rule,$this->message);

            //$image ="";
            if($request->hasfile('image')){
                $image = $request->file('image');
                $newname = $input['imagename'] = time(). '.' . $image->getClientOriginalname();
                $destination = public_path('/image');
                $image->move($destination, $input['imagename']);
            }

            $matricule = "SP_R".time();

            $entreprise = New Entreprise;

            $entreprise->matricule = $matricule;
            $entreprise->denomination = $request->get('denomination');
            $entreprise->nom_respresentant = $request->get('name');
            $entreprise->contact_representant = $request->get('tel_name');
            $entreprise->contact_entreprise = $request->get('tel_entrep');
            $entreprise->statu = 0;
            $entreprise->email_representant = $request->get('email_entrep');
            $entreprise->logitude = $request->get('longitude');
            $entreprise->latitude = $request->get('latitude');
            $entreprise->logo = $newname;
            $entreprise->nbre_employer = $request->get('nbre_empl');
            $entreprise->localisation = $request->get('autocomplete');
            
            // save du menu nourriture ---- #########
            // $entreprise->save();
            
            if($entreprise->save()){

                $mdp = "PM".time();
                $email = $request->get('email_entrep');
                $nom = $request->get('denomination');
                $user = New User;

                $user->name = $nom;
                $user->email = $email;
                $user->role = "restaurant";
                $user->phone = $request->get('tel_entrep');
                $user->password = Hash::make($mdp);

                $user->save();

            }

            // Communication mail 
            Mail::to($email)
            ->send(new notification_inscription($nom,$email,$mdp));

            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('danger', 'Error.'.$th);
        }

    }

    public function showAgent($id){

        $infoUser = User::where('id',$id)->first();
        $listlistAppart = Appartement::where('user_id',$id)->get();

        //dd($infoUser);

        return view('admin.detail_agent', compact('infoUser','listlistAppart'));

    }
}
