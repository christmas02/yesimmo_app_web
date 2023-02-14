@extends('template.layout.master_second')

@section('content')
<main id="main" class="site-main">
    <div class="owner-top">
        <div class="container">
            <div class="owner-top-inner">
                <div class="owner-top-info">
                    <div class="avatar"><img src="{{asset('/immobilier/public/storage/'.$agent->img)}}" alt="{{ $agent->name }}"></div>
                    <div class="info">
                        <h3>{{ $agent->name }}<span class="verified">(Verified)</span></h3>
                        <p>{{count($residences)}} appartements, 0 commentaire</p>
                    </div>
                </div>
                <div class="owner-top-button">
                    <a href="#" class="btn" title="Send Message"><i class="las la-envelope"></i>Envoyer un message</a>
                </div>
            </div>
        </div>
    </div><!-- .owner-top -->
    <div class="owner-page-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="owner-page-content">
                        <h2>Disponible</h2>
                        <div class="area-places layout-3col">
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
						                
                                            @if($items->type == 1)
                                            <a class="entry-category rosy-pink" href="#">
						                    <i class="las la-bed"></i><span>Résidences meublées</span>
                                            </a>
                                            @elseif($items->type == 2)
                                            <a class="entry-category blue" href="#">
                                            <i class="las la-home"></i><span>Appartement à louer</span>
                                            </a>
                                            @endif
						                
						                <a href="/ma_callerie/{{ $items->user_id }}" class="author" title="{{ $items->name }}"><img src="{{asset('/immobilier/public/storage/'.$items->img)}}" alt="Author"></a>
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
							
 
                        </div>
                        <div class="pagination">
                            <div class="pagination__numbers">
                                <span>1</span>
                                <a title="2" href="#">2</a>
                                <a title="3" href="#">3</a>
                                <a title="Next" href="#">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </div>
                        </div>

                        {{--<div class="review-wrap">
                            <h2>Reviews (33)</h2>
                            <ul class="place__comments">
                                <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="Sebastian" href="#"><img src="images/avatars/male-2.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="place__author__info">
                                            <a title="Sebastian" href="#">Sebastian</a>
                                            <div class="place__author__star">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <span style="width: 72%">
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                </span>
                                            </div>
                                            <span class="time">October 1, 2019</span>
                                        </div>
                                    </div>
                                    <div class="place__comments__content">
                                        <p>Went there last Saturday for the first time to watch my favorite djs (Kungs,
                                            Sam Feldet and Watermat) and really had a great experience. The atmosphere
                                            is amazing and I am going next week.</p>
                                    </div>
                                    <p>On <a href="#">Think Coffe</a></p>
                                </li>
                                <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="Nitithorn" href="#"><img src="images/avatars/female-1.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="place__author__info">
                                            <a title="Nitithorn" href="#">Nitithorn</a>
                                            <div class="place__author__star">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <span style="width: 72%">
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                </span>
                                            </div>
                                            <span class="time">October 1, 2019</span>
                                        </div>
                                    </div>
                                    <div class="place__comments__content">
                                        <p>Went there last Saturday for the first time to watch my favorite djs (Kungs,
                                            Sam Feldet and Watermat) and really had a great experience.</p>
                                    </div>
                                    <p>On <a href="#">Think Coffe</a></p>
                                </li>
                                <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="Nitithorn" href="#"><img src="images/avatars/male-4.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="place__author__info">
                                            <a title="Nitithorn" href="#">Lisa</a>
                                            <div class="place__author__star">
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <i class="la la-star"></i>
                                                <span style="width: 72%">
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                </span>
                                            </div>
                                            <span class="time">October 1, 2019</span>
                                        </div>
                                    </div>
                                    <div class="place__comments__content">
                                        <p>Went there last Saturday for the first time to watch my favorite djs (Kungs,
                                            Sam Feldet and Watermat) and really had a great experience.</p>
                                    </div>
                                    <p>On <a href="#">Think Coffe</a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="pagination">
                            <div class="pagination__numbers">
                                <span>1</span>
                                <a title="2" href="#">2</a>
                                <a title="3" href="#">3</a>
                                <a title="Next" href="#">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </div>
                        </div>--}}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar">
                        <aside class="widget widget-text">
                            <h3 class="widget-title">Apropos</h3>
                            <div class="widget-content">
                                <p>Quisque rhoncus tellus et suscipit pellentesque. Donec viverra eros sed justo
                                    dignissim laoreet. Aenean justo risus, imperdiet id massa ac, convallis condimentum
                                    risus.</p>
          
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- .site-main -->



@endsection