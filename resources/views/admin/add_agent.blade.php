@extends('admin/layout/master')

@section('content') 
<!-- page content -->
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Immo</h3>
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
									<h2>Ajouter un agent <small></small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
									
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									@if(Session::has('success'))
										<div class="alert alert-success">{{ Session::get('success') }}</div>
									@elseif(Session::has('danger'))
										<div class="alert alert-danger">{{ Session::get('danger') }}</div>
									@elseif(Session::has('warning'))
										<div class="alert alert-warning">{{ Session::get('warning') }}</div>
									@endif
									<form class="form-horizontal form-label-left" method="POST" action="/save/agent">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Non de famille<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="name" required="required" value="" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Prenom <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="lastname" required="required" value="" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Contact telephonique <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="phone" required="required" value="" class="form-control">
												<input class="form-control" hidden name="role" type="text" value="agent">
												<input class="form-control" hidden name="employer" type="text" value="{{ Auth::user()->id }}">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Adresse email</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" name="email" required="required" value="" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mot de passe</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="password" required="required" value="" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirmation du mot de passe</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="password_confirmation" required="required" value="" class="form-control">
											</div>
										</div>
										
	
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Annuler</button>
												<button type="submit" class="btn btn-success">Enregistre</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>





					<div class="x_panel">
						
					</div>
				</div>
			</div>
			<!-- /page content -->
@endsection