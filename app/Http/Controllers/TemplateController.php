<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Residence;
use App\Appartement;
use App\User;
use App\Reservation;
use App\Type;
use App\Clic;
use App\Galerie;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\confirm_reservation;
use App\Mail\alert_reservation;
use Illuminate\Support\Facades\Validator;


class TemplateController extends Controller
{
    public function alltype(){
        $alltype = Type::all();
        return $alltype;
    }

    Public function index(){
        $alltype = $this->alltype();
        $residences = Appartement::where('statu','!=',0)->where('type',1)->OrderBy('id','desc')->get();
        $appartements = Appartement::where('statu','!=',0)->where('type',2)->OrderBy('id','desc')->get();
        
        //dd($residences);
        if(session('success_message')){
            Alert::success('', session('success_message'));
        }

        //dd($residences);
       return view('template.index', compact('residences','appartements','alltype'));
    }

    public function reserveAppartement(Request $request){

        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'phone' => ['required','max:10'], 
            'datedebut' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);
 
        if ($validator->fails()) {
            //dd($validator);
            return back()->withErrors($validator)->withInput();
        }

        $name = $request->get('name');
        $idApp = $request->get('idApp');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $datedebut = $request->get('datedebut');
        $datefin = $request->get('datefin');
        $coutSejour = $request->get('CoutSejour');
        $nbreJour = $request->get('NbreJour');
        $type = $request->get('type');

        if($type == 1){

            $reservation = new Reservation;

            $reservation->name = $name;
            $reservation->email = $email;
            $reservation->phone = $phone;
            $reservation->statu = '0';
            $reservation->id_appartement = $idApp;
            $reservation->datedebut = $datedebut;
            $reservation->datefin = $datefin;
            $reservation->coutSejour = $coutSejour;
            $reservation->nbreJour = $nbreJour;
            $reservation->type = $type;

            $reservation->save();

        }elseif($type == 2){

            $reservation = new Reservation;

            $reservation->name = $name;
            $reservation->email = $email;
            $reservation->phone = $phone;
            $reservation->statu = '0';
            $reservation->id_appartement = $idApp;
            $reservation->datedebut = $datedebut;
            $reservation->type = $type;

            $reservation->save();

        }

        $infoAppart = Appartement::where('id',$idApp)->first();

        $infoAgemt = User::where('id',$infoAppart->user_id)->first();

        $data = array(
            'nom_client' => $name,
            'email_client' => $email,
            'phone_client' =>  $phone,

            'titre' => $infoAppart->titre,
            'localisation' => $infoAppart->localisations,
            'reference' => $infoAppart->ref,

            'nom_agent' => $infoAgemt->name,
            'email_agent' => $infoAgemt->email,
            'date_debut' => $datedebut,
            'date_fin' => $datefin,

            'type' => $type,
            'nbre_jour' => $nbreJour,
            'cout_sejour' => $coutSejour


        );

        // Communication email confirmation reservation
        Mail::to($email)->send(new confirm_reservation($data));

        // Communication email alert reservation
        Mail::to($infoAgemt->email)->send(new alert_reservation($data));

        //return redirect()->route('acceuil')->withSuccessMessage('');
        return redirect('/')->with('success','Votre reservation a bien ete enregistrer.');


        

    }

    Public function showAppartementlocation($id, $type, $lien){

        $ip = request()->ip();

        $clic = new Clic;
        $clic->type = $type;
        $clic->id_appartement = $id;
        $clic->ip = $ip;
        $clic->page = $lien;

        $clic->save();

        //dd($clic); 
        $ref = Appartement::where('id',$id)->select("ref")->first();
        //dd($ref->ref);

        $alltype = $this->alltype();
        $allresidence = Appartement::where('statu',1)->get()->random(4);
        //dd($allresidence);
        $residences = Appartement::where('id',$id)->first();
        $galerie = Galerie::where('id_appartement',$ref->ref)->get();
        //dd($residences);
       return view('template.showAppartement', compact('allresidence','residences','alltype','galerie'));
    }

    Public function inscription(){
        $alltype = $this->alltype();
        return view('template.inscription',compact('alltype'));
    }

    Public function connexion(){
        $alltype = $this->alltype();
        return view('template.connexion',compact('alltype'));
    }

    Public function password(){
        return view('template.password');
    }

    Public function compteUser(){       
        return view('template.compte_user');
    }

    Public function Appartement(){   
        $alltype = $this->alltype(); 
        $appartements = Appartement::where('statu','!=',0)->where('type',2)->get();   
        return view('template.appartements', compact('appartements','alltype'));
    }

    Public function Residence(){   
        $alltype = $this->alltype();   
        $residences = Appartement::where('statu','!=',0)->where('type',1)->get();
        return view('template.residences',compact('residences','alltype'));
    }

    Public function Boncoins(){       
        return view('template.compte_user');
    }

    public function serchAppart(Request $request){

        //dd($request->all());
        $alltype = $this->alltype();   
        $localisation = $request->get('localisation');

        if($request->get('categorie') == 1){
           $residences = Residence::where('localisations','like','%'.$localisation.'%')->get();
           return view('template.residences',compact('residences', 'alltype'));
        }

        if($request->get('categorie') == 2){
            $appartements = Appartement::where('localisations','like','%'.$localisation.'%')->get();
            return view('template.appartements', compact('appartements','alltype'));
         }

         

    }

}
