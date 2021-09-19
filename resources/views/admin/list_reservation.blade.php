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
                                       <span class="text-success"> Activer </span> 
                                    @elseif($items->statu == 2)
                                       <span class="text-warning"> Appartement occuper </span> 
                                    @elseif($items->statu == 0)
                                       <span class="text-danger"> Desactive </span> 
                                    @elseif($items->statu == 3)
                                       <span class="text-info"> Appartement disponible</span> 
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Information relative au rendez-vous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection