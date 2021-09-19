<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="L’agence immobilière repensée pour mieux vous accompagner">
    <meta name="keywords" content="immobilier - vente - appartement - location - meuble - résidence"/>
    <meta name="author" content="alexis djidonou - impactafric.com">
    <title>Agence immobilier - digital </title>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="manifest" href="yesimmo.cin">
    <!-- favicon.ico in the root directory -->
    <link rel="icon" type="image/png" href="{{asset('/template/images/favicon-yesimmo.png')}}" />
    <link href="template/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

</head>

<body>
    <!-- HEADER -->
    <header class="jumbotron bg-theme">
        <div class="bg-overlay"></div>
        <!-- NAVBAR -->
        @include('template.layout.navigation')
        <!-- END NAVBAR -->
        <!-- HERO -->
      <div class="wrap__intro d-flex align-items-md-center ">
            <div class="container">
                <div class="row align-items-center justify-content-start flex-wrap">
                    <div class="col-md-10 mx-auto">
                        <div class="wrap__intro-heading text-center" data-aos="fade-up">
                            <!-- <h4>the walls property</h4> -->
                            <h1>Trouvez votre maison de rêve</h1>
                            <p></p>

                            <!-- SEARCH BAR -->
                            <div class="wrapper__section">
                                <div class="wrapper__section__components">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <h3 class="section_heading mt-4">Form Search with Categories</h3> -->
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
                                                                <option value="tous" selected>Catégorie</option>
                                                                @foreach($alltype as $items)
                                                                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                        <div class="col-sm-12 col-md-3 input-group-append">
                                                            <button class="btn btn-primary btn-block" type="submit">
                                                                <i class="fa fa-search"></i> <span
                                                                    class="ml-1">Recherche</span>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HERO -->
    </header>
    <!-- END HEADER -->
  
    @yield('content') 

    <!-- ABOUT 
    <section class="home__about bg-theme-v4">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title__leading">
                        <!-- <h6 class="text-uppercase">trusted By thousands</h6> 
                        <h2 class="text-capitalize"> why choose use?</h2>
                        <p>
                            The first step in selling your property is to get a valuation from local experts. They will
                            inspect your home and take into account its unique features, the area and market conditions
                            before providing you with the most accurate valuation.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla
                            quae alias tempora. Placeat voluptatem eum numquam quas distinctio obcaecati quaerat,
                            repudiandae qui! Quia, omnis, doloribus! Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Quod libero amet, laborum qui nullas tempora.</p>

                        <a href="#" class="btn btn-primary mt-3 text-capitalize"> read more
                            <i class="fa fa-angle-right ml-3 "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->


    <!-- OUR PARTNERS 
    <section class="projects__partner bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">our partners</h2>
                        <p class="text-center text-capitalize">brand partners successful projects trusted many clients
                            real estate </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="projects__partner-logo">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <img src="images/partner-logo6.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo7.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo8.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo1.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo5.png" alt="" class="img-fluid">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OUR PARTNERS -->

    <!-- TESTIMONIAL 
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            what people says
                        </h2>
                        <p class="text-center text-capitalize">people says about walls property.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="testimonial owl-carousel owl-theme">
                <!-- TESTIMONIAL 
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL 
                <!-- TESTIMONIAL 
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL 
                <!-- TESTIMONIAL 
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL 
                <!-- TESTIMONIAL 
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL 
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL 

            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL -->

    







    <!-- Footer  -->
    <footer>
        <div class="wrapper__footer bg-theme-footer">
            <div class="container">
                <div class="row">
                    <!-- ADDRESS -->
                    <div class="col-md-3">
                        <div class="widget__footer">
                           <h4 class="footer-title">Contacts</h4>
                           <!-- <figure>
                                <img src="template/images/logo-blue.png" alt="" class="logo-footer">
                            </figure>
                            <p>
                            L’agence immobilière repensée pour mieux vous accompagner

                            </p>-->

                            <ul class="list-unstyled mb-0 mt-3">
                                <li> <b> <i class="fa fa-map-marker"></i></b><span>Cocody, Abidjan Cote d'ivoire</span> </li>
                                <li> <b><i class="fa fa-phone-square"></i></b><span>+225 05 65 12 10 84</span> </li>
                                <li> <b><i class="fa fa-headphones"></i></b><span>support@immo.com</span> </li>
                            </ul>
                        </div>

                    </div>
                    <!-- END ADDRESS -->

                    <!-- QUICK LINKS -->
                    <div class="col-md-6">
                        <div class="widget__footer">
                            <h4 class="footer-title">Catégorie</h4>
                            <div class="link__category-two-column">
                                <ul class="list-unstyled ">
                                    <li class="list-inline-item">
                                        <a href="#">Résidences meublées</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Appartements à louer</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Espaces de détente</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Vente</a>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END QUICK LINKS -->


                    <!-- NEWSLETTERS -->
                    <div class="col-md-3">
                        <div class="widget__footer">
                            <h4 class="footer-title">Suivez-nous</h4>
                            <p class="mb-2">
                            Suivez-nous et restez en contact pour recevoir les dernières nouvelles
                            </p>
                            <p>
                                <a href="https://web.facebook.com/yesimmobilie" class="btn btn-social btn-social-o facebook mr-1">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                                
                                <button class="btn btn-social btn-social-o instagram mr-1">
                                    <i class="fa fa-instagram"></i>
                                </button>

                                <button class="btn btn-social btn-social-o youtube mr-1">
                                    <i class="fa fa-youtube"></i>
                                </button>
                            </p>
                            <br>

                        </div>
                    </div>
                    <!-- END NEWSLETTER -->
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="bg__footer-bottom-v1">
            <div class="container">
                <div class="row flex-column-reverse flex-md-row">
                    <div class="col-md-6">
                        <span>
                            © 2020 
                            <a href="#"></a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Footer  -->
    </footer>


    <!-- SCROLL TO TOP -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="template/js/index.bundle.js?fd365619e86ad9137a29"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    @if (config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false )
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
@endif
@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    @if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
    @endif
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif

</body>

</html>