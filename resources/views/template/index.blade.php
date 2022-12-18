@extends('template.layout.master')

@section('content')

<main id="main" class="site-main overflow">

			<div class="site-banner" style="width:100%, background-image: url(https://yesimmo.ci/template/images/bg/banner.png);">
				<div class="container">
					<div class="site-banner__content">
						<h1 class="site-banner__title text-white">Trouvez votre maison de rêve</h1>
						<form action="#" class="site-banner__search layout-02">
                            <div class="field-input">
                                <label for="s"></label>
                                <input class="site-banner__search__input open-suggestion" id="s" type="text" name="s" placeholder="Ex: fastfood, beer" autocomplete="off">
                                <div class="search-suggestions name-suggestions">
								   <ul>
									@foreach($alltype as $items)
                                        <li><a href="#"><span><option value="{{ $items->id }}"><span><i class="las la-utensils"></i><span> {{ $items->name }}</option></span></a></li>
									@endforeach
                                    </ul>
                                </div>
                            </div><!-- .site-banner__search__input -->
                            <div class="field-input">
                                <label for="loca">Commune</label>
                                <input class="site-banner__search__input open-suggestion" id="loca" type="text" name="where" placeholder="Your city" autocomplete="off">
                                <div class="search-suggestions location-suggestions">
                                    <ul>
                                        <li><a href="#"><span>Current location</span></a></li>
                                        <li><a href="#"><span>San Francisco, CA</span></a></li>
										<li><a href="#"><span>Current location</span></a></li>
                                        <li><a href="#"><span>San Francisco, CA</span></a></li>
										<li><a href="#"><span>Current location</span></a></li>
                                        <li><a href="#"><span>San Francisco, CA</span></a></li>
										<li><a href="#"><span>Current location</span></a></li>
                                        <li><a href="#"><span>San Francisco, CA</span></a></li>
										
                                    </ul>
                                </div>
                            </div><!-- .site-banner__search__input -->
                            <div class="field-submit">
                                <button><i class="las la-search la-24-black"></i></button>
                            </div>
                        </form><!-- .site-banner__search -->
						
					</div><!-- .site-banner__content -->
				</div>
			</div><!-- .site-banner -->
			


			<section class="restaurant-wrap">
				<div class="container">
					<div class="title_home offset-item">
                        <h2> Résidences meublées.</h2>
						<p>Les meilleures offres de résidences meublées à votre disposition.</h2>
					</div>
					<div class="restaurant-sliders slick-sliders offset-item">
						<div class="restaurant-slider slick-slider" data-item="4" data-itemScroll="4" data-arrows="true" data-dots="true" data-tabletItem="2" data-tabletScroll="2" data-mobileItem="1" data-mobileScroll="1">
                        @if($residences)
                        @foreach($residences as $items)
							<div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
							    <div class="place-inner">
					                <div class="place-thumb hover-img">
					            		<a class="entry-thumb" href="/description/appartement/location/{{$items->id}}/{{$items->type}}/accueil">
                                            <img src="{{asset('/immobilier/public/storage/'.$items->image_one)}}" alt=""></a>
										<a href="/description/appartement/location/{{$items->id}}/{{$items->type}}/accueil" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
											<span class="icon-heart">
												<i class="la la-bookmark large"></i>
											</span>                                    
										</a>       
						                <a class="entry-category rosy-pink" href="#">
						                    <i class="las la-bed"></i><span>Résidences meublées</span>
						                </a>
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
                        @endforeach  
                        @endif
							
						</div><!-- .restaurant-slider -->
						<div class="place-slider__nav slick-nav">
							<div class="place-slider__prev slick-nav__prev">
								<i class="las la-angle-left"></i>
							</div><!-- .place-slider__prev -->
							<div class="place-slider__next slick-nav__next">		
								<i class="las la-angle-right"></i>
							</div><!-- .place-slider__next -->
						</div><!-- .place-slider__nav -->
					</div><!-- .restaurant-sliders -->
				</div>
			</section><!-- .restaurant-wrap -->

			<section class="cuisine-wrap section-bg">
                <div class="container">
					<div class="title_home offset-item">
                        <h2> Appartements en location</h2>
						<p>Les meilleures offres d'appartements à louer à votre disposition..</h2>
					</div>
					<div class="restaurant-sliders slick-sliders offset-item">
						<div class="restaurant-slider slick-slider" data-item="4" data-itemScroll="4" data-arrows="true" data-dots="true" data-tabletItem="2" data-tabletScroll="2" data-mobileItem="1" data-mobileScroll="1">
                        @if($appartements)
                        @foreach($appartements as $items)
							<div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
							    <div class="place-inner">
					                <div class="place-thumb hover-img">
					            		<a class="entry-thumb" href="/description/appartement/location/{{$items->id}}/{{ $items->type }}/accueil">
                                            <img src="{{asset('/immobilier/public/storage/'.$items->image_one)}}" alt=""></a>
										<a href="/description/appartement/location/{{$items->id}}/{{ $items->type }}/accueil" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
											<span class="icon-heart">
												<i class="la la-bookmark large"></i>
											</span>                                    
										</a>       
						                <a class="entry-category blue" href="#">
						                    <i class="las la-home"></i><span>Appartement à louer</span>
						                </a>
						                <a href="#" class="author" title="Author"><img src="template/images/favicon-yesimmo.png" alt="Author"></a>
									</div>       
							        <div class="entry-detail">
							            <h3 class="place-title"><a href="/description/appartement/location/{{$items->id}}/{{ $items->type }}/accueil">{{$items->titre}}</a></h3>
							            <div class="open-now"> <i class="las la-map-marker"></i> {{$items->localisations}}</div>
							            <div class="entry-bottom">
											<div class="place-price">
							                    <span>{{ number_format($items->montant) }} .XOF / Jours</span>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
                        @endforeach  
                        @endif
							
						</div><!-- .restaurant-slider -->
						<div class="place-slider__nav slick-nav">
							<div class="place-slider__prev slick-nav__prev">
								<i class="las la-angle-left"></i>
							</div><!-- .place-slider__prev -->
							<div class="place-slider__next slick-nav__next">		
								<i class="las la-angle-right"></i>
							</div><!-- .place-slider__next -->
						</div><!-- .place-slider__nav -->
					</div><!-- .restaurant-sliders -->
				</div>
			</section><!-- .cuisine-wrap -->

            <section class="featured-home featured-wrap">
				<div class="container">
					<div class="title_home offset-item">
						<h2>Espace de détente</h2>
						<p>Trouve Des Espaces Agréables Pour Un Moment Entre Amis Ou En Famille.</p>
					</div>
					<div class="featured-inner offset-item">
						<div class="item">
							<div class="flex">
								<div class="flex-col">
									<div class="cities">
										<div class="cities-inner">
											<a href="city-details-1.html" class="hover-img">
												<span class="entry-thumb"><img src="template/images/ASSINIE.png" alt="Chicago"></span>
												<span class="entry-details">
													<h3>Grand Bassam, Quartier Franc</h3>
												    <span>PARADIS TROPICAL</span>
												</span>
											</a>
										</div>
									</div>
								</div>
								<div class="flex-col">
									<div class="cities">
										<div class="cities-inner">
											<a href="city-details-1.html" class="hover-img">
												<span class="entry-thumb"><img src="template/images/Bassam.jpg" alt="Los Angeles"></span>
												<span class="entry-details">
													<h3>Abidja</h3>
												    <span>>LE WAFO - BIETRY</span>
												</span>
											</a>
										</div>
									</div>
                                    <div class="cities">
                                        <div class="cities-inner">
                                            <a href="city-details-1.html" class="hover-img">
                                                <span class="entry-thumb"><img src="template/images/Assinie.jpg" alt="New York"></span>
                                                <span class="entry-details">
                                                    <h3>Tai foretk</h3>
                                                    <span>TAÏ FOREST LODGE</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
								</div>
								<div class="flex-col">
									<div class="cities">
                                        <div class="cities-inner">
                                            <a href="city-details-1.html" class="hover-img">
                                                <span class="entry-thumb"><img src="template/images/ASSINIE.png" alt="San Diego"></span>
                                                <span class="entry-details">
                                                    <h3>Assinie Km 11</h3>
                                                    <span>ARTAYA LODGE</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
									<div class="cities">
										<div class="cities-inner">
											<a href="city-details-1.html" class="hover-img">
												<span class="entry-thumb"><img src="template/images/Bassam.jpg" alt="San Fransico"></span>
												<span class="entry-details">
													<h3>ASSINIE</h3>
												    <span>SABBAT PLAGE ASSINIE</span>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- .featured-inner -->
				</div><!-- .container -->
			</section><!-- .featured-wrap -->

            <div class="business-about" style="background-image: url(template/images/img_about_1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="business-about-info">
                                <h2  style="color:#fff !important" class="offset-item">Deviens Agent Immobilier</h2>
                                <p  style="color:#fff !important" class="offset-item">Obtiens plus de visibilité de tes biens immobiliers auprès de la clientèle.</p>
                                <a href="/inscription" class="btn offset-item">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .business-about -->
		
		</main><!-- .site-main -->


@endsection
