<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Créer une SGI'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />
        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
        <link href="{{asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.sweet-alert.init.js')}}"></script>

    </head>


    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <x-topbar />
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <x-sidemenu />
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
							<div class="col-12">
								<div class="page-title-box">
                                    <h4 class="page-title">SGI (Societe de Gestion d'Investissements)</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('creation.sgi.form')}}">Créer une SGI</a>
                                        </li>
                                        <li class="active">
                                            SGI
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="m-t-0 ">Formulaire de création d'une SGI</h3>
                                        <br>
                                        <div class="row">
                                           
                                            <div class="col">
                                                <form action="{{ route('creation.sgi.form') }}" method="POST">
                                                    @csrf

                                                    @if(session('success'))
                                                        <div class="alert alert-icon alert-success alert-dismissible fade show justify-content-center col-sm-6 col-md-6" style="margin: 0 auto; margin-top: -10px; margin-bottom: 15px;" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <i class="mdi mdi-check-all"></i>
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif

                                                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                        {{-- Colonne de gauche --}}
                                                        <div style="flex: 1;">
                                                            <div class="form-group">
                                                                <label for="designation_sgi">Désignation de la SGI <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="designation_sgi"  value="{{ old('designation_sgi') }}"   placeholder="SGI, AFB, BFS etc..." oninput="this.value = this.value.toUpperCase();" required>
                                                                @error('designation_sgi')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Colonne de droite --}}
                                                        <div style="flex: 1;">
                                                            <div class="form-group">
                                                                <label for="num_compte_prod_finan">Numéro de compte du produit financier <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="num_compte_prod_finan"  value="{{ old('num_compte_prod_finan') }}" placeholder="77xxxxxxx" data-parsley-type="number" required>
                                                                @error('num_compte_prod_finan')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="display: flex; justify-content: center;">
                                                        <button type="submit" class="btn btn-primary  waves-effect waves-light btn-sm sgi-button">Créer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
                <footer class="footer">
                    2024 © L'africaine vie benin. <span class="d-none d-sm-inline-block"> - lafricaineviebenin.com</span>
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('assetss/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assetss/js/waves.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>

        <!-- Counter js  -->
        <script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.sweet-alert.init.js')}}"></script>

        <!--C3 Chart-->
        <script src="{{asset('plugins/d3/d3.min.js')}}"></script>
        <script src="{{asset('plugins/c3/c3.min.js')}}"></script>

        <!-- Dashboard init -->
        <script src="{{asset('assetss/pages/jquery.dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>

        <script>  
            !function ($) {  
                "use strict";  
            
                var SweetAlert = function () {};  
            
                //examples  
                SweetAlert.prototype.init = function () {  
                    // Success Message when page loads with session success  
                    if ({{ session('success') ? 'true' : 'false' }}) {  
                        Swal.fire(  
                            {  
                                title: 'Succès',  
                                text: '{{ session("success") }}',  
                                type: 'success',  
                                confirmButtonColor: '#4fa7f3'  
                            }  
                        );  
                    }  
            
                    // You can keep the click event listener if you want separate alerts for button click  
                    $('#sgi-success').click(function () {  
                        // If you wanted to prevent the default action here (for AJAX), you could add:  
                        // event.preventDefault();  
                    });  
                };  
            
                //init  
                $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert  
            }(window.jQuery),  
            
            //initializing  
            function ($) {  
                "use strict";  
                $.SweetAlert.init()  
            }(window.jQuery);  
        </script>

        {{-- <script>
            let timeout;
            const logoutTime = 10 * 60 * 1000; // 10 minutes en millisecondes
            const logoutUrl = "{{ route('login') }}";
        
            function resetTimer() {
                console.log("Timer reset"); // Vérifie si le timer est réinitialisé à chaque interaction
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    console.log("Session expirée. Redirection vers la page de login."); // Vérifie si le timeout est atteint
                    window.location.href = logoutUrl; // Redirection vers la page de logout
                }, logoutTime);
            }
        
            // Événements qui déclenchent le reset du timer
            const events = [
                'mousemove', 'keypress', 'click', 
                'scroll', 'mousedown', 'touchstart', 
                'touchmove', 'focus', 'blur'
            ];
        
            // Ajouter l'écouteur d'événements pour chaque type d'événement
            events.forEach(event => {
                document.addEventListener(event, resetTimer);
            });
        
            // Initialisation du timer au chargement de la fenêtre
            window.onload = resetTimer;
        </script> --}}
    
    </body>
</html>