<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Exporter des placements'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">


        <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" />
        <link href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Custom box css -->
        <link href="{{asset('plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />

        <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>


        <!-- DataTables CSS -->
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css"> --}}
        <!-- Buttons for export functionality -->
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css"> --}}

        <style>
            .custom-modal-content {
                background: #fdfffd;
                border-radius: 10px;
                padding: 30px;
                max-width: 500px;
                width: 100%;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            .custom-modal-title {
                font-size: 1.5rem;
                font-weight: 600;
                text-align: center;
                margin-bottom: 20px;
            }
            .upload-area {
                border: 2px dashed #6c757d;
                border-radius: 10px;
                padding: 40px;
                text-align: center;
                background-color: #f8f9fa;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .upload-area:hover {
                background-color: #e9ecef;
            }
            .upload-area input[type="file"] {
                display: none;
            }
            .btn-success {
                width: 100%;
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
                                    <h4 class="page-title">Exporter des placements</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li> 
                                            <a href="#custom-modal"  data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-success"><i class="fa fa-plus"></i> Importer</button>
                                            </a>
                                        </li>
                                       
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>

                        <!-- Modal -->
                        <div id="custom-modal" class="modal-demo">
                            <div class="custom-modal-content">
                                <button type="button" class="close" onclick="Custombox.modal.close();">
                                    <span>&times;</span><span class="sr-only">Close</span>
                                </button>
                                
                                <h2 class="custom-modal-title">Importation de Fichier Excel</h2>
                                <div class="card-body">
                                    <form action="{{ route('importer.placement') }}" id="import-form" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="excelfile" class="upload-area">
                                            <span class="text-muted">Glissez-déposez un fichier ici ou cliquez pour le sélectionner</span>
                                            <input type="file" id="excelfile" name="excelfile" accept=".xls,.xlsx,.csv" required>
                                        </label>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-success">Importer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- end row -->

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="card">                    
									<div class="card-body table-responsive">

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

										<table  class="table table-striped table-bordered dt-responsive" id="datatable-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead>
												<tr>
                                                    <th>N° COMPTES</th>
                                                    <th>N° COMPTES PRODUITS FINANCIER.</th>
                                                    <th>TYPE DE PLACEMENT</th>
                                                    <th>PLACEMENT</th>
                                                    <th>DATE DE DEBUT DU PLACEMENT</th>
                                                    <th>DATE DE FIN DU PLACEMENT</th>
                                                    <th>ANNEE D'EXERCICE</th>
                                                    <th>SGI</th>
                                                    <th>NUMERO COMPTE PRODUITS FINANCIER</th>
                                                    <th>DATE DE DERNIER PAIEMENT</th>
                                                    <th>DATE D'ARRET</th>
                                                    <th>NOMBRE DE JOURS ICNE</th>
                                                    <th>PERIODICITE</th>
                                                    <th>TAUX ANNUEL</th>
                                                    <th>TAUX PERIODE</th>
                                                    <th>SOLDE AU 31/12/N-1</th>
                                                    <th>ACQUISITION</th>
                                                    <th>REMBOURSEMENT</th>
                                                    <th>SOLDE AU 31/12/N</th>
                                                    <th>SOLDE COMPTA</th>
                                                    <th>ECART</th>
													<th>NOMBRE TITRE</th>
                                                    <th>VALEUR TITRE</th>
                                                    <th>VALEUR D'ACQUISITION DU TITRE</th>
                                                    <th>PROVISION</th>
                                                    <th>EXT ICNE AU 31/12/N-1</th>
                                                    <th>INTERETS RECUS AU 31/12/N</th>
                                                    <th>ICNE AU 31/12/N</th>
                                                    <th>INTERETS CONTROLE</th>
                                                    <th>INTERETS COMPTA</th>
                                                    <th>INTERETS ATTENDUS</th>
                                                    <th>ECARTS PAIEMENTS</th>
                                                    <th>ECARTS COMPTABILISE</th>
                                                    <th>ICNE COMPTA AU 31/12/N</th>
                                                    <th>ECART ICNE</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($placements as $placement)
                                                    @foreach ($placement->detailPlacements as $detail)

                                                        <tr>
                                                            <td>{{ $placement->num_compte }}</td>
                                                            <td>{{ $placement->sgi->num_compte_prod_finan }}</td>
                                                            <td>{{ $placement->type_placement }}</td>
                                                            <td>{{ $placement->nom_placement }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($placement->date_debut)->format('d/m/Y') }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($placement->date_fin)->format('d/m/Y') }}</td>

                                                            <td>{{ $detail->annee_exercice}}</td>

                                                            <td>{{ $placement->sgi->code_sgi}}</td>

                                                            <td>{{ $placement->sgi->num_compte_prod_finan}}</td>

                                                            <td>{{ $detail->date_dernier_paiement}}</td>
                                                            <td>{{ $detail->date_arret}}</td>
                                                            <td>{{ $detail->nbre_jrs_icne}}</td>

                                                            <td>{{ $placement->periodicite }}</td>
                                                            <td>{{ $placement->taux_annuel . '%' }}</td>
                                                            <td>{{ $placement->taux_periode . '%' }}</td>

                                                            <td>{{ $detail->solde_31_12_n_1}}</td>
                                                            <td>{{ $detail->acquisition}}</td>
                                                            <td>{{ $detail->remboursement}}</td>
                                                            <td>{{ $detail->solde_31_12_n}}</td>
                                                            <td>{{ $detail->solde_comptable}}</td>
                                                            <td>{{ $detail->ecart}}</td>

                                                            <td>{{ $placement->nbre_titre}}</td>
                                                            <td>{{ $placement->valeur_titre}}</td>
                                                            <td>{{ $placement->valeur_acq_titre}}</td>

                                                            <td>{{ $detail->provision_31_12_n}}</td>
                                                            <td>{{ $detail->ext_icne_31_12_n_1}}</td>
                                                            <td>{{ $detail->interet_recu_31_12_n}}</td>
                                                            <td>{{ $detail->icne_31_12_n}}</td>
                                                            <td>{{ $detail->interet_controle}}</td>
                                                            <td>{{ $detail->interet_comptable}}</td>
                                                            <td>{{ $detail->interet_attendu}}</td>
                                                            <td>{{ $detail->ecart_paiement}}</td>
                                                            <td>{{ $detail->ecart_comptabilise}}</td>
                                                            <td>{{ $detail->icne_comptable_31_12_n}}</td>
                                                            <td>{{ $detail->ecart_icne}}</td>
                                                        </tr>

                                                    @endforeach
                                                @endforeach
												
											</tbody>
										</table>
									</div>
								</div>
                            </div>
                        </div> 


                    </div> <!-- container-fluid -->

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

        <!-- Examples -->
	    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script> 
	    <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>


		<!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>

        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script> 
        
        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

          <!-- Modal-Effect -->
          <script src="{{asset('plugins/custombox/js/custombox.min.js')}}"></script>
          <script src="{{asset('plugins/custombox/js/custombox.legacy.min.js')}}"></script>


        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#datatable-responsive').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',    // Active la barre de recherche, la pagination, et les boutons d'export
                    buttons: [
                        {
                            extend: 'excelHtml5', // Exportation en Excel
                            text: 'Excel',
                            autoFilter: true, // Active les filtres automatiques
                            sheetName: 'Placements' // Nom de la feuille
                        },
                        {
                            extend: 'pdfHtml5', // Exportation en PDF
                            text: 'PDF',
                            title: 'Liste des placements' // Titre du document
                        },
                        {
                            extend: 'print', // Impression
                            text: 'Imprimer',
                            title: 'Liste des placements' // Titre imprimé
                        }
                    ],
                    language: {
                        // Traduction des textes par défaut
                        sProcessing: "Traitement en cours...",
                        sSearch: "Rechercher :",
                        sLengthMenu: "Afficher _MENU_ enregistrements",
                        sInfo: "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                        sInfoEmpty: "Affichage de 0 à 0 sur 0 enregistrements",
                        sInfoFiltered: "(filtré de _MAX_ enregistrements au total)",
                        sLoadingRecords: "Chargement en cours...",
                        sZeroRecords: "Aucun enregistrement trouvé",
                        sEmptyTable: "Aucune donnée disponible",
                        oPaginate: {
                            sFirst: "Premier",
                            sPrevious: "Précédent",
                            sNext: "Suivant",
                            sLast: "Dernier"
                        }
                    }
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Fonction pour fermer le modal
            function closeModal() {
                const modal = document.getElementById('custom-modal');
                modal.style.display = 'none';
            }
        
            const uploadArea = document.querySelector('.upload-area');
            const fileInput = document.getElementById('excelfile');
        
            fileInput.addEventListener('change', () => {
                const fileName = fileInput.files[0] ? fileInput.files[0].name : "Aucun fichier sélectionné";
                uploadArea.querySelector('span').innerText = fileName;
            });
        </script>
        

        {{-- <script>
            $(document).ready(function () {
                // Initialisation de DataTables
                $('#datatable-buttons').DataTable({
                    responsive: true, // Rend le tableau responsive
                    dom: 'Bfrtip',    // Active la barre de recherche, la pagination, et les boutons d'export
                    buttons: [
                        {
                            extend: 'excelHtml5', // Exportation en Excel
                            text: 'Excel',
                            autoFilter: true, // Active les filtres automatiques
                            sheetName: 'Placements' // Nom de la feuille
                        },
                        {
                            extend: 'pdfHtml5', // Exportation en PDF
                            text: 'PDF',
                            title: 'Liste des placements' // Titre du document
                        },
                        {
                            extend: 'print', // Impression
                            text: 'Imprimer',
                            title: 'Liste des placements' // Titre imprimé
                        }
                    ],
                    language: {
                        // Traduction des textes par défaut
                        sProcessing: "Traitement en cours...",
                        sSearch: "Rechercher :",
                        sLengthMenu: "Afficher _MENU_ enregistrements",
                        sInfo: "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                        sInfoEmpty: "Affichage de 0 à 0 sur 0 enregistrements",
                        sInfoFiltered: "(filtré de _MAX_ enregistrements au total)",
                        sLoadingRecords: "Chargement en cours...",
                        sZeroRecords: "Aucun enregistrement trouvé",
                        sEmptyTable: "Aucune donnée disponible",
                        oPaginate: {
                            sFirst: "Premier",
                            sPrevious: "Précédent",
                            sNext: "Suivant",
                            sLast: "Dernier"
                        }
                    }
                });
            });

        </script> --}}
    </body>
</html>