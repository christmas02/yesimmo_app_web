@extends('admin/layout/master')

@section('content')
<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Information sur l'agent </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profil</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="/list_agents" class=""><i class="fa fa-chevron-up"></i>Retour</a>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{asset('/admin/images/user.png')}}"
                                        alt="Avatar" title="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                                <h3>{{ $infoUser->name }}</h3>
                                <ul class="list-unstyled user_data">
                                    
                                    <li>
                                        <h4><i class="fa fa-envelope user-profile-icon"></i> {{ $infoUser->email}} </h4>
                                    </li>
                                    <li>
                                        <h4><i class="fa fa-phone user-profile-icon"></i> {{ $infoUser->phone }} </h4>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="body l-parpl text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="2078"
                                            data-speed="2000" data-fresh-interval="700">{{ count($listlistAppart) }}</h3>
                                        <span class="text-white">Appartements</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521"
                                            data-speed="2000" data-fresh-interval="700"> 0 </h3>
                                        <span class="text-white">Reservations</span>
                                    </div>
                                </div>
                            </div>
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chambre ou Espace</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 ">
                        <div class="card-box table-responsive">

<div class="table-responsive">
    <table id="datatable" class="table table-striped jambo_table bulk_action"
        style="width:100%">
        <thead>
            <tr class="headings">
            <th> Titre </th>
                            <th> Pierce </th>
                            <th> Nom agent </th>
                            <th> Statu </th>
                            <th> Localisations </th>
                            <th> Montant jr </th>
                            <th> Actions </th>
                
            </tr>
        </thead>
       
        <tbody>

        @if($listlistAppart)
                            @foreach($listlistAppart as $items)
                                <tr>
                                    
                                    <td>{{ $items->titre }}</td>
                                    <td>{{ $items->nbre_pierce }}</td>
                                    <td>{{ $items->name}}</td>
                                  
                                    <td>
                                    @if($items->statu == 1)
                                       <span class="text-success"> Activer </span> 
                                    @elseif($items->statu == 2)
                                       <span class="text-warning"> Appartement occuper </span> 
                                    @elseif($items->statu == 0)
                                       <span class="text-danger"> Desactive </span> 
                                    @elseif($items->statu == 3)
                                       <span class="text-info"> Appartement disponible</span> 
                                    @endif
                                    </td>
                                    <td>{{ $items->localisations }}</td>
                                    <td>{{ number_format($items->montant) }} .XOF</td>
                                    <td>
                                        <div class="">
                                            <a href="/detail/appartement/{{ $items->id }}" class="btn btn-primary btn-rounded"><i class="fa fa-folder"></i></a>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        @endif
            
        </tbody>

    </table>
</div>
</div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <div>

            </div>
        </div>

    </div>
</div>
@endsection