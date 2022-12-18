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
                <h1 class="page-title__name">Connexion </h1>
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
\                <div class="mb-5">
                    <div class="container">
                        <div class="alert alert-success" style="color: #000">
                            <p>{{ Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        @elseif(Session::has('error'))
            <div class="mb-5">
                <div class="container">
                    <div class="alert alert-danger" style="color: #000">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                </div>
            </div>
        @elseif(Session::has('warning'))
        <div class="site-content">
            <div class="">
                <div class="container">
                    <div class="alert alert-warning" style="color: #000">
                        <h2>OOPS!</h2>
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
            <h2 class="mb-5">Connexion</h2>

            <form method="POST" action="{{ route('login') }}" class="form-underline"
                onsubmit="$('#loading').show(),$('#submit').hide();">
                @csrf
                <div class="field-input">
                    <input type="email" placeholder="Adresse e-mail" type="email" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="field-input">
                    <input type="password" name="password" required autocomplete="current-password"
                        placeholder="Mot de passe">
                </div>

                <div class="field-input">
                    <a href="/password" class="float-right">Mot de passe oublié ?</a>
                </div> <!-- form-group form-check .// -->
                <br>

                <div class="field-submit">
                    <input id="submit" type="submit" value="Connexion" class="btn">
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
{{--<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Login -->
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                        <h6 class="text-center">Agent ou Agence immobilière</h6> <hr>
                        
                            <h4 class="card-title mb-4">Connexion</h4>
                            <form method="POST" action="{{ route('login') }}">
@csrf
<a href="#" class="btn btn-primary btn-block mb-4"> <i class="fa fa-google"></i> &nbsp;
    Sign in with Google</a>
<div class="form-group">
    <input class="form-control">
</div> <!-- form-group// -->
<div class="form-group">
    <input class="form-control" placeholder="Mot de passe" type="password"
        class="form-control @error('password') is-invalid @enderror" name="password" required
        autocomplete="current-password">
</div> <!-- form-group// -->

<div class="form-group">
    <a href="/password" class="float-right">Mot de passe oublié ?</a>
    <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input"
            checked="">
        <span class="custom-control-label"> Se souvenir </span>
    </label>
</div> <!-- form-group form-check .// -->
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block"> Connexion </button>
</div> <!-- form-group// -->
<hr>

<a href="/inscription" class="btn btn-facebook btn-block mb-2 text-white">Inscription</a>

</form>
</div> <!-- card-body.// -->
</div> <!-- card .// -->

<p class="text-center mt-4">Vous n'avez pas de compte? <a href="/inscription">S'inscrire</a></p>


</div>
</div>
</div>
</section>--}}
<!-- END LISTING LIST -->

@endsection