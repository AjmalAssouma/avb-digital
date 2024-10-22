<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Placement'}}</title>

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

        <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/clockpicker/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">


        <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>
        <style>
            #heard{
                cursor: pointer;
            }
        </style>
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
                                    <h4 class="page-title">Placements</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('creation.placement')}}">Créer un placement</a>
                                        </li>
                                        <li class="active">
                                            Placement
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
                                        <h3 class="m-t-0">Formulaire de création d'un placement</h3>
                                        <p class="text-muted m-b-20">
                                            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                        </p>

                                        <div class="row">
                                            <div class="col">
                                                
                                                <form >
                                                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                        <!-- Colonne de gauche -->
                                                        <div style="flex: 1;">
                                                            <div class="form-group">
                                                                <label for="num_compte">Numéro de compte <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="num_compte" id="num_compte" 
                                                                placeholder="Le numéro de compte doit etre uniquement composé de chiffre" data-parsley-type="number" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="heard">Type de placement <span class="text-danger">*</span></label>
                                                                <select id="heard" class="form-control" required>
                                                                    <option value=""></option>
                                                                    <option value="Action">ACTION</option>
                                                                    <option value="Obligation">OBLIGATION</option>
                                                                    <option value="dat">DAT(Dépot A Terme)</option>
                                                                    <option value="fcp">FCP(Fonds Commun de Placement)</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="design-placement">Nom du placement <span class="text-danger">*</span> </label>
                                                                <input type="text" id="design-placement" class="form-control" name="design-placement"
                                                                placeholder="Type de placement + taux annuel + année debut - année fin." required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nbr_titre">Nombre de titre <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="nbr_titre" id="nbr_titre" 
                                                                placeholder="Le nombre de titre pour ce placement." data-parsley-type="number" required>
                                                            </div>
                                                            
                                                        </div>

                                                        <!-- Colonne de droite -->
                                                        <div  style="flex: 1;">
                                                            
                                                            <div class="form-group">
                                                                <label for="value_titre">Valeur du titre <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="value_titre" id="value_titre" 
                                                                placeholder="La valeur du titre pour ce placement." data-parsley-type="number" required>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="vacq_titre">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="vacq_titre" id="vacq_titre" 
                                                                placeholder="La valeur d'acquisition du titre." data-parsley-type="number" required>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label>Plages de dates</label>
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" name="start" placeholder="Date de début"/>
                                                                    
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                    </div>
                                                                    
                                                                    <input type="date" class="form-control" name="end" placeholder="Date de fin" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class="form-group mb-0">
                                                        <input type="submit" class="btn btn-primary waves-effect waves-light btn-sm" id="placement-success" value="Créer">
                                                    </div>
            
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
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


        <!-- Init js -->
        <script src="{{asset('assetss/pages/jquery.form-pickers.init.js')}}"></script>

        <!-- Counter js  -->
        <script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!--C3 Chart-->
        <script src="{{asset('plugins/d3/d3.min.js')}}"></script>
        <script src="{{asset('plugins/c3/c3.min.js')}}"></script>

        <!-- Dashboard init -->
        <script src="{{asset('assetss/pages/jquery.dashboard.js')}}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.sweet-alert.init.js')}}"></script>
  

        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>

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
        </script>    --}}
    
    </body>
</html>