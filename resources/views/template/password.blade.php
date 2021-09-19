@extends('template.layout.master_page')

@section('content')

    <div class="clearfix"></div>

    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Login -->
                    <div class="card mx-auto" style="max-width: 500px;">
                        <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @elseif(Session::has('warning'))
                            <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                        @endif
                            <h4 class="card-title text-center mb-4">Modification de mot de passe</h4>
                            <br>
                            <form method="POST" action="/modification/motPasse">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Adresse élèctronique" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div> <!-- form-group// -->
                                <hr>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Modification </button>
                                </div> <!-- form-group// -->

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
