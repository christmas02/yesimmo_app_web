@extends('agent/layout/master')

<?php 

function nbrResidence($id){
  $residence = App\Appartement::where('user_id',$id)->where('type',1)->count();
  return $residence;
}

function nbrAppartement($id){
  $appartement = App\Appartement::where('user_id',$id)->where('type',2)->count();
  return $appartement;
}


?>

@section('content')
<style class="">

.container-image {
  max-width: 960px;
  margin: 10px auto;
  padding: 20px;
}

.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 10px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #ffffff;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: "FontAwesome";
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #f8f8f8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

  </style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tableau de bords</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
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
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @elseif(Session::has('warning'))
        <div class="alert alert-warning">{{ Session::get('warning') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-parpl text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="2078"
                                            data-speed="2000" data-fresh-interval="700">{{ nbrResidence(Auth::user()->id) }}</h3>
                                        <span class="text-white">Résidences meublé</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-seagreen text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="1278"
                                            data-speed="2000" data-fresh-interval="700">{{ nbrAppartement(Auth::user()->id) }}</h3>
                                        <span class="text-white">Appartement en location</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521"
                                            data-speed="2000" data-fresh-interval="700">00</h3>
                                        <span class="text-white">Visites</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                              <div class="card">
                                  <div class="body l-blue text-center">
                                      <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                      <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="978" data-speed="2000" data-fresh-interval="700">0</h3>
                                      <span class="text-white"> Demande</span>
                                  </div>
                              </div>
                          </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profile</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <!--<div class="profile_img">
                                <div id="crop-avatar">
                                    
                                    <img class="img-responsive avatar-view" src="{{asset('/admin/images/user.png')}}"
                                        alt="Avatar" title="Change the avatar">
                                </div>
                            </div>-->
                            <div class="container-profile">

                                  <div class="avatar-upload">
                                      <div class="avatar-edit">
                                          <input type='file' id="file" name="file" accept="image/*" />
                                          <label for="file"></label>
                                      </div>
                                      <div class="avatar-preview">
                                        @if(Auth::user()->img != NULL)
                                           <div id="imagePreview" style="background-image: url({{asset('immobilier/public/storage/'.Auth::user()->img )}});"></div>
                                        @else
                                           <div id="imagePreview" style="background-image: url({{asset('/admin/images/user.png')}});"></div>
                                        @endif
                                      </div>
                                  </div>
                            </div>

                            <h3></h3>
                           
                           <div class="text-center">
                            <h4><i class="fa fa-user user-profile-icon"></i> {{ Auth::user()->name }} </h4>
                            <h4><i class="fa fa-envelope user-profile-icon"></i> {{ Auth::user()->email }} </h4>
                            <h4><i class="fa fa-phone user-profile-icon"></i> {{ Auth::user()->phone }} </h4>

                           </div>
                            
                          

                        </div>
                        <div class="col-md-9 col-sm-9 ">


                            <!--<div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Évolution générale</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Liste demandes</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                         
                          <div role="tabpanel" class="tab-pane active" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects 
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr style="font-size: 20px;">
                                  <th>#</th>
                                  <th>Designation</th>
                                  <th>Statistique</th>
                                
                                </tr>
                              </thead>
                              <tbody style="font-size: 16px;">
                                <tr> 
                                  <td></td>
                                  <td>Nombre total de viste</td>
                                  <td class="hidden-phone"><strong></strong></td>
                                </tr>
                                <tr> 
                                  <td></td>
                                  <td>Nombre total de prise contact</td>
                                  <td class="hidden-phone"><strong></strong></td>
                                </tr>
                                <tr> 
                                  <td></td>
                                  <td>Nombre total de sollicitation</td>
                                  <td class="hidden-phone"><strong></strong></td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects 

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                             <!-- start user projects 
                             <table class="data table table-striped no-margin">
                              <thead>
                                <tr style="font-size: 20px;">
                                  <th>#</th>
                                  <th>Informateion client</th>
                                  <th>Date</th>
                                  <th>Statu</th>
                                
                                </tr>
                              </thead>
                              <tbody style="font-size: 16px;">
                             

                              </tbody>
                            </table>
                            <!-- end user projects 
                          </div>
                        </div>
                      </div>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">

                    <div class="x_content">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection