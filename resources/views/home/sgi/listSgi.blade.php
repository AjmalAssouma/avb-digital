<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Liste des SGI'}}</title>

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
                                    <h4 class="page-title">Liste des SGI (Societe de Gestion d'Intermédiations)</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <button type="button" class="btn btn-primary  waves-effect waves-light btn-sm sgi-button" data-toggle="modal" data-target="#con-close-modal-sgi-created">Créer une SGI</button>
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
									<div class="card-body" style="margin: 0 auto; width: 95%;">
                                        <div id="con-close-modal-sgi-created" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg" style="width: 50%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title mt-0">Formulaire de création d'une SGI</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form >
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="code_sgi" class="control-label">Code SGI<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control code_sgi" id="code_sgi" name="code_sgi" placeholder="SGI,AGI,BFS etc..." oninput="this.value = this.value.toUpperCase();" required>
                                                                        <span class="text-danger error-code_sgi"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label for="designation_sgi">Désignation de la SGI <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control designation_sgi" id="designation_sgi" name="designation_sgi" placeholder="Nom complet de la SGI"  required>
                                                                        <span class="text-danger error-designation_sgi"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="num_compte_prod_finan">Numéro de compte du produit financier <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control num_compte_prod_finan" id="num_compte_prod_finan" name="num_compte_prod_finan" placeholder="77xxxxxxx" data-parsley-type="number" pattern="\d+" required>
                                                                        <span class="text-danger error-num_compte_prod_finan"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary  waves-effect waves-light btn-sm sgi-sub">Créer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- /.modal -->
	
										<table class=" table table-striped add-edit-table table-bordered dt-responsive" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead >
												<tr >
                                                    <th>Code de la SGI</th>
                                                    <th>Désignation de la SGI</th>
													<th>Numéro de compte du produits financier</th>
													<th>Actions</th>
                                                    <th hidden>Id</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($sgis as $sgi)
                                                    <tr>
                                                        <td>{{ $sgi->code_sgi }}</td>
                                                        <td>{{ $sgi->designation_sgi }}</td>
                                                        <td>{{ $sgi->num_compte_prod_finan }}</td>
                                                        <td class="actions">
                                                            <button type="button"
                                                            style="border: none; background-color: transparent;" 
                                                            data-toggle="modal" 
                                                            data-target="#con-close-modal"
                                                            class="edit-btn"
                                                            data-id="{{ $sgi->id }}"
                                                            data-codesgi= "{{ $sgi->code_sgi }}" 
                                                            data-designation="{{ $sgi->designation_sgi }}" 
                                                            data-numcompte="{{ $sgi->num_compte_prod_finan }}">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                            <button type="button" 
                                                            style="border: none; background-color: transparent;" 
                                                            class="delete-btn"
                                                             
                                                            data-id="{{ $sgi->id }}">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </td>
                                                        <td hidden> {{$sgi->id}} </td>
                                                    </tr>
                                                @endforeach
												
											</tbody>
										</table>
									</div>
								</div>
                            </div>

                            <!-- Modal Start -->
                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title mt-0">Modification de la SGI</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control sgi_id" name="sgi_id">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="codesgi_update" class="control-label">Code SGI<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control codesgi_update" id="codesgi_update"  name="codesgi_update" placeholder="SGI,AGI,BFS etc..." oninput="this.value = this.value.toUpperCase();" required>
                                                            <span class="text-danger error-codesgi"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label for="designation_update" class="control-label">Désignation de la SGI <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control designation_update" id="designation_update" name="designation_update"  placeholder="Nom complet de la SGI.." required>
                                                            <span class="text-danger error-designation"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="numcompte_update" class="control-label">Numéro de compte du produit financier <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control numcompte_update" id="numcompte_update" name="numcompte_update" placeholder="77xxxxxxx">
                                                            <span class="text-danger error-numcompte"></span> <!-- Zone pour le message d'erreur -->
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn-chang btn-appliq waves-effect waves-light">Appliquer les changements</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
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

        {{-- Script qui permet d'afficher le modal et de faire la mise a jours --}}
        <script>
            $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.sgi_id').val('');
                    $('.codesgi_update').val('');
                    $('.designation_update').val('');
                    $('.numcompte_update').val('');
                    
                    // Récupérer les valeurs data-* de l'élément cliqué
                    const sgiId = $(this).data('id');
                    const codeSgi = $(this).data('codesgi');
                    const designation = $(this).data('designation');
                    const numCompte = $(this).data('numcompte');
                    
                    // Remplir les champs du modal avec les valeurs récupérées
                    $('.sgi_id').val(sgiId);
                    $('.codesgi_update').val(codeSgi);
                    $('.designation_update').val(designation);
                    $('.numcompte_update').val(numCompte);
                });

                // Réinitialiser les champs lorsque le modal est fermé
                $('#con-close-modal').on('hidden.bs.modal', function () {
                    $('.sgi_id').val('');
                    $('.codesgi_update').val('');
                    $('.designation_update').val('');
                    $('.numcompte_update').val('');
                });
            });

            $(document).ready(function () {
                $('.btn-chang').on('click', function (e) {
                    e.preventDefault();
                    // Récupérer les données du formulaire
                    const sgiId = $('.sgi_id').val();
                    const codeSgi = $('.codesgi_update').val();
                    const designation = $('.designation_update').val();
                    const numCompte = $('.numcompte_update').val();

                    // Envoyer une requête AJAX pour mettre à jour les informations
                    $.ajax({
                        url: '/home/liste-des-sgis/modifier', // URL vers la méthode du controller
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // Token CSRF
                            id: sgiId,
                            code_sgi: codeSgi,
                            designation_sgi: designation,
                            num_compte_prod_finan: numCompte,
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                title: 'Succès',
                                text: response.message,
                                type: 'success',
                                confirmButtonColor: '#4fa7f3'
                                }).then(() => {
                                    location.reload(); // Recharger la page après confirmation
                                });
                            }
                        },
                        error: function (xhr) {
                           // Réinitialiser les messages d'erreur
                            $('.error-designation').text('');
                            $('.error-numcompte').text('');
                            $('.error-codesgi').text('');

                            // Afficher les messages d'erreur en fonction des champs
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                if (xhr.responseJSON.errors.designation_sgi) {
                                    $('.error-designation').text(xhr.responseJSON.errors.designation_sgi[0]);
                                }
                                if (xhr.responseJSON.errors.num_compte_prod_finan) {
                                    $('.error-numcompte').text(xhr.responseJSON.errors.num_compte_prod_finan[0]);
                                }
                                if (xhr.responseJSON.errors.code_sgi) {
                                    $('.error-codesgi').text(xhr.responseJSON.errors.code_sgi[0]);
                                }
                            } else {
                                Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                            }
                        }
                    });
                });
            });

            // Script permettant de créer une SGI
            $(document).ready(function () {
                $('.sgi-sub').on('click', function (e) {
                    e.preventDefault();

                    // Réinitialiser les messages d'erreur
                    $('.text-danger').text('');

                    // Récupérer les données du formulaire
                    let formData = {
                        _token: '{{ csrf_token() }}',  // Token CSRF
                        'code_sgi': $('.code_sgi').val(),
                        'designation_sgi': $('.designation_sgi').val(),
                        'num_compte_prod_finan': $('.num_compte_prod_finan').val()
                    };

                    // Requête Ajax pour envoyer les données au contrôleur
                    $.ajax({
                        url: '/home/liste-des-sgis/creer-une-sgi',
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Succès!",
                                    text: response.message,
                                    type: "success", // Correction ici : utilisez 'icon' au lieu de 'type'
                                    confirmButtonColor: '#4fa7f3'
                                }).then(() => {
                                    location.reload();  // Recharger la page ou mettre à jour le tableau
                                });
                            } else {
                                Swal.fire("Erreur", response.message, "error");
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr.responseJSON); // Affiche les détails de l'erreur dans la console
                            // Gérer les erreurs de validation
                            if (xhr.status === 422) {  // Code d'erreur de validation Laravel
                                let errors = xhr.responseJSON.errors;
                                if (errors['code_sgi']) {
                                    $('.error-code_sgi').text(errors['code_sgi'][0]);
                                }
                                if (errors['designation_sgi']) {
                                    $('.error-designation_sgi').text(errors['designation_sgi'][0]);
                                }
                                if (errors['num_compte_prod_finan']) {
                                    $('.error-num_compte_prod_finan').text(errors['num_compte_prod_finan'][0]);
                                }
                            } else {
                                Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                            }
                        }
                    });
                });
            });
        </script>

        {{-- Script pour la suppression d'une SGI dans le tableau --}}
        <script>
           // Utilisation de la délégation d'événements sur la table avec son ID
            $('#datatable-editable').on('click', '.delete-btn', function () {
                let sgiId = $(this).data('id');  // Récupération de l'ID de l'élément à supprimer

                // Afficher la confirmation de suppression avec SweetAlert
                Swal.fire({
                    title: "Êtes-vous sûr ?",
                    text: "Vous ne pourrez pas revenir en arrière !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#4fa7f3",
                    cancelButtonColor: "#ec536c",
                    confirmButtonText: "Oui, supprimer !"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/home/liste-des-sgis/suppression',  // Route pour la suppression
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',  // Token CSRF pour valider la requête
                                id: sgiId  // ID de l'élément à supprimer
                            },
                            success: function(response) {
                                if(response.success) {
                                    Swal.fire("Supprimé!", "L'enregistrement a été supprimé avec succès.", "success").then(() => {
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