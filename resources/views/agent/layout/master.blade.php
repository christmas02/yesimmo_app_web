<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title> | espace de gestion compte argent</title>

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


    <!-- Custom Theme Style -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



</head>

<style>
    .btn-modal {
        background-color: #ccc;
        color: gray;
        border-radius: 50%;
    }

    .form-check-input {}

    input:checked+.slider {
        background-color: #2196F3;
    }

    label {
        font-size: 18px;
        text-align: center;
    }

    .silde {
        margin: 0 190px;
    }

    .modal-title {

        color: #fff;

    }

    .modal-header {
        background-color: gray;
        text-align: right !important;
    }

    .modal-footer-btn {
        margin: 20px 38%;

    }

    .form-check-label {
        margin-left: 5px;
    }
</style>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title"><img src="http://yesimmo.ci/template/images/logo-blue.png" width="100"><span></span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if(Auth::user()->img != NULL)
                            <img src="{{asset('immobilier/public/storage/'.Auth::user()->img)}}" alt="..." class="img-circle profile_img">
                            @else
                            <img src="{{asset('/admin/images/user.png')}}" alt="..." class="img-circle profile_img">
                            @endif
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
                                <li><a href="/espace/agent"><i class="fa fa-home"></i> Tableau de bord</span></a></li>

                                <li><a><i class="fa fa-edit"></i> Résidences meublées <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/liste/residence">Liste des Residences</a></li>
                                        <li><a href="/poste/residence">Ajouter une residences</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i> Appartements à louer <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/agent/list/appartement">Liste des appartement</a></li>
                                        <li><a href="/agent/add/appartement">Ajouter un appartement</a></li>
                                    </ul>
                                </li>

                                <li><a href="/agent/reservation"><i class="fa fa-table"></i> Liste des reservations </a>
                                </li>


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
                                    @if(Auth::user()->img != NULL)
                                    <img src="{{asset('immobilier/public/storage/'.Auth::user()->img)}}" id="profil" alt="...">
                                    {{ Auth::user()->name }}
                                    @else
                                    <img src="{{asset('/admin/images/user.png')}}" alt="">{{ Auth::user()->name }}
                                    @endif

                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalProfile"> Modifier profile</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalmdp""> Modifier mot de passe</a>
                                    <a class=" dropdown-item" href="javascript:;">
                                        <span>Parametre</span>
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
                                    <span class="badge bg-green"> - </span>
                                </a>

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
                    <a href="">yesimmo</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- Modal  MODIFIER DU PROFILE UTILISATEUR-->
    <div class="modal fade" id="exampleModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalProfile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <center>
                        <h4>Modification du profile</h4>
                    </center>
                    <hr>
                    <form method="POST" class="row" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="item form-group col-md-3">
                            <center class="img_profil">
                                @if(Auth::user()->img != NULL)
                                <img src="{{asset('immobilier/public/storage/'.Auth::user()->img)}}" alt="..." class="img-circle profile_img" style="width:200; margin-left: 0px;">
                                @else
                                <img src="{{asset('/admin/images/user.png')}}" alt="..." class="img-circle profile_img">
                                @endif
                            </center>
                        </div>
                        <div class="col-md-8">
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nom et
                                    prenom</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="" name="" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Numero de
                                    telephone</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="" name="" class="form-control" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Adresse
                                    email</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="" name="" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Apropos de moi</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea rows="8" name="description" class="form-control" value="">{{ old('description') }}</textarea>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer-btn">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal  MODIFIER DU MOT DE PASSE-->
    <div class="modal fade" id="exampleModalmdp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <h4>Modification du mot de passe</h4>
                        </center>
                        <hr>
                        <input type="text" hidden name="id" value="">
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mot de passe</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="" name="" class="form-control" value="">
                            </div>

                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirmation mot de parse_str</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="" name="" class="form-control" value="">
                            </div>
                        </div>
                </div>
                <div class="modal-footer-btn">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqqwfoyJERekoo-c243pZUj4azUHqvR_U&libraries=places&callback=initAutocomplete" async defer></script>
    <scrip src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></scrip>


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
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".clientContacter").hide();
            $(".clientNonConatcter").hide();
            $(".clientContacterDeux").hide();
            $(".clientNonConatcterDeux").show();
            // Equivalent event setup using the `.on()` method
        });

        function ShowDiv() {
            $(".clientNonConatcter").hide();
            $(".clientContacter").show();

        }

        function HideDiv() {
            $(".clientContacter").hide();
            $(".clientNonConatcter").show();
        }


        function readURL(input) {
            //console.log("input_image");
            if (input.files && input.files[0]) {
                // Get the selected file
                var files = $('#file')[0].files;
                if (files.length > 0) {
                    var fd = new FormData();
                    // Append data 
                    fd.append('file', files[0]);
                    //fd.append('_token',CSRF_TOKEN);
                    $.ajax({
                        url: '/updade/img/profile',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#imagePreview').css('background-image', 'url(' + e.target
                                    .result + ')');
                                $('#imagePreview').hide();
                                $('#imagePreview').fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    });
                }
            }
        }
        $("#file").change(function() {
            readURL(this);
        });
    </script>

    <script>
        // File Upload
        // 
        function ekUpload() {
            function Init() {

                console.log("Upload Initialised");

                var fileSelect = document.getElementById('file-upload'),
                    fileDrag = document.getElementById('file-drag'),
                    submitButton = document.getElementById('submit-button');

                fileSelect.addEventListener('change', fileSelectHandler, false);

                // Is XHR2 available?
                var xhr = new XMLHttpRequest();
                if (xhr.upload) {
                    // File Drop
                    fileDrag.addEventListener('dragover', fileDragHover, false);
                    fileDrag.addEventListener('dragleave', fileDragHover, false);
                    fileDrag.addEventListener('drop', fileSelectHandler, false);
                }
            }

            function fileDragHover(e) {
                var fileDrag = document.getElementById('file-drag');

                e.stopPropagation();
                e.preventDefault();

                fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
            }

            function fileSelectHandler(e) {
                // Fetch FileList object
                var files = e.target.files || e.dataTransfer.files;

                // Cancel event and hover styling
                fileDragHover(e);

                // Process all File objects
                for (var i = 0, f; f = files[i]; i++) {
                    parseFile(f);
                    uploadFile(f);
                }
            }

            // Output
            function output(msg) {
                // Response
                var m = document.getElementById('messages');
                m.innerHTML = msg;
            }

            function parseFile(file) {

                console.log(file.name);
                output(
                    '<strong>' + encodeURI(file.name) + '</strong>'
                );

                // var fileType = file.type;
                // console.log(fileType);
                var imageName = file.name;

                var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
                if (isGood) {
                    document.getElementById('start').classList.add("hidden");
                    document.getElementById('response').classList.remove("hidden");
                    document.getElementById('notimage').classList.add("hidden");
                    // Thumbnail Preview
                    document.getElementById('file-image').classList.remove("hidden");
                    document.getElementById('file-image').src = URL.createObjectURL(file);
                } else {
                    document.getElementById('file-image').classList.add("hidden");
                    document.getElementById('notimage').classList.remove("hidden");
                    document.getElementById('start').classList.remove("hidden");
                    document.getElementById('response').classList.add("hidden");
                    document.getElementById("file-upload-form").reset();
                }
            }

            function setProgressMaxValue(e) {
                var pBar = document.getElementById('file-progress');

                if (e.lengthComputable) {
                    pBar.max = e.total;
                }
            }

            function updateFileProgress(e) {
                var pBar = document.getElementById('file-progress');

                if (e.lengthComputable) {
                    pBar.value = e.loaded;
                }
            }

            function uploadFile(file) {

                var xhr = new XMLHttpRequest(),
                    fileInput = document.getElementById('class-roster-file'),
                    pBar = document.getElementById('file-progress'),
                    fileSizeLimit = 1024; // In MB
                if (xhr.upload) {
                    // Check if file is less than x MB
                    if (file.size <= fileSizeLimit * 1024 * 1024) {
                        // Progress bar
                        pBar.style.display = 'inline';
                        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                        xhr.upload.addEventListener('progress', updateFileProgress, false);

                        // File received / failed
                        xhr.onreadystatechange = function(e) {
                            if (xhr.readyState == 4) {
                                // Everything is good!

                                // progress.className = (xhr.status == 200 ? "success" : "failure");
                                // document.location.reload(true);
                            }
                        };

                        // Start upload
                        xhr.open('POST', document.getElementById('file-upload-form').action, true);
                        xhr.setRequestHeader('X-File-Name', file.name);
                        xhr.setRequestHeader('X-File-Size', file.size);
                        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                        xhr.send(file);
                    } else {
                        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                    }
                }
            }

            // Check for the various File API support.
            if (window.File && window.FileList && window.FileReader) {
                Init();
            } else {
                document.getElementById('file-drag').style.display = 'none';
            }
        }
        ekUpload();
    </script>

    <script type="text/javascript">
        function initialize() {
            var options = {
                //types: ['(cities)'],
                componentRestrictions: {
                    country: "ci"
                }
            };
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        function positions() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById('autocomplete').value;

            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
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