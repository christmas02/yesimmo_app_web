<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title> | </title>

    <!-- Bootstrap -->
    <link href="{{asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

     <!-- iCheck -->
     <link href="{{asset('/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="{{asset('/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/admin/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/admin.css')}}" rel="">
    <link rel="icon" type="image/png" href="{{asset('/template/images/favicon-yesimmo.png')}}" />

  </head>

  <style>
  .btn-modal{
      background-color: #ccc;
      color: gray;
      border-radius: 50%;
  }
  .form-check-input{

  }
  input:checked + .slider {
    background-color: #2196F3;
  }
  label{
      font-size: 18px;
      text-align: center;
  }
  .silde{
      margin: 0 190px;
  }
  .modal-title{
      
      color: #fff;
      
  }
  .modal-header{
      background-color: gray;
      text-align: right !important;
  }
  .modal-footer-btn{
      margin: 20px 38%;

  }
  .form-check-label{
    margin-left: 5px;
  }

  /*  */
.card .body {
    font-size: 14px;
    padding: 20px;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
    border-radius: 0.55rem;
    background: #fff;
    color: #616161;
    font-weight: 400;
    transition: all 0.2s ease-in-out;
}
.card .body:hover {
    box-shadow: 0 2px 20px 0 rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease-in-out;
}
.card .body.bg-dark {
    background: #313740 !important;
    color: #bdbdbd !important;
}
.card .body.bg-dark .table td,
.card .body.bg-dark .table th {
    border-top: 1px solid #4c4c4c;
    color: #bdbdbd;
}
.l-green {
    background: linear-gradient(45deg, #9ce89d, #cdfa7e) !important;
}
.l-pink {
    background: linear-gradient(45deg, pink, #fbc1cb) !important;
}
.l-turquoise,
.total_earnings .chart div {
    background: linear-gradient(45deg, #00ced1, #08e5e8) !important;
    color: #fff !important;
}
.l-cyan {
    background: linear-gradient(45deg, #49cdd0, #00bcd4) !important;
    color: #fff !important;
}
.l-khaki {
    background: linear-gradient(45deg, khaki, #fdf181) !important;
}
.l-coral {
    background: linear-gradient(45deg, #f08080, #f58787) !important;
    color: #fff !important;
}
.l-salmon {
    background: linear-gradient(45deg, #ec74a1, #fbc7c0) !important;
    color: #fff !important;
}
.l-blue {
    background: linear-gradient(45deg, #72c2ff, #86f0ff) !important;
    color: #fff !important;
}
.l-seagreen {
    background: linear-gradient(45deg, #8ed8ec, #85f7b5) !important;
    color: #fff !important;
}
.l-amber,
.w_calender span + span,
.w_calender em {
    background: linear-gradient(45deg, #fda582, #f7cf68) !important;
    color: #fff !important;
}
.l-blush {
    background: linear-gradient(45deg, #dd5e89, #f7bb97) !important;
    color: #fff !important;
}
.l-parpl,
.total_earnings .chart.expense div {
    background: linear-gradient(45deg, #a890d3, #edbae7) !important;
    color: #fff !important;
}
.l-slategray {
    background: linear-gradient(45deg, #708090, #7c8ea0) !important;
    color: #fff !important;
}
.l-dark {
    background: linear-gradient(45deg, #555, #333) !important;
    color: #fff !important;
}





  </style>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-home"></i> <span>Immo</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('/admin/images/user.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>{{ Auth::user()->name }}</h2>
                <small>{{ Auth::user()->role }}</small>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/espace/admin"><i class="fa fa-home"></i> Tableau de bord</span></a></li>
                  <li><a href=""><i class="fa fa-edit"></i> Utilisateurs</span></a></li>
                  <li><a><i class="fa fa-edit"></i> Agents / Agences<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/list/agent">Liste des Agents </a></li>
                      <li><a href="/add/agent">Ajouter un Agent </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Residences meuble <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/list/residence">Liste des Residences</a></li>
                      <li><a href="/add/residence">Ajouter une residences</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Appartements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/list/appartement">Liste des appartement</a></li>
                      <li><a href="/add/appartement">Ajouter un appartement</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Agence immobiliers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Liste des Agences</a></li>
                      <li><a href="#">Ajouter une Agence</a></li>
                    </ul>
                  </li>
                  <li><a href="/liste/reservation"><i class="fa fa-table"></i> Liste des reservations </a></li>
                  
                  
                  <li><a><i class="fa fa-sign-out"></i> Deconnexion </a></li>
                  
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{asset('/admin/images/user.png')}}" alt="">{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                      <a class="dropdown-item" href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Déconnexion') }}<i class="fa fa-sign-out pull-right"></i>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
        <!-- ######################################################## -->
        @yield('content') 
        <!-- ######################################################## -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
             by <a href="">yesimmo</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqqwfoyJERekoo-c243pZUj4azUHqvR_U&libraries=places&callback=initAutocomplete" async defer></script>


    <!-- jQuery -->
    <script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/admin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('/admin/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('/admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('/admin/vendors/google-code-prettify/src/prettify.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('/admin/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{asset('/admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <!-- Autosize -->
    <script src="{{asset('/admin/vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{asset('/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>


    <!-- Datatables -->
    <script src="{{asset('/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('/admin/build/js/custom.min.js')}}"></script>

    <!-- jQuery Smart Wizard -->
    <script src="{{asset('/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>



    <script type="text/javascript">
      function initialize() {
          var options = {
              //types: ['(cities)'],
              componentRestrictions: {country: "ci"}
          };
          var input = document.getElementById('autocomplete');
          var autocomplete = new google.maps.places.Autocomplete(input, options);
      }
      google.maps.event.addDomListener(window, 'load', initialize);

      function positions() {
        var geocoder = new google.maps.Geocoder();
        var address = document.getElementById('autocomplete').value;

        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK){
          var latitude = results[0].geometry.location.lat();
          var longitude = results[0].geometry.location.lng();
          document.getElementById('longitude').value = longitude;
          document.getElementById('latitude').value = latitude;	
        } 
        }); 
      }
	 </script>
  </body>
</html>
