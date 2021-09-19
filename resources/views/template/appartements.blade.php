@extends('template.layout.master_page_one')

@section('content')
<style>
.items-box {
    padding-left: 10px;
    padding-right: 0px;
    margin-bottom: 11px;
    margin-left: px;
}
</style>

<!-- LISTING LIST -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs__custom-v2 ">
                            <!-- FILTER VERTICAL -->
                            <ul class=" nav-pills" role="tablist">
                            <!-- SEARCH BAR -->
                            <div class="wrapper__section">
                                <div class="wrapper__section__components">
                                    <form action="/recherche/appartement" method="POST">
                                    @csrf
                                        <div class=" search__container">
                                            <div class="row input-group no-gutters">
                                                <div class="col-sm-12 col-md-5">
                                                    <input type="text" name="localisation" class="form-control" aria-label="Text input"
                                                        placeholder="Situation géographique">
                                                </div>
                                                <div class="col-sm-12 col-md-4 input-group">

                                                    <select class="select_option form-control" name="categorie" id="categories">
                                                        <option value="tous" selected>Choisir votre catégorie</option>
                                                        @foreach($alltype as $items)
                                                            <option value="{{ $items->id }}">{{ $items->name }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                                <div class="col-sm-12 col-md-3 input-group-append">
                                                    <button class="btn btn-primary btn-block" type="submit">
                                                        <i class="fa fa-search"></i> <span
                                                            class="ml-1 text-uppercase">Recherche</span>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                                
                            </ul>


                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="pills-tab-two" role="tabpanel"
                                    aria-labelledby="pills-tab-two">
                                    <div class="row">
                                    @if($appartements)
                                    @foreach($appartements as $items)
                                        <div class="col-md-4 col-lg-3">
                                            <!-- ONE -->
                                            <div class="card__image card__box-v1">
                                            <a href="/description/appartement/location/{{$items->id}}/{{$items->type}}/page_appartement" style="text-decoration:none">
                                                <div class="card__image-header h-250">
                                                    <img src="{{asset('immobilier/public/storage/'.$items->image_one)}}" alt="" class="img-fluid w100 img-transition">
                                                </div>
                                                <div class="card__image-body">
                                                    <span class="badge badge-primary mb-2">Appartement à louer</span>
                                                    <h6 class="">{{$items->titre}}</h6>

                                                    <p class="text-capitalize">
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



                            </div>
                            <!-- END FILTER VERTICAL -->
                        </div>
                    </div>
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