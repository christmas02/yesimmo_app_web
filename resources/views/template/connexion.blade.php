@extends('template.layout.master_page')

@section('content')

    <div class="clearfix"></div>

    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Login -->
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                        <h6 class="text-center">Agent ou Agence immobilière</h6> <hr>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @elseif(Session::has('warning'))
                            <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                        @endif
                            <h4 class="card-title mb-4">Connexion</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                {{--<a href="#" class="btn btn-primary btn-block mb-4"> <i class="fa fa-google"></i> &nbsp;
                                    Sign in with Google</a>--}}
                                <div class="form-group">
                                    <input class="form-control" placeholder="Identifiant" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div> <!-- form-group// -->

                                <div class="form-group">
                                    <a href="/password" class="float-right">Mot de passe oublié ?</a>
                                    <label class="float-left custom-control custom-checkbox"> <input type="checkbox"
                                            class="custom-control-input" checked="">
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

                    {{--<p class="text-center mt-4">Vous n'avez pas de compte? <a href="/inscription">S'inscrire</a></p>--}}
                    

                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->



    <!-- CALL TO ACTION -->
    <section class="cta-v1 py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                   
                </div>
                <div class="col-lg-3">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- END CALL TO ACTION -->
 
@endsection
