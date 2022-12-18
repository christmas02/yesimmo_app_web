@extends('admin/layout/master')

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



            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
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
                        <th> Date de rdv </th>
                        <th> Statu </th>

                        <th> Actions </th>
                      </tr>
                    </thead>


                    <tbody>
                      @if($listReservation)
                      @foreach($listReservation as $items)
                      <tr>
                        <td>{{ $items->date }}</td>
                        <td>{{ $items->reference }}</td>
                        <td>{{ $items->nomClient }}</td>
                        <td>{{ $items->phoneClient }}</td>
                        <td>{{ $items->created_at }}</td>
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
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"><h4></h4></div>
          <div class="col-md-4"><img src="{{asset('immobilier/public/storage/'.$items->image_one)}}" style="height:200px; width:200px "></div>
          <div class="col-md-8">
            <b>REF</b> <span>{{ $items->reference }}</span> <br>
            <b>DESIGNATION</b> <span>{{ $items->designation }}</span> <br>
            <b>LOCALISATION</b> <span>{{ $items->localisations }}</span> <br>
            @if($items->type == 1)
            <h6>Reservation de residence meuble</h6>
            <b>DATE DE DEBUT</b> <span>{{ $items->datedebut }}</span><br>
            <b>DATE DE FIN</b> <span>{{ $items->datefin }}</span><br>
            <b>NOMBRE DE JOURS</b> <span>{{ $items->nbreJour }}</span><br>
            <b>COUT DU SEJOURS</b> <span>{{ $items->coutSejour}}</span>
            @elseif($items->type == 2)
            <h6>Reservation de visite</h6>
            <b>DATE DE RESERVATION</b> <span>{{ $items->datedebut }}</span> <br>
            @endif
            @if($items->statu == 1)
                          <span class="text-success"> Consulter et Valider </span>
                          @elseif($items->statu == 2)
                          <span class="text-warning"> Consulter et Annuler </span>
                          @elseif($items->statu == 0)
                          <span class="text-danger"> En attente </span>
                          @elseif($items->statu == 3)
                          <span class="text-info"> Consulter </span>
                          @endif

            
            <HR>
            <b>RESPONSABLE </b> <span>{{ $items->nomPropriere }}</span> <br>
            <b>CONTACT RESPONSABLE</b> <span>{{ $items->phonePropriere }}</span>
            <HR>
            <b>NOM CLIENT </b> <span>{{ $items->nomClient }}</span> <br>
            <b>CONTACT CLIENT</b> <span>{{ $items->phoneClient }}</span>
          </div>
        </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection