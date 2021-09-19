@extends('template.layout.master')

@section('content')

   
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-3">
            <div class="container grid-breadcrumb">
                <ul class="breadcrumbs-custom-path mt-md-2">
                    <li><a href="index.html">Speedfood</a></li>
					<span class="fa fa-angle-double-right mx-2" aria-hidden="true"></span>
                    <li class="active"> Espace membre</li>
					<span class="fa fa-angle-double-right mx-2" aria-hidden="true"></span>
					<li class="">
					    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Déconnexion') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- contact1 -->

    <!-- contact1 -->
    <section class="w3l-contact-11 py-5">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- /contact1 -->

	<div style="margin: 8px auto; display: block; text-align:center;">


 
@endsection
