<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') . ' |ADMIN-Utilisateurs'}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">

        <!-- DataTables -->
        <link href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />

        <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>

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
                                    <h4 class="page-title"></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{ route('home.admin.all.users')}}">Utilisateurs</a>
                                        </li>
                                        <li class="active">
                                            Administrateur
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        {{-- <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title"><b>Tous les utilisateurs</b></h4>
                                        <p class="text-muted m-b-30">
                                            In this example the column index is prefixed to the column title.
                                        </p>
    
                                        <table id="datatable-fixed-col" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prénoms</th>
                                                    <th>Adresse mail</th>
                                                    <th>Numéro de téléphone</th>
                                                    <th>Agence</th>
                                                    <th>Rôle</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($allusers as $alluser)
                                            <tr>
                                                <td> {{$alluser->lastname}}</td>
                                                <td> {{$alluser->firstname}}</td>
                                                <td> {{$alluser->email}}</td>
                                                <td> {{$alluser->phone}}</td>
                                                <td> {{$alluser->agency->name}}</td>
                                                <td> {{$alluser->role->habilitation ?? 'Aucun role'}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 m-b-30 header-title"><b>Tous les utilisateurs</b></h4>

                                        <table id="datatable-colvid" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénoms</th>
                                                <th>Adresse mail</th>
                                                <th>Numéro de téléphone</th>
                                                <th>Agence</th>
                                                <th>Rôle</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                                @foreach ($allusers as $alluser)
                                                <tr>
                                                    <td> {{$alluser->lastname}}</td>
                                                    <td> {{$alluser->firstname}}</td>
                                                    <td> {{$alluser->email}}</td>
                                                    <td> {{$alluser->phone}}</td>
                                                    <td> {{$alluser->agency->name}}</td>
                                                    <td> {{$alluser->role->habilitation ?? 'Aucun role'}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
                    2016 - 2019 © Codefox. <span class="d-none d-sm-inline-block"> - Coderthemes.com</span>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('assetss/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assetss/js/waves.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>

        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.scroller.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.colVis.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>

        <!-- init -->
        {{-- <script src="{{asset('assetss/pages/jquery.datatables.init.js')}}"></script> --}}
        
        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>   
        
        
        <script>
            $(document).ready(function() {
                    $('#datatable-colvid').DataTable({
                        language: {
                            "sProcessing":   "Traitement en cours...",
                            "sLengthMenu":   "Afficher _MENU_ entrées",
                            "sZeroRecords":  "Aucun résultat trouvé",
                            "sInfo":         "Affichage de l'enregistrement _START_ à _END_ sur _TOTAL_ enregistrements",
                            "sInfoEmpty":    "Affichage de l'enregistrement 0 à 0 sur 0 enregistrement",
                            "sInfoFiltered": "(filtré de _MAX_ enregistrements au total)",
                            "sInfoPostFix":  "",
                            "sSearch":       "Rechercher:",
                            "sUrl":          "",
                            "sEmptyTable":   "Aucune donnée disponible dans le tableau",
                            "sLoadingRecords": "Chargement en cours...",
                            "oPaginate": {
                                "sFirst":    "Premier",
                                "sLast":     "Dernier",
                                "sNext":     "Suivant",
                                "sPrevious": "Précédent"
                            },
                            "oAria": {
                                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                            },
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "0": "Aucune ligne sélectionnée",
                                    "1": "1 ligne sélectionnée"
                                }
                            },
                        }
                   
                    });
            });

        </script>

        {{-- <script>
            let timeout;
            const logoutTime = 2 * 60 * 1000; // 2 minutes en millisecondes
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
        </script>      --}}

    </body>
</html>