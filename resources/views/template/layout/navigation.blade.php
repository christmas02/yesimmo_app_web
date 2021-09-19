<nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="template/images/logo-blue.png" alt="">
                    <img src="template/images/logo-blue-stiky.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav99">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" href="/"> Accueil </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/residences"> Residences meublees </a>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link " href="/appartements"> Appartements </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="#"> Vente </a></li>
                    </ul>


                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        <li>
                            <a href="/connexion" class="btn btn-primary text-capitalize">
                                <i class="fa fa-user mr-1"></i> </a>
                        </li>
                        <li> <a href=""></a> - </li>
                        <li>
                            <a href="" class="btn btn-primary text-capitalize">
                                <i class="fa fa-phone mr-1"></i> +225 05 65 12 10 84</a>
                        </li>
                    {{--@guest
                        <li>
                            <a href="/connexion" class="btn btn-primary text-capitalize">
                                <i class="fa fa-user mr-1"></i> </a>
                        </li>
                        <li> <a href=""></a> - </li>
                        <li>
                            <a href="" class="btn btn-primary text-capitalize">
                                <i class="fa fa-phone mr-1"></i> +225 05 65 12 10 84</a>
                        </li>
                       
                        
                    @else
                       <li>
                       @if(Auth::user()->role == 'superadmin')
                            <a href="/espace/admin" class="btn btn-primary text-capitalize">
                                <i class="fa fa-user mr-1"></i> {{ Auth::user()->name }}
                            </a>
                       @elseif(Auth::user()->role == 'user')
                            <a href="/" class="btn btn-primary text-capitalize">
                                <i class="fa fa-user mr-1"></i> {{ Auth::user()->name }}
                            </a>
                       @elseif(Auth::user()->role == 'agent')
                            <a href="/" class="btn btn-primary text-capitalize">
                                <i class="fa fa-user mr-1"></i> {{ Auth::user()->name }}
                            </a>
                       @endif
                        </li>
                    @endguest--}}
                    </ul>
                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">

                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="search" value="" placeholder="Search " id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                href="/search-result.html">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
</nav>