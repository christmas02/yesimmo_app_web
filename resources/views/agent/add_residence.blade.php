@extends('agent/layout/master')

@section('content')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Immo</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ajouter une residence <small></small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @endif

                        <!-- Smart Wizard -->
                        <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li><a href="#step-1"><span class="step_no">1</span>
                                        <span class="step_descr">Etape 1<br />
                                            <small>Etape 1 Identification</small>
                                        </span></a>
                                </li>
                                <li><a href="#step-2"><span class="step_no">2</span>
                                        <span class="step_descr">Etape 2<br />
                                            <small>Etape 2 localisation</small>
                                        </span></a>
                                </li>
                                <li><a href="#step-3"><span class="step_no">3</span>
                                        <span class="step_descr"> Etape 3<br />
                                            <small>Etape 3 description</small>
                                        </span></a>
                                </li>
                                <li><a href="#step-4"><span class="step_no">4</span>
                                        <span class="step_descr">Etape 4<br />
                                            <small>Etape 4 images</small>
                                        </span></a>
                                </li>
                            </ul>
							<form method="POST" action="/save/appartement/agent" enctype="multipart/form-data" onsubmit="$('#loading').show(),$('#submit').hide();">
                            @csrf
                            <div id="step-1">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nom de la résidence ou titre du poste <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="designation" value="{{ old('designation') }}"
                                                class="form-control ">
                                                @error('designation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nombre
                                            de pierce <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select required="required" name="nbre_pierce" class="form-control ">
                                                <option value="1"> 1 pièce</option>
                                                <option value="2"> 2 pièces</option>
                                                <option value="3"> 3 pièces</option>
                                                <option value="4"> 4 pièces</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nombre
                                            de Lits <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select required="required" name="nbre_lit" class="form-control ">
                                                <option value="1"> 1 chambre</option>
                                                <option value="2"> 2 chambres</option>
                                                <option value="3"> 3 chambres</option>
                                                <option value="4"> 4 chambres</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nombre
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
                            </div>
                            <!-- Sstep-1 -->
                            <div id="step-2">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Montant
                                        journalie<span class="required">*</span>
                                    </label>
                                    
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" name="montant" class="form-control" value="{{ old('montant') }}">
                                        @error('montant')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Ville ou commune</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select required="required" name="commune" class="form-control ">
                                        @foreach($commune as $item)
                                            <option value="{{ $item->id }}"> {{ $item->libelle }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Situation
                                        geographique</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        {{--<input type="text" name="autocomplete" value="{{ old('autocomplete') }}"  class="form-control">--}}
                                        <input type="text" name="autocomplete" id="autocomplete"
                                        value="{{ old('autocomplete') }}"  onchange="positions()" class="form-control">
                                        @error('autocomplete')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group" id="latitudeArea">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" hidden name="latitude" id="latitude"
                                            value="" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group" id="longtitudeArea">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" hidden name="longitude" id="longitude"
                                            value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- Sstep-2 -->
                            <div id="step-3">
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea rows="8" name="description" class="form-control" value="">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <!--<div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Videos
                                        visite</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="video" class="form-control">
                                    </div>
                                </div>-->
                            </div>
                            <!-- Sstep-3 -->
                            <div id="step-4">
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        principale</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_five" accept="image/*" class="form-control" required>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Choisier 4 images de plus</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="images[]" accept="image/*" class="form-control" multiple required>
                                    </div>
                                </div>

                                <input type="text" hidden name="type" value="1">


                               <!-- <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        3</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_three" class="form-control" require>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        4</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_five" class="form-control" require>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        5</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_for" class="form-control" require>
                                    </div>
                                </div>-->


                                

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Enregistre</button>
                                    </div>
                                    <div class="btn btn-success" id="loading" style="display:none">
                                        <i class="loading-icon fa-lg fas fa-spinner fa-spin hide"></i> 
                                        <i class="czi-user mr-2 ml-n1"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Sstep-4 -->
							</form>
                        </div>
                        <!-- End SmartWizard Content -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection