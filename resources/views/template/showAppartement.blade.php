@extends('template.layout.master_second')

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
<main id="main" class="site-main single single-02">
	<div class="place">
		<div class="slick-sliders">
			<div class="slick-slider" data-item="1" data-arrows="true" data-itemscroll="1" data-dots="true" data-infinite="true" data-centermode="true" data-centerpadding="418px" data-tabletitem="1" data-tabletscroll="1" data-tabletpadding="70px" data-mobileitem="1" data-mobilescroll="1" data-mobilepadding="30px">
			<div class="place-slider__item bd"><a title="Place Slider Image" href="#"><img src="{{asset('/immobilier/public/storage/'.$residences->image_one)}}" alt="slider-01"></a></div>
			@if($galerie)
			@foreach($galerie as $items)
			<div class="place-slider__item bd"><a title="Place Slider Image" href="#"><img src="{{asset('/immobilier/public/storage/'.$items->image)}}" alt="slider-01"></a></div>
			@endforeach
			@endif
		</div><!-- .page-title -->
		<div class="place-share">
				<a title="Save" href="#" class="add-wishlist">							
					<i class="la la-bookmark large"></i>
				</a>
				<a title="Share" href="#" class="share">									
					<i class="la la-share-square la-24"></i>
				</a>
				<div class="social-share"><div class="list-social-icon"> 
					<a class="facebook" onclick="window.open('https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer', 'toolbar=0,status=0');" href="javascript:void(0)"> <i class="fab fa-facebook-f"></i> </a> 
					<a class="twitter" onclick="popUp=window.open('https://twitter.com/share?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer','scrollbars=yes');popUp.focus();return false;" href="javascript:void(0)"> <i class="fab fa-twitter"></i> </a>  
					<a class="linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;title=The+Louvre','sharer','scrollbars=yes');popUp.focus();return false;" href="javascript:void(0)"> <i class="fab fa-linkedin-in"></i> </a> 
					<a class="pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;description=The+Louvre&amp;media=https://wp.getgolo.com/wp-content/uploads/2019/10/ef3cc68f-2e02-41cc-aad6-4b301a655555.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:void(0)"> <i class="fab fa-pinterest-p"></i> </a></div></div>
			</div><!-- .place-share -->
			<div class="place-slider__nav slick-nav">
			<div class="place-slider__prev slick-nav__prev">
				<i class="las la-angle-left"></i>
			</div><!-- .place-slider__prev -->
			<div class="place-slider__next slick-nav__next">		
				<i class="las la-angle-right"></i>
			</div><!-- .place-slider__next -->
		</div><!-- .place-slider__nav -->
		</div><!-- .place-slider -->
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="place__left">
						
						<div class="place__box place__box--npd">
							<h1>{{$residences->titre}}</h1>
							<div class="place__meta">
								@if($residences->type == 1)
									<div class="place__currency">{{ number_format($residences->montant) }} .XOF / Jours</div>
								@elseif($residences->type == 2)
									<div class="place__currency">{{ number_format($residences->montant) }} .XOF / Mois</div>
								@endif
								- 
								<div class="place__category">
									
									<div class="address">
								<i class="la la-map-marker"></i>
								{{$residences->localisations}}
								<a href="#" title="Direction"></a>
							</div>
								</div>

							</div><!-- .place__meta -->
						</div><!-- .place__box -->
						
						<div class="place__box place__box-overview">
							<h3>Descriptiion</h3>
							<div class="">{{$residences->description}} .</div><!-- .place__desc -->
						</div>

						{{--<div class="place__box">
							<h3>Contact Info</h3>
							<ul class="place__contact">
								<li>									
									<i class="la la-phone"></i>
									<a title="00 343 7859" href="tel:003437859">00 343 7859</a>
								</li>
								<li>											
									<i class="la la-globe"></i>
									<a title="www.abcsite.com" href="www.abcsite.html">www.abcsite.com</a>
								</li>
								<li>											
									<i class="la la-facebook-f"></i>
									<a title="fb.com/abc" href="fb.com/abc.html">facebook.com/getgolo</a>
								</li>
								<li>											
									<i class="la la-instagram"></i>
									<a title="instagram.com/abc" href="instagram.com/abc.html">instagram.com/getgolo</a>
								</li>
							</ul>
						</div><!-- .place__box -->--}}
						
						
					</div><!-- .place__left -->
				</div>

				<div class="col-lg-4">
					<div class="sidebar sidebar--shop sidebar--border">
					@if($residences->type == 1)
						<div class="widget-reservation-mini">
							<h3>Programmer une visite</h3>
							<a href="#" class="open-wg btn">Request</a>
						</div>
						<aside class="widget widget-shadow widget-reservation">
							<h3>Réservation cette appartement</h3>
							<form action="/save/revervation/appartement" method="POST" class="form-underline" onsubmit="$('#loading').show(),$('#submit').hide();">
							@csrf
								<div class="field-select has-sub field-guest">
									<span class="sl-icon"><i class="la la-user"></i></span>
									<input type="text" name="name" placeholder="Nom prenom" value="{{ old('name') }}" required>
									<input type="text" name="idApp" hidden  value="{{$residences->id}}">
									@error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="field-select has-sub field-guest">
									<span class="sl-icon"><i class="la la-at"></i></span>
									<input type="text" name="email" placeholder="Adresse electronique" value="{{ old('email') }}" required>
									@error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="field-select has-sub field-guest">
									<span class="sl-icon"><i class="la la-phone"></i></span>
									<input type="number" name="phone" placeholder="Nunero de telephone" value="{{ old('phone') }}" maxlength="10" size="10" required>
									@error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="field-select field-date">
									<span class="sl-icon"><i class="la la-calendar-alt"></i></span>
									<input type="date" name="datedebut" id="datedebut" placeholder="Date debut de sejour" value="{{ old('datedebut') }}" required class="">
									@error('datedebut')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>

								<div class="field-select field-date">
									<span class="sl-icon"><i class="la la-calendar-alt"></i></span>
									<input type="date" id="datefin" name="datefin" placeholder="Date fin de sejour" value="{{ old('datefin') }}" required class="">
									@error('datefin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

									<input value="{{ $residences->montant }}" id="jour" hidden/>
									<input type="text" id="CoutSejour" name="CoutSejour" value="" hidden>
									<input type="text" id="NbreJour" name="NbreJour" value="" hidden>
									<input type="text" name="type" value="1" hidden>
								</div>
								<div class="col-md-12">
									<div class="box_reservation" style="text-align: left"></div>
								</div>
								<br>
								<!--<input class="btn" id="btn" type="submit" name="submit" value="Reserver">
								<div id="loading">
									<i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i> 
									<i class="czi-user mr-2 ml-n1"></i>
								</div>-->
								<div class="field-submit">
										<input id="submit" type="submit" value="Rerserve l'appartement" class="btn">
                                        <div class="btn" id="loading" style="display:none">
                                            <i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i> 
                                            <i class="czi-user mr-2 ml-n1"></i>
                                        </div>
								</div>
								
								<p class="note"></p>
							</form>

							
						</aside><!-- .widget-reservation -->
					@elseif($residences->type == 2)
						<div class="widget-reservation-mini">
							<h3>Programmer une visite</h3>
							<a href="#" class="open-wg btn">Request</a>
						</div>
						<aside class="widget widget-shadow widget-reservation">
							<h3>Programmer une visite</h3>
							<form action="/save/revervation/appartement" method="POST" class="form-underline" onsubmit="$('#loading').show(),$('#submit').hide();">
							@csrf
								<div class="field-select has-sub field-guest">
									<span class="sl-icon"><i class="la la-user"></i></span>
									<input type="text" name="name" placeholder="Nom prenom" value="{{ old('name') }}" required>
									<input type="text" name="idApp" hidden class="form-control" value="{{$residences->id}}" required="required">
                        			<input type="text" name="type" value="2" hidden>
									@error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="field-select has-sub field-guest">
									<span class="sl-icon"><i class="la la-at"></i></span>
									<input type="text" name="email" placeholder="Adresse electronique" value="{{ old('email') }}" required>
									@error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="field-select has-sub field-guest">
									<span class="sl-icon"><i class="la la-phone"></i></span>
									<input type="text" name="phone" placeholder="Nunero de telephone" value="{{ old('phone') }}" required>
									@error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="field-select field-date">
									<span class="sl-icon"><i class="la la-calendar-alt"></i></span>
									<input type="date" name="datedebut" placeholder="Date de la visite" value="{{ old('datedebut') }}" required class="">
									@error('datedebut')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
								</div>
							
								<!--<input class="btn" id="btn" type="submit" value="">
								<div id="loading">
									<i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i> 
									<i class="czi-user mr-2 ml-n1"></i>
								</div>-->
								<div class="field-submit">
										<input id="submit" type="submit" value="Rerserve la visite"" class="btn">
                                        <div class="btn" id="loading" style="display:none">
                                            <i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i> 
                                            <i class="czi-user mr-2 ml-n1"></i>
                                        </div>
								</div>

								<p class="note"></p>
							</form>
						</aside><!-- .widget-reservation -->

					@endif
					</div><!-- .sidebar -->
				</div>
			</div>
		</div>
	</div><!-- .place -->

	<!-- .similar-places -->
	<div class="similar-places">
		<div class="container">
			<h2 class="similar-places__title title">Autres appartements</h2>
			<div class="similar-places__content">
				<div class="row">
					@if($allresidence)
					@foreach($allresidence as $items)
					<div class="col-lg-3 col-md-6">
					<div class="place-item layout-02 place-hover margin_box" data-maps_name="mattone_restaurant">
                            <div class="place-inner">
                                        <div class="place-thumb hover-img">
                                            <a class="entry-thumb" href="/description/appartement/location/{{$items->id}}/{{$items->type}}/accueil">
                                                <img src="{{asset('/immobilier/public/storage/'.$items->image_one)}}" alt=""></a>
                                            <a href="/description/appartement/location/{{$items->id}}/{{$items->type}}/accueil" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
                                                <span class="icon-heart">
                                                    <i class="la la-bookmark large"></i>
                                                </span>                                    
                                            </a>       
											@if($items->type == 1)
                                            <a class="entry-category rosy-pink" href="#">
                                                <i class="las la-bed"></i><span>Résidences meublées</span>
                                            </a>
											@elseif($items->type == 2)
											<a class="entry-category blue" href="#">
                                                <i class="las la-home"></i><span>Appartement à louer</span>
                                            </a>
											@endif
                                            <a href="#" class="author" title="Author"><img src="template/images/favicon-yesimmo.png" alt="Author"></a>
                                        </div>       
                                        <div class="entry-detail">
                                            <h3 class="place-title"><a href="/description/appartement/location/{{$items->id}}/{{$items->type}}/accueil">{{$items->titre}}</a></h3>
                                            <div class="open-now"> <i class="las la-map-marker"></i> {{$items->localisations}}</div>
                                            <div class="entry-bottom">
                                                <div class="place-price">
                                                    <span>{{ number_format($items->montant) }} .XOF / Jours</span>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
					</div>
					@endforeach
					@endif

				</div>
			</div>
		</div>
	</div><!-- .similar-places -->


</main><!-- .site-main -->
<!-- END SINGLE DETAIL -->




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
