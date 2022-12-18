@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                   <img src="http://yesimmo.ci/template/images/logo-blue-stiky.png" style="width:200px; margin:50px 0px;">
                   <br>
                   <h3>Votre compte a été confirmé. Veuillez, vous connectez pour bénéficier des avantages de Yesimmo </h3> 
                   <br>
          
                   <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Acceuil') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                   <br>
                   <br>
                   <hr>
                   <i>L'équipe de Yesimmo vous remercie.</i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
