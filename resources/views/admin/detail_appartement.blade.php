@extends('admin/layout/master')

@section('content')
<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Fiche appartement </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Information sur l'appartement</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="/list/residence" class=""><i class="fa fa-chevron-up"></i>Retour</a>
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

                        <div class="col-md-7 col-sm-7 ">
                            <div class="product-image container-image">
                                <img src="{{asset('immobilier/public//storage/'.$appartement->image_one)}}" alt="..." />
                            </div>
                            <div class="product_gallery">
                                @foreach($galerie as $items)
                                <a class="container-image">
                                    <img src="{{asset('immobilier/public/storage/'.$items->image)}}" alt="..." width="" height="">
                                  
                                </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">
                            @if($appartement->statu == 0 )
                            <a href="/activer/appartement/{{ $appartement->id }}" class="btn btn-danger "><i
                                    class="fa fa-"></i> Activer le post</a>
                            @elseif($appartement->statu == 1 )
                            <a href="/desactiver/appartement/{{ $appartement->id }}" class="btn btn-success   "><i
                                    class="fa fa-"></i> Desactiver le post</a>
                            @elseif($appartement->statu == 2 )
                            <button class="btn btn-warning "> Appartement occuper</button>
                            @elseif($appartement->statu == 3 )
                            <button class="btn btn-info "> Appartement disponible</button>
                            @endif
                            <h3 class="prod_title">{{ $appartement->titre }}</h3>

                            <p>{{ $appartement->description }}.</p>
                            <p>Situation geographique : {{ $appartement->localisations }}</p>
                            <br />

                            <div class="">
                                <h2>Commoditer</h2>
                                <ul class="list-inline prod_size display-layout">
                                    <li>
                                        <button type="button" class="btn btn-default btn-xs">Nbre de Piece :
                                            {{ $appartement->nbre_pierce }}</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-default btn-xs">Nbre de lit :
                                            {{ $appartement->nbre_lit }}</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-default btn-xs">Nbre bouche :
                                            {{ $appartement->nbre_salle_eau }}</button>
                                    </li>

                                </ul>
                            </div>


                            <div class="">
                                <div class="product_price">
                                    <h1 class="price">{{ number_format($appartement->montant) }} .XOF</h1>
                                    <span class="price-tax">par jour</span>
                                    <br>
                                </div>
                            </div>

                            <div class="">
                            

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->

<!-- Modal  MODIFIER LES IMAGES-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modifier la gallerie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update/gallerie" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="id" value="{{ $appartement->id }}">
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                            principale</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image_one" class="form-control">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                            2</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image_two" class="form-control">
                        </div>
                    </div>


                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                            3</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image_three" class="form-control">
                        </div>
                    </div>


                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                            4</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image_five" class="form-control">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                            5</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image_for" class="form-control">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-success">Enregistre</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  MODIFIER LES INFORMATION -->
<div class="modal fade" id="exampleModalCenterInfo" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modifier la gallerie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update/poste" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="id" value="{{ $appartement->id }}">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Titre
                            de ce poste <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="designation" class="form-control "
                                value="{{ $appartement->titre }}">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre
                            de pierce <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select required="required" name="nbre_pierce" class="form-control ">
                                <option value="3"> 1 perce</option>
                                <option value="3"> 2 perce</option>
                                <option value="3"> 3 perce</option>
                                <option value="4"> 3 perce</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre
                            de Lits <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select required="required" name="nbre_lit" class="form-control ">
                                <option value="3"> 1 lit</option>
                                <option value="3"> 2 lits</option>
                                <option value="3"> 3 lits</option>
                                <option value="4"> 3 lits</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre
                            de salle d'eau <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select required="required" name="nbre_salle_eau" class="form-control ">
                                <option value="3"> 1 salle d'eau</option>
                                <option value="3"> 2 salles d'eau</option>
                                <option value="3"> 3 salles d'eau</option>
                                <option value="4"> 4 salles d'eau</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Montant
                            journalie<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="montant" value="{{ $appartement->montant }}" class="form-control">
                        </div>
                    </div>



                    <div class="item form-group">
                        <label for="middle-name"
                            class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea rows="8" name="description"
                                class="form-control">{{ $appartement->description }}</textarea>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-success">Enregistre</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection