@extends('agent/layout/master')

@section('content')
<style>
* {
    box-sizing: border-box
}

/* Container needed to position the overlay. Adjust the width as needed */
.container-image {
    position: relative;
}

/* Make the image to responsive */
.image {
    display: block;
    width: 100px;
    height: auto;
}

/* The overlay effect - lays on top of the container and over the image */
.overlay {
    position: absolute;
    bottom: 0;
    /*background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5);
    Black see-through */
    color: #f1f1f1;
    width: 10%;
    transition: .5s ease;
    opacity: 0;
    color: white;
    padding: 2px;
    text-align: center;
}

/* When you mouse over the container, fade in the overlay title */
.container-image:hover .overlay {
    opacity: 1;
}


.trash i {
    font-size: 90px;
    border: 1px solid #dc3545;
    ;
    color: #dc3545;
    ;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 10px;
}

.trash {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 10px;
    margin-bottom: 30px;
}
</style>
<style>
.uploader {
    display: block;
    clear: both;
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
}

.uploader label {
    float: left;
    clear: both;
    width: 100%;
    padding: 2rem 1.5rem;
    text-align: center;
    background: #fff;
    border-radius: 7px;
    border: 3px solid #eee;
    transition: all 0.2s ease;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.uploader label:hover {
    border-color: #454cad;
}

.uploader label.hover {
    border: 3px solid #454cad;
    box-shadow: inset 0 0 0 6px #eee;
}

.uploader label.hover #start i.fa {
    transform: scale(0.8);
    opacity: 0.3;
}

.uploader #start {
    float: left;
    clear: both;
    width: 100%;
}

.uploader #start.hidden {
    display: none;
}

.uploader #start i.fa {
    font-size: 50px;
    margin-bottom: 1rem;
    transition: all 0.2s ease-in-out;
}

.uploader #response {
    float: left;
    clear: both;
    width: 100%;
}

.uploader #response.hidden {
    display: none;
}

.uploader #response #messages {
    margin-bottom: 0.5rem;
}

.uploader #file-image {
    display: inline;
    margin: 0 auto 0.5rem auto;
    width: auto;
    height: auto;
    max-width: 180px;
}

.uploader #file-image.hidden {
    display: none;
}

.uploader #notimage {
    display: block;
    float: left;
    clear: both;
    width: 100%;
}

.uploader #notimage.hidden {
    display: none;
}

.uploader progress,
.uploader .progress {
    display: inline;
    clear: both;
    margin: 0 auto;
    width: 100%;
    max-width: 180px;
    height: 8px;
    border: 0;
    border-radius: 4px;
    background-color: #eee;
    overflow: hidden;
}

.uploader .progress[value]::-webkit-progress-bar {
    border-radius: 4px;
    background-color: #eee;
}

.uploader .progress[value]::-webkit-progress-value {
    background: linear-gradient(to right, #393f90 0%, #454cad 50%);
    border-radius: 4px;
}

.uploader .progress[value]::-moz-progress-bar {
    background: linear-gradient(to right, #393f90 0%, #454cad 50%);
    border-radius: 4px;
}

.uploader input[type=file] {
    display: none;
}

.uploader div {
    margin: 0 0 0.5rem 0;
    color: #5f6982;
}

.uploader .btn {
    display: inline-block;
    margin: 0.5rem 0.5rem 1rem 0.5rem;
    clear: both;
    font-family: inherit;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    text-transform: initial;
    border: none;
    border-radius: 0.2rem;
    outline: none;
    padding: 0 1rem;
    height: 36px;
    line-height: 36px;
    color: #fff;
    transition: all 0.2s ease-in-out;
    box-sizing: border-box;
    background: #454cad;
    border-color: #454cad;
    cursor: pointer;
}
</style>
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
                            <li><a href="/agent/list/appartement" class=""><i class="fa fa-chevron-up"></i>Retour</a>
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


                        <!-- SECTION IMAGE -->

                        <div class="col-md-7 col-sm-7 ">
                            <div class="product-image container-image">
                                <img src="{{asset('immobilier/public/storage/'.$appartement->image_one)}}" alt="..." />
                                <div class="overlay">
                                    <a href="" data-toggle="modal"
                                        data-target="#exampleModalUpadeImage{{$appartement->id}}"
                                        class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-pencil"></i></a>

                                </div>
                            </div>
                            <div class="product_gallery">
                                @foreach($galerie as $items)
                                <a class="container-image">
                                    <img src="{{asset('immobilier/public/storage/'.$items->image)}}" alt="..." width="" height="">
                                    <div class="overlay">
                                        <button href="" data-toggle="modal"
                                            data-target="#exampleModalUpadeImageSeconds{{$items->id}}"
                                            class="btn btn-sm btn-primary btn-rounded"><i
                                                class="fa fa-pencil"></i></button>
                                        <button href="" data-toggle="modal"
                                            data-target="#exampleModalDeletImage{{$items->id}}"
                                            class="btn btn-sm btn-danger btn-rounded"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                        </div>

                        <!-- SECTION DESCRIPTION -->
                        <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">
                            @if($appartement->statu == 0 )
                            <a href="#" class="btn btn-danger "><i class="fa fa-"></i> En cours de traitement</a>
                            @elseif($appartement->statu == 1 )
                            <a href="/desact/appartement/{{ $appartement->id }}" class="btn btn-success   "><i
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
                                    @if($appartement->montant == 1)
                                    <span class="price-tax">Jour</span>
                                    @elseif($appartement->montant == 2)
                                    <span class="price-tax">Mois</span>
                                    @endif
                                    <br>
                                </div>
                            </div>

                            <div class="">
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                    data-target="#exampleModalCenterInfo">
                                    <i class="fa fa-folder"></i> Modifier le post</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                @if(count($galerie) < 4) <button type="button" class="btn btn-warning"
                                    data-toggle="modal" data-target="#exampleModalImage">
                                    <i class="fa fa-picture-o"></i>
                                    </button>
                                    @endif


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->


<!-- SUPPRESSION D'UNE IMAGES -->
@foreach($galerie as $items)
<div class="modal fade" id="exampleModalDeletImage{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/delet/image" enctype="">
                    @csrf
                    <div class="trash"><i class="fa fa-trash"></i></div>
                    <center>
                        <h3>Voulez-vous vraiment supprimer !</h3>
                    </center>
                    <input type="text" hidden name="id" value="{{$items->id}}">
                    <input type="text" hidden name="table" value="2">

            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- UPDATE IMAGES  SECONDAIRE -->
@foreach($galerie as $items)
<div class="modal fade" id="exampleModalUpadeImageSeconds{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/update/image" enctype="multipart/form-data">
                    @csrf
                    <center>
                        <h4>Modification de l'image !</h4>
                    </center>


                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ajouter l'
                            images</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <input type="text" hidden name="id" value="{{$items->id}}">
                            <input type="text" hidden name="table" value="2">
                        </div>

                    </div>

            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>
        </div>

    </div>
</div>
@endforeach


<!-- UPDATE IMAGES  PRINCIPAL-->
<div class="modal fade" id="exampleModalUpadeImage{{$appartement->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <center>
                    <h4>Modification de l'image principal !</h4>
                </center>
                <!-- Upload  -->
                <form method="POST" action="/update/image" enctype="multipart/form-data" id="file-upload-form"
                    class="uploader">
                    @csrf
                    <input id="file-upload" type="file" name="image" accept="image/*" />
                    <input type="text" hidden name="id" value="{{ $appartement->id }}">
                    <input type="text" hidden name="table" value="1">

                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Selectionez votre image</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Cliquer ici</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                        </div>
                    </label>


            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>

        </div>

    </div>
</div>

<!-- ADD IMAGES -->
<div class="modal fade" id="exampleModalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/save/gallerie" enctype="multipart/form-data">
                    @csrf
                    <center>
                        <h4>Création de ma galerie !</h4>
                    </center>
                    <h5>Vous avez la possibilité de choisir plusieur images (shift + le clique sur l'image).</h5>
                    <br>

                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ajouter les
                            images</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                            <input type="text" hidden name="matricule" value="{{ $appartement->ref }}">
                            <input type="text" hidden name="imgPossible" value="{{ $imgPossible }}">
                        </div>

                    </div>
                    <div id="erreur" class="alert alert-danger">Vous pouvez enregistre que {{ $imgPossible }} images
                    </div>



            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Valider</button>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Modifier du poste</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update/poste/residence" enctype="multipart/form-data">
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
                            de pièce <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select required="required" name="nbre_pierce" class="form-control ">
                                <option value="1"> 1 pièce</option>
                                <option value="2"> 2 pièce</option>
                                <option value="3"> 3 pièce</option>
                                <option value="4"> 4 pièce</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre
                            de Lits <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select required="required" name="nbre_lit" class="form-control ">
                                <option value="1"> 1 lit</option>
                                <option value="2"> 2 lits</option>
                                <option value="3"> 3 lits</option>
                                <option value="4"> 4 lits</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre
                            de salle d'eau <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select required="required" name="nbre_salle_eau" class="form-control ">
                                <option value="1"> 1 salle d'eau</option>
                                <option value="2"> 2 salles d'eau</option>
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