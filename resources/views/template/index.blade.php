@extends('template.layout.master')

@section('content')

    <!-- FEATURED PROPERTIES -->
    <section class="featured__property ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center">
                        Résidences meublées.
                        </h2>
                        <p class="text-center">Les meilleures offres de résidences meublées à votre disposition.</p>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                    @if($residences)
                    @foreach($residences as $items)
                        <div class="col-md-3">
                            <!-- ONE -->
                            <div class="card__image card__box">
                            <a href="/description/appartement/location/{{$items->id}}/{{$items->type}}/accueil" style="text-decoration:none">
                                <div class="card__image-header h-250">
                                    <img src="{{asset('immobilier/public/storage/'.$items->image_one)}}" alt="" class="img-fluid w100 img-transition">
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary mb-2">Résidences meublées</span>
                                    <h6 class="">{{$items->titre}}</h6>

                                    <p class="">
                                        <i class="fa fa-map-marker"></i>
                                        {{$items->localisations}}
                                    </p>
                                    
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                           

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item ">
                                            <h6>{{ number_format($items->montant) }} .XOF / Jours</h6>
                                        </li>

                                    </ul>
                                </div>
                            </a>
                            </div>
                        </div>
                    @endforeach  
                    @endif
            </div>
        </div>
    </section>
    <!-- END FEATURED PROPERTIES -->

    <!-- RECENT PROPERTY -->
    <section class="featured__property bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center">
                            Appartements en location
                        </h2>
                        <p class="text-center">Les meilleures offres d'appartements à louer à votre disposition.</p>

                    </div>
                </div>
            </div>
            <div class="row">
                    @if($appartements)
                    @foreach($appartements as $items)
                        <div class="col-md-3">
                            <!-- ONE -->
                            <div class="card__image card__box">
                            <a href="/description/appartement/location/{{$items->id}}/{{ $items->type }}/accueil" style="text-decoration:none">
                                <div class="card__image-header h-250">
                                    <img src="{{asset('immobilier/public/storage/'.$items->image_one)}}" alt="" class="img-fluid w100 img-transition">
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary mb-2">Appartement à louer</span>
                                    <h6 class="">
                                       {{$items->titre}}
                                    </h6>

                                    <p class="">
                                        <i class="fa fa-map-marker"></i>
                                        {{$items->localisations}}
                                    </p>
                             
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                           

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item ">
                                            <h6>{{ number_format($items->montant) }} .XOF / Mois</h6>
                                        </li>

                                    </ul>
                                </div>
                            </a>
                            </div>
                        </div>
                    @endforeach  
                    @endif
            </div>
            
        </div>
    </section>
    <!-- END RECENT PROPERTY -->

    
    <!-- ABOUT -->
    <section class="home__about bg-theme-v0">
        <div class="container">
            <div class="row">
                <div class="col-md-7" style="color:aliceblue">
                    <div class="title__leading">
                        <!-- <h6 class="text-uppercase">trusted By thousands</h6> -->
                        <h2 class="text-capitalize color-white"> Deviens agent immobilier</h2>
                        <p class="color-white">
                            Obtiens plus de visibilité de tes biens immobiliers auprès de la clientèle.
                        </p>
                        
                        <a href="inscription" class="btn btn-primary mt-3 text-capitalize"> S'inscrire
                            <i class="fa fa-angle-right ml-3 "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- MOST POPULAR PLACES -->
    <section class="wrap__heading ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center">
                            Espace de détente 
                        </h2>
                        <p class="text-center text-capitalize">Trouve des espaces agréables pour un moment entre amis ou en famille.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-xl-5 col-padd">
                    <!-- CARD IMAGE -->

                    <a href="#">
                        <div class="card__image-hover-style-v3">
                            <div class="card__image-hover-style-v3-thumb h-475">
                                <img src="template/images/lewafou.jpg" alt="" class="img-fluid w-100">
                            </div>
                            <div class="overlay">
                                <div class="desc">
                                    <h6 class="text-capitalize">Abidjan</h6>
                                    <p class="text-capitalize">LE WAFOU - BIETRY </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 col-xl-7">
                    <div class="row">
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="template/images/tai.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">Tai foret</h6>
                                            <p class="text-capitalize">TAÏ FOREST LODGE</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="template/images/Assinie.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">Assinie Km 11</h6>
                                            <p class="text-capitalize">ARTAYA LODGE </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="template/images/ASSINIE.png" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">ASSINIE</h6>
                                            <p class="text-capitalize"> SABBAT PLAGE ASSINIE </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="template/images/Bassam.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">Grand Bassam, Quartier Franc</h6>
                                            <p class="text-capitalize"> PARADIS TROPICAL </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END MOST POPULAR PLACES -->

    <!-- CALL TO ACTION -->
    <section class="bg-theme-v1">
        <div class="cta">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center">
                        <img src="">
                        <h2 class="text-uppercase text-white">
                            <img src="template/images/logo-blue.png" width="200">
                        </h2>
                        <h3 class="text-white">L’agence immobilière repensée pour mieux vous accompagner</h3>
                        <!--<h2 class="text-white">Le digital au service de l'immobilier. </h2>-->
                        <a href="#" class="">
                            <i class=""></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
