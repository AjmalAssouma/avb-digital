<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Détails des placements'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />

        <!-- Plugin Css-->
        <link rel="stylesheet" href="{{asset('plugins/magnific-popup/css/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" />


        <!-- Tooltipster css -->
        <link rel="stylesheet" href="{{asset('plugins/tooltipster/tooltipster.bundle.min.css')}}">

        <!-- Custom box css -->
        <link href="{{asset('plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

        <!-- App css -->
        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
        <link href="{{asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />


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
                                    <h4 class="page-title">Les détails d'un placement.</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li> 
                                             <a href="{{route('list.placement')}}"><button type="button" class="btn btn-icon waves-effect waves-light btn-success"> <span class="list-btn">Voir la liste des placements</span></button></a>
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
                                    <br>
                                    <div class="col-lg-8">
                                        <div class="accordion" id="accordion-test-2" style="background-color: #e9faef">
                                            <div class="card-detail mb-2">
                                                <div class="card-heading">
                                                    <h4 class="card-title font-14">
                                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseOne-2" aria-expanded="false" aria-controls="collapseOne-2">
                                                            <span style="font-size: 15px">Information sur le Placement :</span> <strong style="font-size: 16px">{{ $placement->nom_placement }}</strong>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne-2" class="collapse" data-parent="#accordion-test-2">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <p><strong>Numéro de compte:</strong> {{ $placement->num_compte }}</p>
                                                                <p><strong>Type de placement:</strong> {{ $placement->type_placement }}</p>
                                                                <p><strong>SGI:</strong> {{ $placement->sgi->code_sgi . ' (' . $placement->sgi->num_compte_prod_finan . ')' }}</p>
                                                                <p><strong>Durée:</strong> {{ $placement->duree }} ans</p>
                                                                <p><strong>Nombre de titre:</strong> {{ $placement->nbre_titre }}</p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><strong>Valeur du titre:</strong> {{ $placement->valeur_titre }}</p>
                                                                <p><strong>Valeur d'acquisition du titre:</strong> {{ $placement->valeur_acq_titre }}</p>
                                                                <p><strong>Date de début du placement:</strong> {{ \Carbon\Carbon::parse($placement->date_debut)->format('d/m/Y') }}</p>
                                                                <p><strong>Date de fin du placement:</strong> {{ \Carbon\Carbon::parse($placement->date_fin)->format('d/m/Y') }}</p>
                                                                <p><strong>Gain:</strong> {{ $placement->gain }}</p>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn waves-effect waves-light btn-rens"
                                        data-toggle="modal" data-target="#full-width-modal">
                                            Renseigner les détails de ce placement.
                                        </button>
                                    </div>

                                    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-full">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title mt-0" id="full-width-modalLabel"><strong style="font-size: 20px">{{ $placement->nom_placement }}</strong></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="annee_excercie">Année d'excercice <span class="text-danger">*</span> </label>
                                                                <input type="text" id="annee_excercie" class="form-control annee_excercie" name="annee_excercie" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="date_dernier_paie">Date de dernier paiement <span class="text-danger">*</span> </label>
                                                                <input type="date" id="date_dernier_paie" class="form-control date_dernier_paie" name="date_dernier_paie" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="date_arret">Date d'arrêt <span class="text-danger">*</span> </label>
                                                                <input type="date" id="date_arret" class="form-control date_arret" name="date_arret" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nbre_jrs_icne">Nombre de jours d'ICNE <span class="text-danger">*</span> </label>
                                                                <input type="text" id="nbre_jrs_icne" class="form-control nbre_jrs_icne" name="nbre_jrs_icne" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                           

                                                            <div class="form-group">
                                                                <label for="ecart_paiement">Écart de paiement <span class="text-danger">*</span> </label>
                                                                <input type="text" id="ecart_paiement" class="form-control ecart_paiement" name="ecart_paiement" required>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div> 

                                                        <div class="col-lg-3">

                                                            <div class="form-group">
                                                                <label for="solde_31/12">Solde au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="solde_31/12" class="form-control solde_31/12" name="solde_31/12" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="acquisition">Acquisition <span class="text-danger">*</span> </label>
                                                                <input type="text" id="acquisition" class="form-control acquisition" name="acquisition" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="remboursement">Remboursement <span class="text-danger">*</span> </label>
                                                                <input type="text" id="remboursement" class="form-control remboursement" name="remboursement" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="ecart_compta">Écart comptabilisé <span class="text-danger">*</span> </label>
                                                                <input type="text" id="ecart_compta" class="form-control ecart_compta" name="ecart_compta" required>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="solde_compta">Solde comptable <span class="text-danger">*</span> </label>
                                                                <input type="text" id="solde_compta" class="form-control solde_compta" name="solde_compta" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="ecart">Écart <span class="text-danger">*</span> </label>
                                                                <input type="text" id="ecart" class="form-control ecart" name="ecart" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="provision">Provision au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="provision" class="form-control provision" name="provision" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="ext_icne">Ext d'ICNE au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="ext_icne" class="form-control ext_icne" name="ext_icne" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="interet_recus">Intérêts reçus au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="interet_recus" class="form-control interet_recus" name="interet_recus" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="icne_compta">ICNE comptable au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="icne_compta" class="form-control icne_compta" name="icne_compta" required>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="interet_recus">Intérêts reçus au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="interet_recus" class="form-control interet_recus" name="interet_recus" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="icne">Intérêts Courus Non Echus au 31/12 <span class="text-danger">*</span> </label>
                                                                <input type="text" id="icne" class="form-control icne" name="icne" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="interet_controle">Intérêts contrôlés <span class="text-danger">*</span> </label>
                                                                <input type="text" id="interet_controle" class="form-control interet_controle" name="interet_controle" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="interet_compta">Intérêts comptable <span class="text-danger">*</span> </label>
                                                                <input type="text" id="interet_compta" class="form-control interet_compta" name="interet_compta" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="interet_attendu">Intérêts attendus <span class="text-danger">*</span> </label>
                                                                <input type="text" id="interet_attendu" class="form-control interet_attendu" name="interet_attendu" required>
                                                                <span class="text-danger"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="ecart_icne">Écart ICNE<span class="text-danger">*</span> </label>
                                                                <input type="text" id="ecart_icne" class="form-control ecart_icne" name="ecart_icne" required>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

									<div class="card-body" style="margin: 0 auto; width: 95%;">
                                        {{-- <div>
                                            <form>
                                                <div class="form-group d-flex align-items-center">
                                                    <select class="form-control select2 det " name="" id="" required style="width: 50%">
                                                        <option value="" class="opt">Sélectionnez un placement et cliquez sur générer</option>
                                                        @foreach ($placements as $placement)
                                                        <option value="{{$placement->id}}"> {{$placement->nom_placement}} ({{ $placement->num_compte }}) </option>                                                                          
                                                        @endforeach
                                                    </select>
                                                    <button type="button" class="btn btn-success btn-bordered waves-effect w-md waves-light" style="margin-left: 2%">Générer</button>
                                                </div>
                                            </form>
                                        </div> --}}

                                        <table class="table table-striped add-edit-table table-bordered dt-responsive" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead >
												<tr>
                                                    <th>Placement</th>
                                                    <th>Année d'excercice</th>
                                                    <th>Date de dernier paiement</th>
                                                    <th>Date d'arrêt </th>
                                                    <th>Nombre de jours d'ICNE</th>
                                                    <th>Périodicité</th>
                                                    <th>Taux Annuel</th>
                                                    <th>Taux Période</th>
                                                    <th>Solde au 31/12</th>
                                                    <th>Acquisition</th>
                                                    <th>Remboursement</th>
                                                    <th>Solde Comptable</th>
                                                    <th>Ecart</th>
                                                    <th>Provision au 31/12</th>
                                                    <th>Ext d'ICNE au 31/12</th>
                                                    <th>Intérêts reçus au 31/12</th>
                                                    <th>ICNE au 31/12</th>
                                                    <th>Intérêts contrôlés au 31/12</th>
                                                    <th>Intérêts comptables</th>
                                                    <th>Intérêts attendus</th>
                                                    <th>Ecarts de paiement</th>
                                                    <th>Ecarts comptabilisés</th>
                                                    <th>ICNE comptable au 31/12</th>
                                                    <th>Ecarts ICNE</th>
                                                    <th>Actions</th>
												</tr>
											</thead>
											<tbody>
                                                <tr>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                    <td>ddzdfzzzz</td>
                                                </tr>
											</tbody>
										</table>
									</div>
								</div>
                            </div>

                            <!-- Modal Start -->
                            {{-- <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <form  method="POST">
                                    @csrf
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title mt-0">Modification du placement</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
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
                                                            placeholder="Nombre d'année que couvre le placement" pattern="\d+" required>
                                                            <span class="text-danger error-duree_update"></span>
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
                                                            <label for="gain_update">Gain total du produit financier <span class="text-danger">*</span> </label>
                                                            <input type="text" id="gain_update" class="form-control gain_update" name="gain_update" 
                                                            placeholder="(Valeur du titre - Valeur d'acquisition du titre) * Durée" data-parsley-type="number" pattern="\d+" readonly required>
                                                            <span class="text-danger error-gain_update"></span>
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
                            </div> --}}
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


        <!-- Sweet-Alert  -->
        <script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('assetss/pages/jquery.sweet-alert.init.js')}}"></script>

		<!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

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
        {{-- <script>
            $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.placement_id').val('');
                    $('.typeplacement_update').val('');
                    $('.numcompte_update').val('');
                    $('.nbretitre_update').val('');
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
                $('#con-close-modal').on('hidden.bs.modal', function () {
                    $('.placement_id').val('');
                    $('.typeplacement_update').val('');
                    $('.numcompte_update').val('');
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

            $(document).ready(function () {
                $('.btn-chang').on('click', function (e) {
                    e.preventDefault();

                    // Récupérer les données du formulaire
                    const placementId = $('.placement_id').val();
                    const typePlacement = $('.typeplacement_update').val();
                    const numCompte = $('.numcompte_update').val();
                    const nbreTitre = $('.nbretitre_update').val();
                    const valeurTitre = $('.valeurtitre_update').val();
                    const valeurAcqTitre = $('.vacqtitre_update').val();
                    const duree = $('.dureeannee_update').val();
                    const nomPlacement = $('.nomplacement_update').val();
                    const sgisId = $('.sgisid_update').val();
                    const dateDebut = $('.datestart_update').val();
                    const dateFin = $('.dateend_update').val();
                    const gain = $('.gain_update').val();

                    // Envoyer la requête AJAX pour mettre à jour les informations du placement
                    $.ajax({
                        url: '/home/liste-des-placements/modifier', // URL vers la méthode du contrôleur
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // Token CSRF pour la sécurité
                            id: placementId,
                            type_placement: typePlacement,
                            num_compte: numCompte,
                            nbre_titre: nbreTitre,
                            valeur_titre: valeurTitre,
                            valeur_acq_titre: valeurAcqTitre,
                            duree: duree,
                            nom_placement: nomPlacement,
                            sgis_id: sgisId,
                            date_debut: dateDebut,
                            date_fin: dateFin,
                            gain: gain
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                title: 'Succès',
                                text: response.message,
                                type: 'success',
                                confirmButtonColor: '#4fa7f3'
                                }).then(() => {
                                    location.reload(); // Recharger la page après confirmation
                                });
                            } else {
                                Swal.fire("Erreur", response.message, "error");
                            }  
                        },
                        error: function(xhr) {
                            // Réinitialiser les messages d'erreur
                            $('.text-danger').text('');
                            
                            // Afficher les messages d'erreur en fonction des champs
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                Object.keys(xhr.responseJSON.errors).forEach(function(key) {
                                    $('.error-' + key + '_update').text(xhr.responseJSON.errors[key][0]);
                                });
                            }else {
                                Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                            }
                        }
                    });
                });
            });

        </script> --}}

        {{-- Script pour la suppression d'une SGI dans le tableau --}}
        {{-- <script>
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

        </script> --}}
    
    </body>
</html>