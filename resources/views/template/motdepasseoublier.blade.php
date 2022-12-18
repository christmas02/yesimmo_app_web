<?php
// Recupretation des parametre de l'activite et de l'enseigne
$urlActuelle = url()->current();
//dd($pageActuelle);
$parametre = explode("/", $urlActuelle);

$domain = $parametre[1];
$url = $parametre[2];
$id = $parametre[4];
$token = $parametre[5];

//dd($parametre);

use App\User;

function getUser($id){
    $user = User::where('id',$id)->first();
    return $user;
}

?>
@extends('template.layout.master_second')

<style>
.padding-box {
    padding: 10px 20px !important;
}
</style>
@section('content')

<main id="main" class="site-main contact-main">
    <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-about.png);">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">Nouveau mot de passe</h1>
                <p class="page-title__slogan"></p>
            </div>
        </div>
    </div><!-- .page-title -->
    <div class="site-content ">
        <div class="container">
            <div class="row">
                <div class="">
                    <div>
                        @if(Session::has('success'))
                        <div class="site-content">
                            <div class="error-wrap">
                                <div class="container">
                                    <div class="alert alert-success" style="color: #000">
                                        <h2>FÉLICITATION!</h2>
                                        <b>Bravo,</b>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .site-content -->
                        @elseif(Session::has('danger'))
                        <div class="site-content">
                            <div class="error-wrap">
                                <div class="container">
                                    <div class="alert alert-danger padding-box" style="color: #000">
                                        <h2>OOPS!</h2>
                                        <b>Désole, une erreur c'est produite.</b>
                                        <p>{{ Session::get('danger') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .site-content -->
                        @elseif(Session::has('warning'))
                        <div class="site-content">
                            <div class="error-wrap">
                                <div class="container">
                                    <div class="alert alert-warning" style="color: #000">
                                        <h2>OOPS!</h2>
                                        <b>Désole, une erreur c'est produite.</b>
                                        <p>{{ Session::get('warning') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .site-content -->
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="contact-form" style="max-width: 500px !important; margin: 0 auto;">
                        <h2 class="mb-5">Mot de passe</h2>

                        <form method="POST" action="/savePassword" class="form-underline"
                            onsubmit="$('#loading').show(),$('#submit').hide();">
                            @csrf
                            <div class="field-input">
                                <input type="text"  placeholder="{{ getUser($id)->email }}" disabled>
                            </div>
                            <div class="field-input">
                            <input type="hidden" value="{{ $id }}" name="id_user">
                                <input type="password" name="password" required autocomplete="current-password"
                                    placeholder="Mot de passe">
                            </div>
                            <div class="field-input">
                                <input type="password" name="password_confirmation" required autocomplete="current-password"
                                    placeholder="Mot de passe">
                            </div>

                            <br>

                            <div class="field-submit">
                                <input id="submit" type="submit" value="Nouveau mot de passe" class="btn">
                                <div class="btn" id="loading" style="display:none">
                                    <i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i>
                                    <i class="czi-user mr-2 ml-n1"></i>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div><!-- .site-content -->
</main><!-- .site-main -->

<!-- LISTING LIST -->

<!-- END LISTING LIST -->

@endsection