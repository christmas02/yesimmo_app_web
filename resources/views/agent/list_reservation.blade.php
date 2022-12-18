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
                                            @if($items->statu == 0)
                                            <tr>
                                                <td>{{ $items->created_at }}</td>
                                                <td>{{ $items->reference }}</td>
                                                <td>{{ $items->nomClient }}</td>
                                                <td>{{ $items->phoneClient }}</td>
                                                <td>
                                                    @if($items->statu == 1)
                                                    <span class="text-success"> Consulter et Valider </span>
                                                    @elseif($items->statu == 2)
                                                    <span class="text-warning"> Consulter et Annuler </span>
                                                    @elseif($items->statu == 0)
                                                    <span class="text-danger"> En attente </span>
                                                    @elseif($items->statu == 3)
                                                    <span class="text-info"> Consulter </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="">
                                                        <a href="#" data-toggle="modal" data-target="#exampleModalRdv{{ $items->idReservation }}" class="btn btn-primary btn-rounded"><i class="fa fa-folder"></i></a>
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

<!-- Modal -->
@foreach($listReservation as $items)
<div class="modal fade" id="exampleModalRdv{{ $items->idReservation }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Information relative au rendez-vous</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($items->type == 1)

                <div class="row" style="font-size: 18px;">
                    <div class="col-md-8">
                        <span><b>Nom client</b>: {{ $items->nomClient }}</span> <br>
                        <span><b>Telephone client</b>: {{ $items->phoneClient }}</span><br>
                        <span><b>Periode du sejour</b>: {{ $items->datedebut }} au {{ $items->datefin }} -
                            ({{ $items->nbreJour }}/jours)</span><br>
                        <span><b>Montant</b>: {{ number_format($items->coutSejour) }} .XOF</span>
                        <hr>
                        <span><b>Appartement</b>: <a href="/detail/residence/{{ $items->id }}">{{ $items->titre }}</a></span> <br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 alert alert-info">Nous vous demande de contacter le client avant de repondre a
                        cette question</div>
                    <br>
                    <div class="col-md-6">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Avez-vous contacter le client
                            ?</label>
                    </div>
                    <div class="col-md-4">
                        <span style="margin-left: 10px;">
                            @if($items->statu == 0)
                            <b>Oui</b> <input type="radio" id="oui" name="oui" onclick="ShowDiv()" />
                            <b>Non</b> <input type="radio" id="non" name="oui" onclick="HideDiv()" />
                            @endif
                        </span>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="clientContacter">
                        <form method="POST" action="/rapport/reservation">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Le Client a t-il
                                        confimer sa reservation</label>
                                </div>
                                <div class="col-md-4">
                                    <span style="margin-left: 10px;">
                                        <input type="text" hidden name="id" value="{{$items->idReservation}}" />
                                        @if($items->statu == 0)
                                        <b>Oui</b> <input class="flat" type="radio" id="Oui" name="consulation" value="1">
                                        <b>Non</b> <input class="flat" type="radio" id="non" name="consulation" value="2">
                                        @endif
                                    </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Si non veillir renseigner le motif</label>
                                    <div class="">
                                        <textarea class="form-control" name="motif" rows="5" cols="100" style="width: 100%;, margin: 10px"></textarea>
                                    </div>
                                </div>


                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Valider</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="clientNonConatcter">
                        <form method="POST" action="/rapport/reservation">
                            @csrf
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Veillir renseigner le motif</label>
                                    <div class="">
                                        <input type="text" hidden name="id" value="{{$items->idReservation}}" />
                                        <input hidden type="text" name="consulation" value="3">
                                        <textarea class="form-control" name="motif" rows="5" cols="100" style="width: 100%; margin: 10px"></textarea>
                                    </div>
                                </div>


                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Valider</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                @elseif($items->type == 2)
                <div class="row" style="font-size: 18px;">
                    <div class="col-md-8">
                        <span><b>Nom client</b>: {{ $items->nomClient }}</span> <br>
                        <span><b>Telephone client</b>: {{ $items->phoneClient }}</span><br>
                        <span><b>Date prevus pour la visite</b>: {{ $items->datedebut }}</span><br>
                        <hr>
                        <span><b>Appartement</b>: <a href="/detail/residence/{{ $items->id }}">{{ $items->titre }}</a></span> <br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 alert alert-info">Nous vous demande de contacter le client avant de repondre a
                        cette question</div>
                    <br>
                    <div class="col-md-6">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Avez-vous contacter le client
                            ?</label>
                    </div>
                    <div class="col-md-4">
                        <span style="margin-left: 10px;">
                            @if($items->statu == 0)
                            <b>Oui</b> <input type="radio" id="oui" name="oui" onclick="ShowDiv()" />
                            <b>Non</b> <input type="radio" id="non" name="oui" onclick="HideDiv()" />
                            @endif
                        </span>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="clientContacter">
                        <form method="POST" action="/rapport/reservation">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Le Client a t-il
                                        confimer sa reservation</label>
                                </div>
                                <div class="col-md-4">
                                    <span style="margin-left: 10px;">
                                        <input type="text" hidden name="id" value="{{$items->idReservation}}" />
                                        @if($items->statu == 0)
                                        <b>Oui</b> <input class="flat" type="radio" id="Oui" name="consulation" value="1">
                                        <b>Non</b> <input class="flat" type="radio" id="non" name="consulation" value="2">
                                        @endif
                                    </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Si non veillir renseigner le motif</label>
                                    <div class="">
                                        <textarea class="form-control" name="motif" rows="5" cols="100" style="width: 100%;, margin: 10px"></textarea>
                                    </div>
                                </div>


                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Valider</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="clientNonConatcter">
                        <form method="POST" action="/rapport/reservation">
                            @csrf
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Veillir renseigner le motif</label>
                                    <div class="">
                                        <input type="text" hidden name="id" value="{{$items->idReservation}}" />
                                        <input hidden type="text" name="consulation" value="3">
                                        <textarea class="form-control" name="motif" rows="5" cols="100" style="width: 100%; margin: 10px"></textarea>
                                    </div>
                                </div>


                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Valider</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection