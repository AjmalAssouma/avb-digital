<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Liste des placements'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">

        <!-- Plugin Css-->
        <link rel="stylesheet" href="{{asset('plugins/magnific-popup/css/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" />

        <!-- Tooltipster css -->
        <link rel="stylesheet" href="{{asset('plugins/tooltipster/tooltipster.bundle.min.css')}}">

        <!-- Custom box css -->
        <link href="{{asset('plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

        <link href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
        <link href="{{asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

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
                                    <h4 class="page-title">Liste des placements</h4>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="card">
									<div class="card-body" style="margin: 0 auto; width: 95%;">
										<table class="table table-striped add-edit-table table-bordered dt-responsive responsive" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead>
												<tr>
                                                    <th>Numéro de compte</th>
                                                    <th>Placement</th>
                                                    <th>Type de placement</th>
                                                    <th>SGI</th>
                                                    <th>Numéro de compte du produits financier</th>
                                                    <th>Périodicité</th>
                                                    <th>Taux annuel</th>
                                                    <th>Taux période</th>
                                                    <th>Durée</th>
													<th>Nombre de titre</th>
                                                    <th>Valeur du titre</th>
                                                    <th>Valeur d'acquisition du titre</th>
                                                    <th>Date de début du placement</th>
                                                    <th>Date de fin du placement</th>
                                                    <th>Gain</th>
													<th style="width: 10%">Actions</th>
                                                    <th hidden>Id</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($placements as $placement)
                                                
                                                    <tr>
                                                        <td>{{ $placement->num_compte }}</td>
                                                        <td>{{ $placement->nom_placement }}</td>
                                                        <td>{{ $placement->type_placement }}</td>
                                                        <td>{{ $placement->sgi->code_sgi }}</td>
                                                        <td> {{ $placement->sgi->num_compte_prod_finan }} </td>
                                                       
                                                        {{-- <td>{{ $placement->periodicite }}</td>
                                                        <td>{{ $placement->taux_annuel . '%' }}</td>
                                                        <td>{{ $placement->taux_periode . '%' }}</td> --}}

                                                        <td>{{ $placement->type_placement !== 'ACTIONS' ? $placement->periodicite : '' }}</td>
                                                        <td>{{ $placement->type_placement !== 'ACTIONS' ? $placement->taux_annuel . '%' : '' }}</td>
                                                        <td>{{ $placement->type_placement !== 'ACTIONS' ? $placement->taux_periode . '%' : '' }}</td>
                                                        
                                                        <td>{{ $placement->duree. 'ans' }}</td>
                                                        <td>{{ $placement->nbre_titre }}</td>
                                                        <td>{{ $placement->valeur_titre }}</td>
                                                        <td>{{ $placement->valeur_acq_titre }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($placement->date_debut)->format('d/m/Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($placement->date_fin)->format('d/m/Y') }}</td>
                                                        <td>{{ $placement->gain }}</td>
                                                        <td class="actions">
                                                            @php
                                                                $modalTarget = match($placement->type_placement) {
                                                                    'OBLIGATIONS' => '#con-close-modal-obl',
                                                                    'ACTIONS' => '#con-close-modal-act',
                                                                    'DAT' => '#con-close-modal-dat',
                                                                    'FCP' => '#con-close-modal-fcp',
                                                                    default => '#default-modal',
                                                                };
                                                            @endphp

                                                            <button type="button"
                                                                style="display: inline-block;" 
                                                                data-toggle="modal" 
                                                                {{-- data-target="#con-close-modal-obl" --}}
                                                                data-target="{{ $modalTarget }}"
                                                                class="btn btn-modif waves-effect waves-light edit-btn"
                                                                data-id="{{$placement->id}}"
                                                                data-sgisid="{{$placement->sgis_id}}"
                                                                data-numcompte="{{$placement->num_compte}}"
                                                                data-nomplace="{{$placement->nom_placement}}"
                                                                data-periodicite="{{$placement->periodicite}}"
                                                                data-tauxannuel="{{$placement->taux_annuel}}"
                                                                data-tauxperiode="{{$placement->taux_periode}}"
                                                                data-typeplace="{{$placement->type_placement}}"
                                                                data-duree="{{$placement->duree}}"
                                                                data-nbretitre="{{$placement->nbre_titre }}"
                                                                data-valtitre="{{$placement->valeur_titre}}"
                                                                data-valacqtitre="{{$placement->valeur_acq_titre}}"
                                                                data-datedebut="{{$placement->date_debut}}"
                                                                data-datefin="{{$placement->date_fin}}"
                                                                data-gain="{{$placement->gain}}"
                                                            >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                            <button type="button" 
                                                            style="display: inline-block;" 
                                                            class="btn btn-del waves-effect waves-light delete-btn"
                                                            data-id="{{$placement->id}}">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>

                                                            <a href="{{ route('details.placement', ['id' => Crypt::encrypt($placement->id)]) }}" 
                                                            class="btn waves-effect waves-light btn-success">
                                                                <i class="fa fa-info-circle"></i>  Voir les détails
                                                            </a>
                                                            
                                                        </td>
                                                        <td hidden> {{$placement->id}} </td>
                                                    </tr>
                                                @endforeach
												
											</tbody>
										</table>
									</div>
								</div>
                            </div>

                            <!-- Modal Start OBLIGATIONS -->
                            <div id="con-close-modal-obl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title mt-0">Modification du placement</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form  method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                    <div class="form-group">
                                                        <input type="text" id="placement_id" class="form-control placement_id" name="placement_id" hidden required>  
                                                    </div>
                                                    <!-- Colonne de gauche -->
                                                    <div style="flex: 1;">

                                                        <div class="form-group">
                                                            <label for="typeplacement_update">Type du placement <span class="text-danger">*</span> </label>
                                                            <input type="text" id="typeplacement_update" class="form-control typeplacement_update" name="typeplacement_update" 
                                                            placeholder="OBLIGATION" readonly required>
                                                            <span class="text-danger error-type_placement_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="numcompte_update">Numéro de compte <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control numcompte_update" name="numcompte_update" id="numcompte_update" 
                                                            placeholder="Le numéro de compte doit etre uniquement composé de chiffre"  data-parsley-type="number" pattern="\d+" required>
                                                            <span class="text-danger error-num_compte_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="periodicite_update">Périodicité <span class="text-danger">*</span> </label>
                                                            <select  class="form-control periodicite_update" name="periodicite_update" id="periodicite_update" required style="cursor: pointer">
                                                                <option value="">Sélectionnez une périodicité.</option>
                                                                <option value="Trimestre">Trimestre</option>
                                                                <option value="Semestre">Semestre</option>
                                                                <option value="Annuel">Annuel</option>
                                                            </select>
                                                            <span class="text-danger error-periodicite_update"></span>
                                                        </div>

                                                        <div class="form-group">  
                                                            <label for="tauxperiode_update">Taux période <span class="text-danger">*</span></label>  
                                                            <div class="input-group">  
                                                                <input type="text" id="tauxperiode_update" class="form-control tauxperiode_update" name="tauxperiode_update" required readonly>  
                                                                <div class="input-group-append">  
                                                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                </div>
                                                                <span class="text-danger error-taux_periode_update"></span>
                                                            </div>    
                                                        </div>  

                                                        <div class="form-group">
                                                            <label for="valeurtitre_update">Valeur du titre <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control valeurtitre_update" name="valeurtitre_update" id="valeurtitre_update" 
                                                            placeholder="La valeur du titre pour ce placement." data-parsley-type="number" oninput="calculateGain()" pattern="\d+" required />
                                                            <span class="text-danger error-valeur_titre_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Plages de dates</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control datestart_update" name="datestart_update" placeholder="Date de début" required />
                                                                <span class="text-danger error-date_debut_update"></span>
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                </div>
                                                                
                                                                <input type="date" class="form-control dateend_update" name="dateend_update" placeholder="Date de fin" required />
                                                                <span class="text-danger error-date_fin_update"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="gain_update">Gain total <span class="text-danger">*</span> </label>
                                                            <input type="text" id="gain_update" class="form-control gain_update" name="gain_update" 
                                                            placeholder="(Valeur du titre - Valeur d'acquisition du titre) * Durée" data-parsley-type="number" pattern="\d+" readonly required>
                                                            <span class="text-danger error-gain_update"></span>
                                                        </div>
                                                        
                                                    </div>

                                                    <!-- Colonne de droite -->
                                                    <div  style="flex: 1;">

                                                        <div class="form-group">
                                                            <label for="nomplacement_update">Nom du placement <span class="text-danger">*</span> </label>
                                                            <input type="text" id="nomplacement_update" class="form-control nomplacement_update" name="nomplacement_update" 
                                                            placeholder="Type de placement + taux annuel + année debut - année fin." required>
                                                            <span class="text-danger error-nom_placement_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="sgis_id">SGI <span class="text-danger">*</span></label> 
                                                            <select class="form-control select2 sgisid_update" name="sgisid_update" id="sgisid_update" required>
                                                                <option value="">Sélectionnez une SGI</option>
                                                                @foreach ($sgis as $sgi)
                                                                <option value="{{$sgi->id}}"> {{$sgi->code_sgi}} ({{ $sgi->num_compte_prod_finan }}) </option>                                                                          
                                                                @endforeach
                                                            </select>  
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tauxannuel_update">Taux annuel <span class="text-danger">*</span> </label>
                                                            <input type="text" id="tauxannuel_update" class="form-control tauxannuel_update" name="tauxannuel_update" required>
                                                            <span class="text-danger error-taux_annuel_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nbretitre_update">Nombre de titre <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control nbretitre_update" name="nbretitre_update" id="nbretitre_update" 
                                                            placeholder="Le nombre de titre pour ce placement." data-parsley-type="number" pattern="\d+" required>
                                                            <span class="text-danger error-nbre_titre_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="vacqtitre_update">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control vacqtitre_update" name="vacqtitre_update" id="vacqtitre_update" 
                                                            placeholder="La valeur d'acquisition du titre." data-parsley-type="number" pattern="\d+" oninput="calculateGain()"  required>
                                                            <span class="text-danger error-valeur_acq_titre_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="dureeannee_update">Durée (en année) <span class="text-danger">*</span> </label>
                                                            <input type="text" id="dureeannee_update" class="form-control dureeannee_update" name="dureeannee_update"
                                                            placeholder="Nombre d'année que couvre le placement" pattern="\d+" readonly required>
                                                            <span class="text-danger error-duree_update"></span>
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
                            

                            <!-- Modal Start ACTIONS -->
                            <div id="con-close-modal-act" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title mt-0">Modification du placement</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form  method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                    <div class="form-group">
                                                        <input type="text" id="placement_actions_id" class="form-control placement_actions_id" name="placement_actions_id" hidden required>  
                                                    </div>
                                                    <!-- Colonne de gauche -->
                                                    <div style="flex: 1;">

                                                        <div class="form-group">
                                                            <label for="typeplacement_actions_update">Type du placement <span class="text-danger">*</span> </label>
                                                            <input type="text" id="typeplacement_actions_update" class="form-control typeplacement_actions_update" name="typeplacement_actions_update" 
                                                            placeholder="ACTIONS" readonly required>
                                                            <span class="text-danger error-type_placement_actions_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="numcompte_actions_update">Numéro de compte <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control numcompte_actions_update" name="numcompte_actions_update" id="numcompte_actions_update" 
                                                            placeholder="Le numéro de compte doit etre uniquement composé de chiffre"  data-parsley-type="number" pattern="\d+" required>
                                                            <span class="text-danger error-num_compte_actions_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="valeurtitre_actions_update">Valeur du titre <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control valeurtitre_actions_update" name="valeurtitre_actions_update" id="valeurtitre_actions_update" 
                                                            placeholder="La valeur du titre pour ce placement." data-parsley-type="number" oninput="calculateGain()" pattern="\d+" required />
                                                            <span class="text-danger error-valeur_titre_actions_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Plages de dates</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control datestart_actions_update" name="datestart_actions_update" placeholder="Date de début" required />
                                                                <span class="text-danger error-date_debut_actions_update"></span>
                                                                
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                </div>
                                                                
                                                                <input type="date" class="form-control dateend_actions_update" name="dateend_actions_update" placeholder="Date de fin" required />
                                                                <span class="text-danger error-date_fin_actions_update"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="gain_actions_update">Gain total <span class="text-danger">*</span> </label>
                                                            <input type="text" id="gain_actions_update" class="form-control gain_actions_update" name="gain_actions_update" 
                                                            placeholder="(Valeur du titre - Valeur d'acquisition du titre)" data-parsley-type="number" pattern="\d+" readonly required>
                                                            <span class="text-danger error-gain_actions_update"></span>
                                                        </div>
                                                        
                                                    </div>

                                                    <!-- Colonne de droite -->
                                                    <div  style="flex: 1;">

                                                        <div class="form-group">
                                                            <label for="nomplacement_actions_update">Nom du placement <span class="text-danger">*</span> </label>
                                                            <input type="text" id="nomplacement_actions_update" class="form-control nomplacement_actions_update" name="nomplacement_actions_update" 
                                                            placeholder="Type de placement + taux annuel + année debut - année fin." required>
                                                            <span class="text-danger error-nom_placement_actions_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="sgis_actions_id">SGI <span class="text-danger">*</span></label> 
                                                            <select class="form-control select2 sgis_actions_id" name="sgis_actions_id" id="sgis_actions_id" required>
                                                                <option value="">Sélectionnez une SGI</option>
                                                                @foreach ($sgis as $sgi)
                                                                <option value="{{$sgi->id}}"> {{$sgi->code_sgi}} ({{ $sgi->num_compte_prod_finan }}) </option>                                                                          
                                                                @endforeach
                                                            </select>  
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nbretitre_actions_update">Nombre de titre <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control nbretitre_actions_update" name="nbretitre_actions_update" id="nbretitre_actions_update" 
                                                            placeholder="Le nombre de titre pour ce placement." data-parsley-type="number" pattern="\d+" required>
                                                            <span class="text-danger error-nbre_titre_actions_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="vacqtitre_actions_update">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control vacqtitre_actions_update" name="vacqtitre_actions_update" id="vacqtitre_actions_update" 
                                                            placeholder="La valeur d'acquisition du titre." data-parsley-type="number" pattern="\d+" oninput="calculateGain()"  required>
                                                            <span class="text-danger error-valeur_acq_titre_actions_update"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="dureeannee_actions_update">Durée (en année) <span class="text-danger">*</span> </label>
                                                            <input type="text" id="dureeannee_actions_update" class="form-control dureeannee_actions_update" name="dureeannee_actions_update"
                                                            placeholder="Nombre d'année que couvre le placement" pattern="\d+" readonly required>
                                                            <span class="text-danger error-duree_actions_update"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn-chang btn-actions btn-appliq waves-effect waves-light">Appliquer les changements</button>
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

        <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.form-advanced.init.js')}}"></script>

        <script src="{{asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.sweet-alert.init.js')}}"></script>

		<!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Modal-Effect -->
        <script src="{{asset('plugins/custombox/js/custombox.min.js')}}"></script>
        <script src="{{asset('plugins/custombox/js/custombox.legacy.min.js')}}"></script>

        <!-- Tooltipster js -->
        <script src="{{asset('plugins/tooltipster/tooltipster.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.tooltipster.js')}}"></script>
        
		{{-- <script src="{{asset('assetss/pages/jquery.datatables.editable.init.js')}}"></script> --}}
        
        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>

        <script>
			$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
		</script>

        <script>
            $("input[name='tauxannuel_update']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.01,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
        </script>

        {{-- Script pour calculer le taux periode  --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const tauxAnnuelInput = document.querySelector("input[name='tauxannuel_update']");
                const periodiciteSelect = document.querySelector("#periodicite_update");
                const tauxPeriodeInput = document.querySelector("#tauxperiode_update");
        
                function calculateTauxPeriode() {
                    const tauxAnnuel = parseFloat(tauxAnnuelInput.value) || 0;
                    const periodicite = periodiciteSelect.value;
        
                    let tauxPeriode = 0;
        
                    switch (periodicite) {
                        case "Trimestre":
                            tauxPeriode = tauxAnnuel / 4;
                            break;
                        case "Semestre":
                            tauxPeriode = tauxAnnuel / 2;
                            break;
                        case "Annuel":
                            tauxPeriode = tauxAnnuel;
                            break;
                        default:
                            tauxPeriode = 0;
                    }
        
                    // Mettre à jour le champ taux_periode avec deux décimales
                    tauxPeriodeInput.value = tauxPeriode.toFixed(2);
                }
        
                // Ajouter des écouteurs pour Touchspin (change) et saisie manuelle (input)
                tauxAnnuelInput.addEventListener("input", calculateTauxPeriode);
                tauxAnnuelInput.addEventListener("change", calculateTauxPeriode);
                periodiciteSelect.addEventListener("change", calculateTauxPeriode);

                // Événement spécifique à Touchspin
                $("input[name='tauxannuel_update']").on('touchspin.on.stopspin', function() {
                    calculateTauxPeriode();
                });
            });
        </script>

        {{-- Script qui permet d'afficher le modal --}}
        <script>
            // Script qui permet d'afficher le modal et les informations concernants les OBLIGATIONS
            $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.placement_id').val('');
                    $('.typeplacement_update').val('');
                    $('.numcompte_update').val('');
                    $('.nbretitre_update').val('');
                    $('.periodicite_update').val('');
                    $('.tauxannuel_update').val('');
                    $('.tauxperiode_update').val('');
                    $('.vacqtitre_update').val('');
                    $('.dureeannee_update').val('');
                    $('.nomplacement_update').val('');
                    $('.sgisid_update').val('');
                    $('.valeurtitre_update').val('');
                    $('.datestart_update').val('');
                    $('.dateend_update').val('');
                    $('.gain_update').val('');
                    
                    // Récupérer les valeurs data-* de l'élément cliqué
                    const placementId = $(this).data('id');
                    const sgisId = $(this).data('sgisid');
                    const numCompte = $(this).data('numcompte');
                    const nomPlacement = $(this).data('nomplace');
                    const periodicite = $(this).data('periodicite');
                    const tauxAnnuel = $(this).data('tauxannuel');
                    const tauxPeriode =  $(this).data('tauxperiode');
                    const typePlacement = $(this).data('typeplace');
                    const duree = $(this).data('duree');
                    const nbreTitre = $(this).data('nbretitre');
                    const valeurTitre = $(this).data('valtitre');
                    const valeurAcqTitre = $(this).data('valacqtitre');
                    const dateDebut = $(this).data('datedebut');
                    const dateFin = $(this).data('datefin');
                    const gain = $(this).data('gain');
                    
                    // Remplir les champs du modal avec les valeurs récupérées
                    $('.placement_id').val(placementId);
                    $('.typeplacement_update').val(typePlacement);
                    $('.numcompte_update').val(numCompte);
                    $('.periodicite_update').val(periodicite);
                    $('.tauxannuel_update').val(tauxAnnuel);
                    $('.tauxperiode_update').val(tauxPeriode);
                    $('.nbretitre_update').val(nbreTitre);
                    $('.vacqtitre_update').val(valeurAcqTitre);
                    $('.dureeannee_update').val(duree);
                    $('.nomplacement_update').val(nomPlacement);
                    $('.sgisid_update').val(sgisId);
                    $('.valeurtitre_update').val(valeurTitre);
                    $('.datestart_update').val(dateDebut);
                    $('.dateend_update').val(dateFin);
                    $('.gain_update').val(gain);
                });

                // Réinitialiser les champs lorsque le modal est fermé
                $('#con-close-modal-obl').on('hidden.bs.modal', function () {
                    $('.placement_id').val('');
                    $('.typeplacement_update').val('');
                    $('.numcompte_update').val('');
                    $('.periodicite_update').val('');
                    $('.tauxannuel_update').val('');
                    $('.tauxperiode_update').val('');
                    $('.nbretitre_update').val('');
                    $('.vacqtitre_update').val('');
                    $('.dureeannee_update').val('');
                    $('.nomplacement_update').val('');
                    $('.sgisid_update').val('');
                    $('.valeurtitre_update').val('');
                    $('.datestart_update').val('');
                    $('.dateend_update').val('');
                    $('.gain_update').val('');
                });
            });

            // Script qui permet d'afficher le modal et les informations concernants les ACTIONS
            $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.placement_actions_id').val('');
                    $('.typeplacement_actions_update').val('');
                    $('.numcompte_actions_update').val('');
                    $('.valeurtitre_actions_update').val('');
                    $('.nbretitre_actions_update').val('');
                    $('.vacqtitre_actions_update').val('');
                    $('.dureeannee_actions_update').val('');
                    $('.nomplacement_actions_update').val('');
                    $('.sgis_actions_id').val('');
                    $('.datestart_actions_update').val('');
                    $('.dateend_actions_update').val('');
                    $('.gain_actions_update').val('');
                    
                    // Récupérer les valeurs data-* de l'élément cliqué
                    const placementActionsId = $(this).data('id');
                    const sgisActionsId = $(this).data('sgisid');
                    const numCompteActions = $(this).data('numcompte');
                    const nomPlacementActions = $(this).data('nomplace');
                    const typePlacementActions = $(this).data('typeplace');
                    const dureeActions = $(this).data('duree');
                    const nbreTitreActions = $(this).data('nbretitre');
                    const valeurTitreActions = $(this).data('valtitre');
                    const valeurAcqTitreActions = $(this).data('valacqtitre');
                    const dateDebutActions = $(this).data('datedebut');
                    const dateFinActions = $(this).data('datefin');
                    const gainActions = $(this).data('gain');
                    
                    // Remplir les champs du modal avec les valeurs récupérées
                    $('.placement_actions_id').val(placementActionsId);
                    $('.typeplacement_actions_update').val(typePlacementActions);
                    $('.numcompte_actions_update').val(numCompteActions);
                    $('.valeurtitre_actions_update').val(valeurTitreActions);
                    $('.nbretitre_actions_update').val(nbreTitreActions);
                    $('.vacqtitre_actions_update').val(valeurAcqTitreActions);
                    $('.dureeannee_actions_update').val(dureeActions);
                    $('.nomplacement_actions_update').val(nomPlacementActions);
                    $('.sgis_actions_id').val(sgisActionsId);
                    $('.datestart_actions_update').val(dateDebutActions);
                    $('.dateend_actions_update').val(dateFinActions);
                    $('.gain_actions_update').val(gainActions);
                });

                // Réinitialiser les champs lorsque le modal est fermé
                $('#con-close-modal-act').on('hidden.bs.modal', function () {
                    $('.placement_actions_id').val('');
                    $('.typeplacement_actions_update').val('');
                    $('.numcompte_actions_update').val('');
                    $('.valeurtitre_actions_update').val('');
                    $('.nbretitre_actions_update').val('');
                    $('.vacqtitre_actions_update').val('');
                    $('.dureeannee_actions_update').val('');
                    $('.nomplacement_actions_update').val('');
                    $('.sgis_actions_id').val('');
                    $('.datestart_actions_update').val('');
                    $('.dateend_actions_update').val('');
                    $('.gain_actions_update').val('');
                });
            });
        </script>

        <script>
            // Script de la mise a jours des informations de placement OBLIGATIONS
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelector('.btn-chang').addEventListener('click', async (e) => {
                    e.preventDefault();

                    // Récupérer les données du formulaire
                    const placementId = document.querySelector('.placement_id').value;
                    const typePlacement = document.querySelector('.typeplacement_update').value;
                    const numCompte = document.querySelector('.numcompte_update').value;
                    const periodicite = document.querySelector('.periodicite_update').value;
                    const tauxAnnuel = document.querySelector('.tauxannuel_update').value;
                    const tauxPeriode = document.querySelector('.tauxperiode_update').value;
                    const nbreTitre = document.querySelector('.nbretitre_update').value;
                    const valeurTitre = document.querySelector('.valeurtitre_update').value;
                    const valeurAcqTitre = document.querySelector('.vacqtitre_update').value;
                    const duree = document.querySelector('.dureeannee_update').value;
                    const nomPlacement = document.querySelector('.nomplacement_update').value;
                    const sgisId = document.querySelector('.sgisid_update').value;
                    const dateDebut = document.querySelector('.datestart_update').value;
                    const dateFin = document.querySelector('.dateend_update').value;
                    const gain = document.querySelector('.gain_update').value;

                    // Préparer les données pour l'envoi
                    const data = {
                        _token: '{{ csrf_token() }}', // Token CSRF pour la sécurité
                        id: placementId,
                        type_placement: typePlacement,
                        num_compte: numCompte,
                        periodicite: periodicite,
                        taux_annuel: tauxAnnuel,
                        taux_periode: tauxPeriode,
                        nbre_titre: nbreTitre,
                        valeur_titre: valeurTitre,
                        valeur_acq_titre: valeurAcqTitre,
                        duree: duree,
                        nom_placement: nomPlacement,
                        sgis_id: sgisId,
                        date_debut: dateDebut,
                        date_fin: dateFin,
                        gain: gain
                    };

                    try {
                        // Envoyer la requête avec Fetch API
                        const response = await fetch('/home/liste-des-placements/modifier-obligations', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data),
                        });

                        const result = await response.json(); // Convertir la réponse en JSON

                        if (response.ok && result.success) {
                            Swal.fire({
                                title: 'Succès',
                                text: result.message,
                                type: 'success',
                                confirmButtonColor: '#4fa7f3',
                            }).then(() => {
                                location.reload(); // Recharger la page après confirmation
                            });
                        } else {
                            // Réinitialiser les messages d'erreur
                            document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

                            // Afficher les erreurs spécifiques
                            if (response.status === 422 && result.errors) {
                                Object.keys(result.errors).forEach(key => {
                                    const errorElement = document.querySelector(`.error-${key}_update`);
                                    if (errorElement) {
                                        errorElement.textContent = result.errors[key][0];
                                    }
                                });
                            }
                        }
                    } catch (error) {
                        console.error('Erreur lors de la requête :', error);
                        Swal.fire('Erreur', 'Une erreur est survenue. Veuillez réessayer.', 'error');
                    }
                });
            });

            // Script de la mise a jours des informations de placement ACTIONS
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelector('.btn-actions').addEventListener('click', async (e) => {
                    e.preventDefault();

                    // Récupérer les données du formulaire
                    const placementActionsId = document.querySelector('.placement_actions_id').value;
                    const typeActionsPlacement = document.querySelector('.typeplacement_actions_update').value;
                    const numActionsCompte = document.querySelector('.numcompte_actions_update').value;
                    const nbreActionsTitre = document.querySelector('.nbretitre_actions_update').value;
                    const valeurActionsTitre = document.querySelector('.valeurtitre_actions_update').value;
                    const valeurAcqActionsTitre = document.querySelector('.vacqtitre_actions_update').value;
                    const dureeanneeActions = document.querySelector('.dureeannee_actions_update').value;
                    const nomActionsPlacement = document.querySelector('.nomplacement_actions_update').value;
                    const sgisActionsId = document.querySelector('.sgis_actions_id').value;
                    const dateActionsDebut = document.querySelector('.datestart_actions_update').value;
                    const dateActionsFin = document.querySelector('.dateend_actions_update').value;
                    const actionsGain = document.querySelector('.gain_actions_update').value;

                    // Préparer les données pour l'envoi
                    const data = {
                        _token: '{{ csrf_token() }}', // Token CSRF pour la sécurité
                        id_actions: placementActionsId,
                        type_placement_actions: typeActionsPlacement,
                        num_compte_actions: numActionsCompte,
                        nbre_titre_actions: nbreActionsTitre,
                        valeur_titre_actions: valeurActionsTitre,
                        valeur_acq_titre_actions: valeurAcqActionsTitre,
                        duree_actions: dureeanneeActions,
                        nom_placement_actions: nomActionsPlacement,
                        sgis_id_actions: sgisActionsId,
                        date_debut_actions: dateActionsDebut,
                        date_fin_actions: dateActionsFin,
                        gain_actions: actionsGain
                    };

                    try {
                        // Envoyer la requête avec Fetch API
                        const response = await fetch('/home/liste-des-placements/modifier-actions', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data),
                        });

                        const result = await response.json(); // Convertir la réponse en JSON

                        if (response.ok && result.success) {
                            Swal.fire({
                                title: 'Succès',
                                text: result.message,
                                type: 'success',
                                confirmButtonColor: '#4fa7f3',
                            }).then(() => {
                                location.reload(); // Recharger la page après confirmation
                            });
                        } else {
                            // Réinitialiser les messages d'erreur
                            document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

                            // Afficher les erreurs spécifiques
                            if (response.status === 422 && result.errors) {
                                Object.keys(result.errors).forEach(key => {
                                    const errorElement = document.querySelector(`.error-${key}_update`);
                                    if (errorElement) {
                                        errorElement.textContent = result.errors[key][0];
                                    }
                                });
                            }
                        }
                    } catch (error) {
                        console.error('Erreur lors de la requête :', error);
                        Swal.fire('Erreur', 'Une erreur est survenue. Veuillez réessayer.', 'error');
                    }
                });
            });
        </script>

        {{-- Script permettant de calculer la durée en année --}}
        <script>
            // Script permettant de calculer la durée en année pour OBLIGATIONS
            document.addEventListener("DOMContentLoaded", function() {

                // Sélection des champs de date et de durée via leurs classes
                const dateStartInput = document.querySelector('.datestart_update');
                const dateEndInput = document.querySelector('.dateend_update');
                const dureeAnneeInput = document.querySelector('.dureeannee_update');

                // Fonction pour calculer la différence en années
                function calculateDuration() {
                    const dateStart = new Date(dateStartInput.value);
                    const dateEnd = new Date(dateEndInput.value);

                    if (dateStart && dateEnd && dateEnd >= dateStart) {
                    const startYear = dateStart.getFullYear(); // Année de début
                    const endYear = dateEnd.getFullYear();     // Année de fin
                    const duration = endYear - startYear;      // Différence en années

                    dureeAnneeInput.value = duration;          // Affecter la durée

                    } else {
                        dureeAnneeInput.value = ''; // Réinitialiser si les dates sont invalides
                    }
                }
            

                // Ajouter des écouteurs d'événements pour recalculer à chaque changement
                dateStartInput.addEventListener('change', calculateDuration);
                dateEndInput.addEventListener('change', calculateDuration);
            });

            // Script permettant de calculer la durée en année pour ACTIONS
            document.addEventListener("DOMContentLoaded", function() {

                // Sélection des champs de date et de durée via leurs classes
                const dateStartActionsInput = document.querySelector('.datestart_actions_update');
                const dateEndActionsInput = document.querySelector('.dateend_actions_update');
                const dureeAnneeActionsInput = document.querySelector('.dureeannee_actions_update');

                // Fonction pour calculer la différence en années
                function calculateDuration() {
                    const dateStartActions = new Date(dateStartActionsInput.value);
                    const dateEndActions = new Date(dateEndActionsInput.value);

                    if (dateStartActions && dateEndActions && dateEndActions >= dateStartActions) {
                    const startYear = dateStartActions.getFullYear(); // Année de début
                    const endYear = dateEndActions.getFullYear();     // Année de fin
                    const duration = endYear - startYear;      // Différence en années

                    dureeAnneeActionsInput.value = duration;          // Affecter la durée

                    } else {
                        dureeAnneeActionsInput.value = ''; // Réinitialiser si les dates sont invalides
                    }
                }

                // Ajouter des écouteurs d'événements pour recalculer à chaque changement
                dateStartActionsInput.addEventListener('change', calculateDuration);
                dateEndActionsInput.addEventListener('change', calculateDuration);
            });
        </script>

        {{-- Script permettant de calculer le gain --}}
        <script>
            // Script calculant le gain pour les OBLIGATIONS
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector('.valeurtitre_update').addEventListener('input', calculateGain);
                document.querySelector('.vacqtitre_update').addEventListener('input', calculateGain);

                function calculateGain() {
                    const valeurTitre = parseFloat(document.querySelector('.valeurtitre_update').value);
                    const valeurAcquisition = parseFloat(document.querySelector('.vacqtitre_update').value);

                    // On vérifie si les champs nécessaires ont bien des valeurs numériques
                    if (!isNaN(valeurTitre) && !isNaN(valeurAcquisition)) {
                        let gain = (valeurTitre - valeurAcquisition);
                        
                        // Condition pour afficher sans .00 si le gain est un entier
                        document.querySelector('.gain_update').value = Number.isInteger(gain) ? gain : gain.toFixed(2).replace(/\.00$/, '');
                    }
                }
            });

            // Script calculant le gain pour les ACTIONS
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector('.valeurtitre_actions_update').addEventListener('input', calculateGain);
                document.querySelector('.vacqtitre_actions_update').addEventListener('input', calculateGain);

                function calculateGain() {
                    const valeurTitreActions = parseFloat(document.querySelector('.valeurtitre_actions_update').value);
                    const valeurAcquisitionActions = parseFloat(document.querySelector('.vacqtitre_actions_update').value);

                    // On vérifie si les champs nécessaires ont bien des valeurs numériques
                    if (!isNaN(valeurTitreActions) && !isNaN(valeurAcquisitionActions)) {
                        let gainActions = (valeurTitreActions - valeurAcquisitionActions);
                        
                        // Condition pour afficher sans .00 si le gain est un entier
                        document.querySelector('.gain_actions_update').value = Number.isInteger(gainActions) ? gainActions : gainActions.toFixed(2).replace(/\.00$/, '');
                    }
                }
            });
        </script>

        {{-- Script pour la suppression d'un placement dans le tableau --}}
        <script>
           // Utilisation de la délégation d'événements sur la table avec son ID
            $('#datatable-editable').on('click', '.delete-btn', function () {

                let placementId = $(this).data('id'); // Récupérer l'ID du placement
                
                // Afficher la confirmation de suppression avec SweetAlert
                Swal.fire({
                    title: "Êtes-vous sûr ?",
                    text: "Cette action supprimera également tous les détails associés a ce placement. Vous ne pourrez pas revenir en arrière !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#4fa7f3",
                    cancelButtonColor: "#ec536c",
                    confirmButtonText: "Oui, supprimer !",
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/home/liste-des-placements/supprimer',  // Route pour la suppression
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',  // Token CSRF pour valider la requête
                                id: placementId  // ID de l'élément à supprimer
                            },
                            success: function(response) {
                                if(response.success) {
                                    Swal.fire("Supprimé!", response.message, "success").then(() => {
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

        <script>
            $(document).ready(function () {
                // Initialisation de DataTables
                $('#datatable-editable').DataTable({
                    responsive: true, // Rend le tableau responsive
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
    </body>
</html>