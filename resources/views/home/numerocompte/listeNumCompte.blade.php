<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Liste des numéros de comptes'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />

        <!-- Plugin Css-->
        <link rel="stylesheet" href="{{asset('plugins/magnific-popup/css/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" />

        <!-- Custom box css -->
        <link href="{{asset('plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
        <link href="{{asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

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
                                    <h4 class="page-title">Liste des Nº de compte</h4> 
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-success sgi-button" data-toggle="modal" data-target="#con-close-modal-add-numcompte"> <i class="fa fa-plus"></i> <span>Nº de compte</span></button>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-sm-12">
                                <a href="#custom-modal" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                    <button type="button" class="btn btn-importsgi waves-effect waves-light"><i class="fa fa-plus"></i>Importer</button>
                                </a>
 
                                <!-- Modal -->
                                <div id="custom-modal" class="modal-demo">
                                    <button type="button" class="close" onclick="Custombox.modal.close();">
                                        <span>&times;</span><span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="custom-modal-title">Importer les numéros de compte à partir d'un fichier Excel</h4>
                                    <div class="custom-modal-text">
                                        <!-- Formulaire d'importation -->
                                        <form id="import-sgi-form" action="/import-sgi" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="file-upload-area">
                                                <input 
                                                    type="file" 
                                                    id="excelFileInput" 
                                                    name="excel_file" 
                                                    accept=".xls, .xlsx, .csv" 
                                                    class="file-input" 
                                                    onchange="handleFileUpload(this)"
                                                    required 
                                                />
                                                <label for="excelFileInput" class="upload-label">
                                                    <i class="fa fa-cloud-upload fa-3x"></i>
                                                    <p>Glissez et déposez votre fichier ici ou <span class="highlight">cliquez pour sélectionner</span>.</p>
                                                    <p class="file-info">Formats acceptés : .xls, .xlsx, .csv</p>
                                                </label>
                                            </div>

                                            <!-- Boutons -->
                                            <div class="form-actions">
                                                <button type="submit" class="btns btn-primport waves-effect waves-light">
                                                    <i class="fa fa-upload"></i> Importer
                                                </button>
                                                <button type="button" class="btns btn-secann waves-effect" onclick="Custombox.modal.close();">
                                                    <i class="fa fa-times"></i> Annuler
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card">
									<div class="card-body" style="margin: 0 auto; width: 95%;">
                                        <div id="con-close-modal-add-numcompte" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg" style="width: 50%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title mt-0">Formulaire d'ajout d'un numéro de compte</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form>
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="ncompte" class="control-label">Nº de compte <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control ncompte" id="ncompte" name="ncompte" placeholder="12xxxx" data-parsley-type="number" pattern="\d+" required>
                                                                        <span class="text-danger error-ncompte"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="lib_ncompte">Libellé du compte <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control lib_ncompte" id="lib_ncompte" name="lib_ncompte" placeholder="Nom du placement"  required>
                                                                        <span class="text-danger error-libelle_ncompte"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="ncompte_prod_finan">Numéro de compte du produit financier associé <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control ncompte_prod_finan" id="ncompte_prod_finan" name="ncompte_prod_finan" placeholder="12xxxx" data-parsley-type="number" pattern="\d+" required>
                                                                        <span class="text-danger error-ncompte_prod_finan"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary  waves-effect waves-light btn-sm ncompte-sub">Ajouter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal -->
	
										<table class=" table table-striped add-edit-table table-bordered dt-responsive" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead >
												<tr >
                                                    <th>Nº de compte</th>
                                                    <th>Libellé de compte</th>
													<th>Nº de compte du produit financier</th>
													<th style="width: 15%">Actions</th>
                                                    <th hidden>Id</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($numcomptes as $numcompte)
                                                    <tr>
                                                        <td>{{ $numcompte->num_compte }}</td>
                                                        <td>{{ $numcompte->libelle_numcompte }}</td>
                                                        <td>{{ $numcompte->num_compte_prod_finan }}</td>
                                                        <td class="actions">
                                                            <button type="button"
                                                            style="border: none; background-color: transparent; font-size: 5px;" 
                                                            data-toggle="modal" 
                                                            data-target="#con-close-modal"
                                                            class="btn btn-modif waves-effect waves-light edit-btn"
                                                            data-id="{{ $numcompte->id }}"
                                                            data-ncompte= "{{ $numcompte->num_compte }}" 
                                                            data-libncompte="{{ $numcompte->libelle_numcompte }}" 
                                                            data-ncomprodfinan="{{ $numcompte->num_compte_prod_finan }}">
                                                                <i class="fa fa-pencil" style="font-size: 15px"></i>
                                                            </button>

                                                            <button type="button" 
                                                            style="border: none; background-color: transparent; font-size: 5px;" 
                                                            class="btn btn-del waves-effect waves-light delete-btn"
                                                             
                                                            data-id="{{ $numcompte->id }}">
                                                                <i class="fa fa-trash-o" style="font-size: 15px"></i>
                                                            </button>
                                                        </td>
                                                        <td hidden> {{$numcompte->id}} </td>
                                                    </tr>
                                                @endforeach
												
											</tbody>
										</table>
									</div>
								</div>
                            </div>

                            <!-- Modal Start -->
                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            
                                <div class="modal-dialog modal-lg" style="width: 45%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title mt-0">Modification</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form>
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control ncompteid" name="ncompteid">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="ncompte_update" class="control-label">Nº de compte <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control ncompte_update" id="ncompte_update"  name="ncompte_update" placeholder="12xxxx" data-parsley-type="number" pattern="\d+" required>
                                                            <span class="text-danger errors-ncompteupdate"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label for="libncompte_update" class="control-label">Libellé du compte <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control libncompte_update" id="libncompte_update" name="libncompte_update"  placeholder="Nom du placement" required>
                                                            <span class="text-danger errors-libncupdate"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="ncprodfinan_update" class="control-label">Numéro de compte du produit financier associé <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control ncprodfinan_update" id="ncprodfinan_update" name="ncprodfinan_update" placeholder="12xxxx" data-parsley-type="number" pattern="\d+" required>
                                                            <span class="text-danger errors-ncpfupdate"></span> <!-- Zone pour le message d'erreur -->
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn-chang btn-appliq waves-effect waves-light">Appliquer les changements</button>
                                            </div>
                                        </form>
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
	    <script src="{{asset('plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
	    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script> 
	    <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
	    <script src="{{asset('plugins/tiny-editable/mindmup-editabletable.js')}}"></script>
		<script src="{{asset('plugins/tiny-editable/numeric-input-example.js')}}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.sweet-alert.init.js')}}"></script>

		<!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Modal-Effect -->
        <script src="{{asset('plugins/custombox/js/custombox.min.js')}}"></script>
        <script src="{{asset('plugins/custombox/js/custombox.legacy.min.js')}}"></script>
    
		{{-- <script src="{{asset('assetss/pages/jquery.datatables.editable.init.js')}}"></script> --}}

        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>

        <script>
			$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
		</script>

        <script>
            // Fonction pour afficher le nom du fichier sélectionné
            function handleFileUpload(input) {
                const fileName = input.files[0]?.name || '';
                const label = input.nextElementSibling; // Le label associé à l'input
                const fileInfo = label.querySelector('.file-info');
                
                if (fileName) {
                    fileInfo.textContent = `Fichier sélectionné : ${fileName}`;
                    fileInfo.style.color = '#28a745'; // Mettre en évidence le fichier sélectionné
                } else {
                    fileInfo.textContent = 'Formats acceptés : .xls, .xlsx, .csv';
                    fileInfo.style.color = '#999';
                }
            }
        </script>

        <script>
            $(document).ready(function() {  
                $('#datatable-editable').DataTable({
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

        {{-- Script permettant de créer un numero de compte avec Fetch --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const createButton = document.querySelector('.ncompte-sub');

                createButton.addEventListener('click', async function (e) {
                    e.preventDefault();

                    // Désactiver le bouton pour éviter les doubles soumissions
                    createButton.disabled = true;

                    // Réinitialiser les messages d'erreur
                    document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

                    // Récupérer les données du formulaire
                    const formData = {
                        _token: '{{ csrf_token() }}',
                        'ncompte': document.querySelector('.ncompte').value,
                        'libelle_ncompte': document.querySelector('.lib_ncompte').value,
                        'ncompte_prod_finan': document.querySelector('.ncompte_prod_finan').value,
                    };

                    try {
                        // Envoi des données via Fetch
                        const response = await fetch('/home/liste-des-numeros-de-compte/ajouter-numero-compte', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(formData),
                        });

                        // Vérification de la réponse
                        const result = await response.json();

                        if (response.ok && result.success) {
                            Swal.fire({
                                title: "Succès!",
                                text: result.message,
                                type: "success",
                                confirmButtonColor: '#4fa7f3',
                            }).then(() => {
                                // Recharger le tableau ou la page (optionnel)
                                location.reload();
                            });
                        } else {
                            // Gérer les erreurs envoyées par le contrôleur
                            if (result.errors) {
                                for (const field in result.errors) {
                                    const errorElement = document.querySelector(`.error-${field}`);
                                    if (errorElement) {
                                        errorElement.textContent = result.errors[field][0];
                                    }
                                }
                            } else {
                                Swal.fire("Erreur","Une erreur est survenue.", "error");
                            }
                        }

                    } catch (error) {
                        console.error("Erreur inattendue :", error);
                        Swal.fire("Erreur", "Une erreur inattendue est survenue. Veuillez réessayer.", "error");
                    } finally {
                        // Réactiver le bouton
                        createButton.disabled = false;
                    }
                });
            });
        </script>

        {{-- Script qui permet d'afficher le modal et de remplir les champs du modal --}}
        <script>
            $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.ncompteid').val('');
                    $('.ncompte_update').val('');
                    $('.libncompte_update').val('');
                    $('.ncprodfinan_update').val('');
                    
                    // Récupérer les valeurs data-* de l'élément cliqué
                    const ncompteId = $(this).data('id');
                    const numCompte = $(this).data('ncompte');
                    const libNumCompte = $(this).data('libncompte');
                    const numCompteProdFinan = $(this).data('ncomprodfinan');
                    
                    // Remplir les champs du modal avec les valeurs récupérées
                    $('.ncompteid').val(ncompteId);
                    $('.ncompte_update').val(numCompte);
                    $('.libncompte_update').val(libNumCompte);
                    $('.ncprodfinan_update').val(numCompteProdFinan);
                });

                // Réinitialiser les champs lorsque le modal est fermé
                $('#con-close-modal').on('hidden.bs.modal', function () {
                    $('.ncompteid').val('');
                    $('.ncompte_update').val('');
                    $('.libncompte_update').val('');
                    $('.ncprodfinan_update').val('');
                });
            });
        </script>

        {{-- Script permettant de faire la mise a jour du numero de compte avec Fetch --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                
                const updateButton = document.querySelector('.btn-chang');

                updateButton.addEventListener('click', async function (e) {
                    e.preventDefault();

                    // Désactiver le bouton pour éviter les doubles soumissions
                    updateButton.disabled = true;

                    // Récupérer les données du formulaire
                    const formData = {
                        _token: '{{ csrf_token() }}',
                        'id': document.querySelector('.ncompteid').value,
                        'ncompteupdate': document.querySelector('.ncompte_update').value,
                        'libncupdate': document.querySelector('.libncompte_update').value,
                        'ncpfupdate': document.querySelector('.ncprodfinan_update').value,
                    };

                    try {
                        // Envoi des données via Fetch
                        const response = await fetch('/home/liste-des-numeros-de-compte/modifier', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(formData),
                        });

                        // Analyse de la réponse JSON
                        const result = await response.json();

                        if (response.ok && result.success) {
                            Swal.fire({
                                title: 'Succès!',
                                text: result.message,
                                type: 'success',
                                confirmButtonColor: '#4fa7f3',
                            }).then(() => {
                                location.reload(); // Recharger la page après confirmation
                            });
                        } else if (response.status === 422 && result.errors){
                            // Réinitialiser les messages d'erreur
                            document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

                            // Affichage des erreurs de validation
                            for (const field in result.errors) {
                                const errorElement = document.querySelector(`.errors-${field}`);
                                if (errorElement) {
                                    // Affiche le premier message d'erreur pour le champ concerné
                                    errorElement.textContent = result.errors[field][0];
                                }
                            }     
                            
                        } else {
                            Swal.fire("Erreur","Une erreur est survenue.", "error");
                        }
                    } catch (error) {
                        console.error("Erreur inattendue :", error);
                        Swal.fire("Erreur", "Une erreur inattendue est survenue. Veuillez réessayer.", "error");
                    } finally {
                        // Réactiver le bouton
                        updateButton.disabled = false;
                    }
                });
            });
        </script>

        {{-- Script pour la suppression d'un numero de compte dans le tableau --}}
        <script>
            // Utilisation de la délégation d'événements sur la table avec son ID
            $('#datatable-editable').on('click', '.delete-btn', function () {
                let numCompteId = $(this).data('id');  // Récupération de l'ID de l'élément à supprimer

                // Afficher la confirmation de suppression avec SweetAlert
                Swal.fire({
                    title: "Êtes-vous sûr ?",
                    text: "Vous ne pourrez pas revenir en arrière !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#4fa7f3",
                    cancelButtonColor: "#ec536c",
                    confirmButtonText: "Oui, supprimer !",
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/home/liste-des-numeros-de-compte/supprimer',  // Route pour la suppression
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',  // Token CSRF pour valider la requête
                                id: numCompteId
                            },
                            success: function(response) {
                                if(response.success) {
                                    Swal.fire("Supprimé!", "Le numero de compte a été supprimé avec succès.", "success").then(() => {
                                        location.reload();  // Recharge la page pour mettre à jour les données
                                    });
                                } else {
                                    Swal.fire("Erreur", "Une erreur est survenue lors de la suppression.", "error");
                                }
                            },
                            error: function(xhr) {
                                console.error("Erreur lors de la suppression :", xhr.responseText); // Affiche l'erreur complète
                                Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                            }
                        });
                    }
                });
            });
        </script>
        
        
        
    </body>
</html>