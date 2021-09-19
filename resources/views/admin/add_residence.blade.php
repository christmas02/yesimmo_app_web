@extends('admin/layout/master')

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
							<form method="POST" action="/save/residence" enctype="multipart/form-data">
                            @csrf
                            <div id="step-1">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Titre
                                            de ce poste <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="designation"
                                                class="form-control ">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nombre
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nombre
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nombre
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
                            </div>
                            <!-- Sstep-1 -->
                            <div id="step-2">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Montant
                                        journalie<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="montant" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Situation
                                        geographique</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="autocomplete" id="autocomplete"
                                            value="" onchange="positions()" class="form-control">
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
                                        <textarea rows="8" name="description" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Videos
                                        visite</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="video" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- Sstep-3 -->
                            <div id="step-4">
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


                                

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Enregistre</button>
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