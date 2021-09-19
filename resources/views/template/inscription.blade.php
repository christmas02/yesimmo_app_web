@extends('template.layout.master_page')

@section('content')

    <div class="clearfix"></div>

    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <!-- Form Register -->

                        <div class="card mx-auto" style="max-width:520px;">
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @elseif(Session::has('danger'))
                                    <div class="alert alert-danger">Une erreur est survenue. <br>- L'adresse e-mail doit être unique. <br> - Le mot de passe doit être composé minimum de 8 caractères. <br> - Les Créer un mot de passe et Répéter le mot de passe doivent contenir les mêmes valeurs</div>
                                @elseif(Session::has('warning'))
                                    <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                                @endif
                                <h4 class="card-title mb-4">S'identifier</h4>
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
                                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input"
                                                checked="">
                                            <!--<span class="custom-control-label"> Je suis d'accord avec <a href="#">les termes et conditions</a> </span>-->
                                        </label>
                                    </div> <!-- form-group end.// -->
                                </form>
                            </div><!-- card-body.// -->
                        </div>
                    

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
