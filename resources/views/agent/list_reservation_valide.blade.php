@extends('agent/layout/master')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Immo <small>/ Liste des rendez-vous</small></h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des menus enregistrer <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li href=""><a class="btn btn-info">Consulter et Valider</a></li>
                            <li href=""><a class="btn btn-danger collapse-link">Consulter et Annuler</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @elseif(Session::has('warning'))
                        <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th> Date </th>
                                                <th> Appartement Ref </th>
                                                <th> Nom du client </th>
                                                <th> Contact du client </th>
                                                <th> Statu </th>

                                                <th> Actions </th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @if($listReservation)
                                            @foreach($listReservation as $items)
                                            @if($items->statu == 1)
                                            <tr>
                                                <td>{{ $items->created_at }}</td>
                                                <td>{{ $items->reference }}</td>
                                                <td>{{ $items->nomClient }}</td>
                                                <td>{{ $items->phoneClient }}</td>
                                                <td>
                                                    @if($items->statu == 1)
                                                    <span class="text-success"> Consulter et Valider </span>
                                                    @elseif($items->statu == 2)
                                                    <span class="text-warning"> Consulter et Valider </span>
                                                    @elseif($items->statu == 0)
                                                    <span class="text-danger"> En attente </span>
                                                    @elseif($items->statu == 3)
                                                    <span class="text-info"> Consulter </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#exampleModalRdv{{ $items->idReservation }}"
                                                            class="btn btn-primary btn-rounded"><i
                                                                class="fa fa-folder"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
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







        </div>
    </div>
</div>
</div>
</div>
<!-- /page content -->




@endsection