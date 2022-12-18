@extends('template.layout.master_second')

@section('content')
<main id="main" class="site-main contact-main">
    <div class="business-about" style="background-image: url(template/images/img_about_1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="business-about-info">
                        <h2 style="color:#fff !important" class="offset-item">Deviens Agent Immobilier</h2>
                        <p style="color:#fff !important" class="offset-item">Obtiens plus de visibilité de tes biens
                            immobiliers auprès de la clientèle.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .business-about -->

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
                        <h2 class="mb-5">S'identifier</h2>

                        <form method="POST" action="{{ route('register') }}" class="form-underline"
                            onsubmit="$('#loading').show(),$('#submit').hide();">
                            @csrf
                            <div class="field-input">
                                <input type="text" name="name" class="form-control" placeholder="Prénom"
                                    value="{{ old('name') }}" required>
                                <input class="form-control" hidden name="role" type="" value="agent">
                                @error('name')
                                <span class="alert-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="field-input">
                                <input type="text" name="lastname" class="form-control" placeholder="Nom"
                                    value="{{ old('lastname') }}" required>
                                @error('lastname')
                                <span class="alert-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="field-input">
                                <input type="email" name="email" class="form-control" placeholder="Adresse élèctronique"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                <span class="alert-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="field-input">
                                <input type="text" name="phone" class="form-control" placeholder="Numéro de téléphone"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                <span class="alert-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="field-input">
                                <input type="password" name="password" placeholder="Créer un mot de passe">

                                @error('password')
                                <span class="alert-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="field-input">
                                <input type="password" name="password_confirmation"
                                    placeholder="Répéter le mot de passe">
                                @error('password_confirmation')
                                <span class="alert-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="field-input">
                                <small class="form-text text-muted">Vos informations resteront confidentielles.</small>

                            </div>



                            <br>

                            <div class="field-submit">
                                <input id="submit" type="submit" value="Inscription" class="btn">
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
                     <!-- Form Register -->

                        <div class="card mx-auto" style="max-width:520px;">
                            <div class="card-body">
                                
                                <h4 class="card-title mb-4"></h4>
                                <form method="POST" action="{{ route('register') }}">
@csrf
<div class="form-row">
    <div class="col form-group">
        <label>Prénoms</label>
        <input type="text" name="name" class="form-control" placeholder="" required>
    </div> <!-- form-group end.// -->
    <div class="col form-group">
        <label>Nom </label>
        <input type="text" name="lastname" class="form-control" placeholder="" required>
    </div> <!-- form-group end.// -->
</div> <!-- form-row end.// -->
<div class="form-row">
    <div class="form-group col-md-6">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control" placeholder="" required>
        <small class="form-text text-muted">Vos informations resteront confidentielles.</small>
    </div> <!-- form-group end.// -->
    <div class="form-group col-md-6">
        <label>Numéro de téléphone</label>
        <input class="form-control" name="phone" type="phone" required>
        <input class="form-control" hidden name="role" type="" value="agent">
    </div> <!-- form-group end.// -->
</div> <!-- form-group end.// -->

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Créer un mot de passe</label>
        <input class="form-control" name="password" type="password" required>
    </div> <!-- form-group end.// -->
    <div class="form-group col-md-6">
        <label>Répéter le mot de passe</label>
        <input class="form-control" name="password_confirmation" type="password" required>
    </div> <!-- form-group end.// -->
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block"> Inscription </button>
</div> <!-- form-group// -->
<div class="form-group">
    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="">
        <!--<span class="custom-control-label"> Je suis d'accord avec <a href="#">les termes et conditions</a> </span>-->
    </label>
</div> <!-- form-group end.// -->
</form>
</div><!-- card-body.// -->
</div>


</div>
</div>
</div>
</section>--}}
<!-- END LISTING LIST -->



@endsection