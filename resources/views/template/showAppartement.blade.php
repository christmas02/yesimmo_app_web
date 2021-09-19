@extends('template.layout.master_page_one')

@section('content')
<style>
.items-box {
    padding-left: 10px;
    padding-right: 0px;
    margin-bottom: 11px;
    margin-left: px;
}

.btn-modal{
    background-color: #ccc;
    color: gray;
    border-radius: 50%;
}
.form-check-input{

}
input:checked + .slider {
  background-color: #2196F3;
}
label{
    font-size: 18px;
    text-align: center;
}
.silde{
    margin: 0 190px;
}
.modal-title{
    
    color: #fff;
    
}
.modal-header{
    background-color: white;
    text-align: center !important;
    border-bottom: 1px solid white;
    padding-left: 40px;
}
.modal-header h5{
    text-align: center !important;
}
.modal-footer-btn{
    margin: 30px 30%;
}
.form-check-label{
  margin-left: 5px;
}
.modal-content{
    border-radius: 10px !important;
    
}
.modal-body{
    padding: 0px 40px !important;
}
.modal-header{
    border-radius: 10px !important;
    
}
</style>
<!-- SINGLE DETAIL -->
<section class="single__Detail" style="padding: 2px;">
        <div class="container">
        @if(Session::has('success'))
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		@elseif(Session::has('danger'))
			<div class="alert alert-danger">{{ Session::get('danger') }}</div>
		@elseif(Session::has('warning'))
			<div class="alert alert-warning">{{ Session::get('warning') }}</div>
		@endif
            <div class="row">
               <div class="col-md-8 col-lg-8">
                    <div class="single__detail-title mt-4">
                        <h3 class="text-capitalize">{{$residences->titre}}</h3>
                        <p> {{$residences->localisations}}</p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 0px; margin-bottom:15px; border-radius:100px;">
                <div class="col-lg-6" style="padding: 0px;">
                    <div class="slider__image__detail-large-one">
                        <img src="{{asset('immobilier/public/storage/'.$residences->image_one)}}" alt="" width="570" height="380" class="w-100 img-transition">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @if($galerie)
                        @foreach($galerie as $items)
                        <div class="items-box col-lg-6">
                            <div class="slider__image__detail-large-one">
                                <img src="{{asset('immobilier/public/storage/'.$items->image)}}" alt="yesimmo" width="275" height="184" class="w-100 img-transition">
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="single__detail-title mt-4">
                        <h3 class="text-capitalize"> {{$residences->nom_residence}} </h3>
                        <p> {{$residences->localisations}}</p>
                    </div>
                </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="single__detail-price mt-4">
                            @if($residences->type == 1)
                                <h3 class="text-capitalize text-gray">{{ number_format($residences->montant) }} .XOF / Jours</h3>
                            @elseif($residences->type == 2)
                            <h3 class="text-capitalize text-gray">{{ number_format($residences->montant) }} .XOF / Mois</h3>
                            @endif
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-print"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-exchange"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
            </div>
        
            {{--<div class="row"> 
                <div class="col-md-12">
                    <!-- SLIDER IMAGE DETAIL -->
                    <div class="slider__image__detail-large owl-carousel owl-theme">
                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="{{asset('/image/'.$residences->image_one)}}" alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                                        </figure>
                                        <span class="badge badge-primary text-capitalize mb-2">Appartement meublé</span>
                                        <div class="price">
                                            <h5 class="text-capitalize">{{ number_format($residences->montant) }} .XOF / Jours</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{$residences->titre}}</h4>

                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="{{asset('/image/'.$residences->image_two)}}" alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                                        </figure>
                                        <span class="badge badge-primary text-capitalize mb-2">Appartement meublé</span>
                                        <div class="price">
                                            <h5 class="text-capitalize">{{ number_format($residences->montant) }} .XOF / Jours</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{$residences->titre}}</h4>

                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="{{asset('/image/'.$residences->image_three)}}" alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                                        </figure>
                                        <span class="badge badge-primary text-capitalize mb-2">Appartement meublé</span>
                                        <div class="price">
                                            <h5 class="text-capitalize">{{ number_format($residences->montant) }} .XOF / Jours</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{$residences->titre}}</h4>

                                    </div>
                                </div>

                            </div>
                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="{{asset('/image/'.$residences->image_for)}}" alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                                        </figure>
                                        <span class="badge badge-primary text-capitalize mb-2">Appartement meublé</span>
                                        <div class="price">
                                            <h5 class="text-capitalize">{{ number_format($residences->montant) }} .XOF / Jours</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{$residences->titre}}</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="{{asset('/image/'.$residences->image_five)}}" alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                                        </figure>
                                        <span class="badge badge-primary text-capitalize mb-2">Appartement meublé</span>
                                        <div class="price">
                                            <h5 class="text-capitalize">{{ number_format($residences->montant) }} .XOF / Jours</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{$residences->titre}}</h4>

                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="slider__image__detail-thumb owl-carousel owl-theme">
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{asset('/image/'.$residences->image_one)}}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{asset('/image/'.$residences->image_two)}}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{asset('/image/'.$residences->image_three)}}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{asset('/image/'.$residences->image_for)}}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{asset('/image/'.$residences->image_five)}}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>

                    </div>
                    <!-- END SLIDER IMAGE DETAIL -->
                </div>
                <!-- END SLIDER IMAGE DETAIL -->
                
            </div> 

            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="single__detail-title mt-4">
                        <h3 class="text-capitalize">{{$residences->titre}}</h3>
                        <p> {{$residences->localisations}}</p>
                    </div>
                </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="single__detail-price mt-4">
                                <h3 class="text-capitalize text-gray">{{ number_format($residences->montant) }} .XOF / Jours</h3>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-print"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-exchange"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
            </div>--}}
            <div class="row">
                <div class="col-lg-8">
                    <!-- DESCRIPTION -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single__detail-desc">
                                <h6 class="text-capitalize detail-heading">description</h6>
                                <div class="">
                                    <p>{{$residences->description }}</p>

                                </div>
                            </div>
                            <div class="clearfix"></div>

                           
                         
                           
                            <!-- END FLOR PLAN -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">Visite guidé</h6>
                                <div class="single__detail-features-video">
                                    <!--<figure class=" mb-0">
                                        <div class="home__video-area text-center">
                                            <img src="images/1920x1080.jpg" alt="" class="img-fluid">
                                            <a href="https://youtu.be/dQtLx6dsbcI" class="play-video-1 ">
                                                <i class="icon fa fa-play text-white"></i>
                                            </a>
                                        </div>

                                    </figure>-->
                                </div>
                            </div>

                            <!-- LOCATION -->
                            <div class="single__detail-features">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    
                                    


                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-map-location" role="tabpanel"
                                        aria-labelledby="pills-map-location-tab">
                                       

                                    </div>
                                    <!--<div class="tab-pane fade" id="pills-street-view" role="tabpanel"
                                        aria-labelledby="pills-street-view-tab">
                                        <iframe class="h600 w100"
                                            src="https://www.google.com/maps/embed?pb=!4v1553797194458!6m8!1m7!1sR4K_5Z2wRHTk9el8KLTh9Q!2m2!1d36.82551718071267!2d-76.34864590837246!3f305.15097!4f0!5f0.7820865974627469"
                                            style="border:0;" allowfullscreen></iframe>
                                    </div>-->


                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                            <!-- END LOCATION -->

                            <!-- PROPERTY VIEWS -->
                        </div>
                    </div>
                    <!-- END DESCRIPTION -->
                </div>
                <div class="col-lg-4">
                    <!-- FORM FILTER -->
                    <div class="products__filter mb-30">
                        <div class="products__filter__group">
                        @if($residences->type == 1)
                           <div class="products__filter__header">
                                <h5 class="text-center text-capitalize">Programmer une visite</h5>
                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <a href="" class="btn btn-primary text-capitalize btn-block" data-toggle="modal" data-target="#residence">
                                    <i class="fa fa- ml-1"></i> Reservation </a>
                                </div>
                            </div>
                        @elseif($residences->type == 2)
                            <div class="products__filter__header">
                                <h5 class="text-center text-capitalize">Programmer une visite</h5>
                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <a href="" class="btn btn-primary text-capitalize btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa- ml-1"></i> Reservation </a>
                                </div>
                            </div>

                        @endif
                        </div>
                    </div>
                    <!-- END FORM FILTER -->
                    
                </div>
            </div>

            <!-- SIMILIAR PROPERTY -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="similiar__item">
                        <h6 class="text-capitalize detail-heading">
                        </h6>
                        
                    </div>
                </div>
            </div>
            <!-- END SIMILIAR PROPERTY -->
        </div>
</section>
    <!-- END SINGLE DETAIL -->


    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="" id="exampleModalLongTitle">Réservation d'une visite</h5>
   
      </div>
      <form method="POST" action="/save/revervation/appartement" id="form">
      <div class="modal-body">
        
        <br>
        <div class="row">
            <div class="col-lg-7">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nom et prénom</label>
                        <input type="text" name="name" class="form-control" required="required">
                        <input type="text" name="idApp" hidden class="form-control" value="{{$residences->id}}" required="required">
                        <input type="text" name="type" value="2" hidden>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Numéro de téléphone</label>
                        <input type="text" name="phone" class="form-control" required="required">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" name="email" class="form-control" required="required">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Date de rendez-vous</label>
                        <input type="date" name="datedebut" class="form-control" required="required">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;"><img src="{{asset('immobilier/public/storage/'.$residences->image_one)}}" alt="" class="img-fluid w-100 img-transition"></div><br>
                <div class="col-md-12"><h5>{{$residences->titre}}</h5><h5 class="text-capitalize text-gray">Loyer : {{ number_format($residences->montant) }} .XOF / Mois</h5><span>NB: vous devez prevois des frais de viste, 
                        (5.000 FR ...) Ce montant vous donne droit à 3 visite d'appartement</span></div>
                
                </div>

            </div>
        
            
        
            
        </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit"  class="btn btn-primary">Reserver</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="residence" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="" id="exampleModalLongTitle">Réservation cette appartement</h5>
   
      </div>
      <form method="POST" action="/save/revervation/appartement" id="form">
      <div class="modal-body">
        
        <br>
        <div class="row">
            <div class="col-lg-7">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nom et prénom</label>
                        <input type="text" name="name" class="form-control" required="required">
                        <input type="text" name="idApp" hidden class="form-control" value="{{$residences->id}}" required="required">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Numéro de téléphone</label>
                        <input type="text" name="phone" class="form-control" required="required">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" name="email" class="form-control" required="required">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Debut de sejours</label>
                            <input type="date" name="datedebut" id="datedebut" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fin de sejours</label>
                            <input type="date" name="datefin" id="datefin" class="datefin form-control" required="required">
                            <input value="{{ $residences->montant }}" id="jour" hidden/>
                            <input type="text" name="CoutSejour" id="CoutSejour" value="" hidden>
                            <input type="text" name="NbreJour" id="NbreJour" value="" hidden>
                            <input type="text" name="type" value="1" hidden>
                        </div>
                    </div>
                    <div id="alertsup">La date de fin doit etre apres la date de début !</div>
                    <div id="alertegal">La date de début et fin sont identique</div>
                    <div class="col-md-12">
                        <span id="nbreJour"></span> <br>
                        <span id="logement"></span> <br>
                        <hr>
                        <span id="coutSejour"></span>
                        
                    </div>


                </div>
                
            </div>
            <div class="col-lg-5">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;"><img src="{{asset('immobilier/public/storage/'.$residences->image_one)}}" alt="" class="img-fluid w-100 img-transition"></div><br>
                <div class="col-md-12"><h5>{{$residences->titre}}</h5><h5 class="text-capitalize text-gray">Loyer : {{ number_format($residences->montant) }} .XOF / Jour</h5><span></span></div>
                </div>

            </div>
        
            
        
            
        </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit"  class="btn btn-primary">Reserver</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).on('submit', '[id^=form]', function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    swal({
        title: "Are you sure?",
        text: "Do you want to Send this email",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, send it!",
        cancelButtonText: "No, cancel pls!",
    }).then(function () {
        $('#form').submit();
    });
    return false;
    });
</script>



<script type="text/javascript">
    var date1 = new Date("12/12/2020");
    var date2 = new Date("12/12/2021");
    // différence des heures
    var time_diff = date2.getTime() - date1.getTime();
    // différence de jours
    var days_Diff = time_diff / (1000 * 3600 * 24);
    // afficher la différence
    //alert(days_Diff);
</script>

   
@endsection
