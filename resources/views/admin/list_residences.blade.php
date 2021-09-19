@extends('admin/layout/master')

@section('content') 
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Immo <small>/ Liste des residences</small></h3>
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
                            <th> Titre </th>
                            <th> Pierce </th>
                            <th> Nom agent</th>
                            <th> Statu</th>
                            <th> Localisations </th>
                            <th> Montant jr </th>
                            <th> Actions </th>
                        </tr>
                      </thead>


                      <tbody>
                      @if($residences)
                            @foreach($residences as $items)
                                <tr>
                                    
                                    <td>{{ $items->titre }}</td>
                                    <td>{{ $items->nbre_pierce }}</td>
                                    <td>{{ $items->name }}</td>
                                   
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

              

              

              

                </div>
              </div>
            </div>
    </div>
</div>
<!-- /page content -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection