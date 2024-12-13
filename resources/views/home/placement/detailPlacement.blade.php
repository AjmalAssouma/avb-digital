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

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">

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
                                    <div class="col-lg-11">
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
                                                            <div class="col-lg-4">
                                                                <p><strong>Type de placement: </strong> {{ $placement->type_placement }}</p>
                                                                <p><strong>SGI: </strong> {{ $placement->sgi->code_sgi . ' (' . $placement->sgi->num_compte_prod_finan . ')' }}</p>
                                                                <p>
                                                                    @if ($placement->type_placement !== 'ACTIONS')
                                                                        <strong>Taux annuel: </strong> {{ $placement->taux_annuel . '%' }}
                                                                    @endif
                                                                </p>
                                                                <p><strong>Nombre de titre: </strong> {{ $placement->nbre_titre }}</p>
                                                                <p><strong>Valeur d'acquisition du titre: </strong> {{ $placement->valeur_acq_titre }}</p>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <p><strong>Numéro de compte: </strong> {{ $placement->num_compte }}</p>
                                                                <p>
                                                                    @if ($placement->type_placement !== 'ACTIONS')
                                                                        <strong>Périodicté:</strong> {{ $placement->periodicite  }}
                                                                    @endif
                                                                </p>
                                                                <p>
                                                                    @if ($placement->type_placement !== 'ACTIONS')
                                                                        <strong>Taux période:</strong> {{ $placement->taux_periode . '%' }}
                                                                    @endif
                                                                </p>
                                                                <p><strong>Valeur du titre: </strong> {{ $placement->valeur_titre }}</p>
                                                                <p><strong>Durée: </strong> {{ $placement->duree }} ans</p>
                                                                
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <p><strong>Date de début du placement: </strong> {{ \Carbon\Carbon::parse($placement->date_debut)->format('d/m/Y') }}</p>
                                                                <p><strong>Date de fin du placement: </strong> {{ \Carbon\Carbon::parse($placement->date_fin)->format('d/m/Y') }}</p>
                                                                <p><strong>Gain: </strong> {{ $placement->gain }}</p>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   

									<div class="card-body" style="margin: 0 auto; width: 95%;">
                                        <table class="table table-striped add-edit-table table-bordered dt-responsive" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead >
												<tr>
                                                    <th>Placement</th>
                                                    <th>Année d'exercice</th>
                                                    @if ($details->contains(fn($detail) => $detail->placement->type_placement !== 'ACTIONS'))
                                                        <th>Date de dernier paiement</th>
                                                        <th>Date d'arrêt </th>
                                                        <th>Nombre de jours d'ICNE</th>
                                                    @endif
                                                    <th>Solde au 31/12/année antérieure</th>
                                                    <th>Acquisition</th>
                                                    <th>Remboursement</th>
                                                    <th>Solde au 31/12/année exercice</th>
                                                    <th>Solde Comptable</th>
                                                    <th>Ecart</th>
                                                    <th>Provision au 31/12/année exercice</th>
                                                    <th>Ext d'ICNE au 31/12/année antérieure</th>
                                                    <th>Intérêts reçus au 31/12/année exercice</th>
                                                    <th>ICNE au 31/12/année exercice</th>
                                                    <th>Intérêts contrôlés</th>
                                                    <th>Intérêts comptables</th>
                                                    <th>Intérêts attendus</th>
                                                    <th>Ecarts de paiement</th>
                                                    <th>Ecarts comptabilisés</th>
                                                    <th>ICNE comptable au 31/12/année exercice</th>
                                                    <th>Ecarts ICNE</th>
                                                    @if ($details->contains(fn($detail) => $detail->placement->type_placement === 'ACTIONS'))
                                                        <th>Dividende</th>
                                                        <th>Rendements</th>
                                                    @endif
                                                    <th hidden>ID</th>
                                                    <th hidden>Nombre de titre</th>
                                                    <th hidden>Valeur de titre</th>
                                                    <th hidden>Périodicité</th>
                                                    <th hidden>Taux Annuel</th>
                                                    <th hidden>Taux Période</th>
                                                    <th hidden>Placement ID</th>
                                                    <th>Actions</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($details as $detail)
                                                    <tr>
                                                        <td> {{$detail->placement->nom_placement}} </td>
                                                        <td> {{$detail->annee_exercice}} </td>
                                                        @if ($detail->placement->type_placement !== 'ACTIONS')
                                                            <td> {{ \Carbon\Carbon::parse($detail->date_dernier_paiement)->format('d/m/Y')}} </td>
                                                            <td> {{ \Carbon\Carbon::parse($detail->date_arret)->format('d/m/Y')}} </td>
                                                            <td> {{$detail->nbre_jrs_icne}} </td>
                                                        @endif
                                                        <td> {{$detail->solde_31_12_n_1}}</td>
                                                        <td> {{$detail->acquisition}} </td>
                                                        <td> {{$detail->remboursement}} </td>
                                                        <td> {{$detail->solde_31_12_n}} </td>
                                                        <td> {{$detail->solde_comptable}} </td>
                                                        <td> {{$detail->ecart}} </td>
                                                        <td> {{$detail->provision_31_12_n}} </td>
                                                        <td> {{$detail->ext_icne_31_12_n_1}} </td>
                                                        <td> {{$detail->interet_recu_31_12_n}} </td>
                                                        <td> {{$detail->icne_31_12_n}} </td>
                                                        <td> {{$detail->interet_controle}} </td>
                                                        <td> {{$detail->interet_comptable}} </td>
                                                        <td> {{$detail->interet_attendu}} </td>
                                                        <td> {{$detail->ecart_paiement}} </td>
                                                        <td> {{$detail->ecart_comptabilise}} </td>
                                                        <td> {{$detail->icne_comptable_31_12_n}} </td>
                                                        <td> {{$detail->ecart_icne}} </td>
                                                        @if ($detail->placement->type_placement === 'ACTIONS')
                                                            <td> {{$detail->dividende}} </td>
                                                            <td> {{$detail->rendement}} </td>
                                                        @endif
                                                        <td hidden> {{$detail->id}} </td>
                                                        <td hidden> {{$detail->placement->nbre_titre}} </td>
                                                        <td hidden> {{$detail->placement->valeur_titre}} </td>
                                                        <td hidden> {{$detail->placement->periodicite}} </td>
                                                        <td hidden> {{$detail->placement->taux_annuel}} </td>
                                                        <td hidden> {{$detail->placement->taux_periode}} </td>
                                                        <td hidden> {{$detail->placements_id}} </td>
                                                        <td class="actions">
                                                            @php
                                                                $modalTarget = match($detail->placement->type_placement) {
                                                                    'OBLIGATIONS' => '#full-width-modal-obl',
                                                                    'ACTIONS' => '#full-width-modal-act',
                                                                    'DAT' => '#full-width-modal-dat',
                                                                    'FCP' => '#full-width-modal-fcp',
                                                                    default => '#default-modal',
                                                                };
                                                            @endphp

                                                            <button type="button" style="display: inline-block;" 
                                                            class="btn btn-modif waves-effect waves-light edit-btn"
                                                            data-toggle="modal"
                                                            data-target="{{ $modalTarget }}"
                                                            data-id="{{$detail->id}}"
                                                            data-annee="{{$detail->annee_exercice}}"
                                                            data-datedernierpaie="{{$detail->date_dernier_paiement}}"
                                                            data-datearret="{{$detail->date_arret}}"
                                                            data-nbrejrsicne="{{$detail->nbre_jrs_icne}}"
                                                            data-solde3112n1="{{$detail->solde_31_12_n_1}}"
                                                            data-acquisition="{{$detail->acquisition}}"
                                                            data-remboursement="{{$detail->remboursement}}"
                                                            data-solde3112n="{{$detail->solde_31_12_n}}"
                                                            data-soldecomptable="{{$detail->solde_comptable}}"
                                                            data-ecart="{{$detail->ecart}}"
                                                            data-provision="{{$detail->provision_31_12_n}}"
                                                            data-exticne="{{$detail->ext_icne_31_12_n_1}}"
                                                            data-interetrecu="{{$detail->interet_recu_31_12_n}}"
                                                            data-icne3112n="{{$detail->icne_31_12_n}}"
                                                            data-interetcontrole="{{$detail->interet_controle}}"
                                                            data-interetcomptable="{{$detail->interet_comptable}}"
                                                            data-interetattendu="{{$detail->interet_attendu}}"
                                                            data-ecartpaiement="{{$detail->ecart_paiement}}"
                                                            data-ecartcompta="{{$detail->ecart_comptabilise}}"
                                                            data-icnecompta3112n="{{$detail->icne_comptable_31_12_n}}"
                                                            data-ecarticne="{{$detail->ecart_icne}}"
                                                            data-nbretitre ="{{$detail->placement->nbre_titre}}"
                                                            data-valeurtitre = "{{$detail->placement->valeur_titre}}"
                                                            data-periodicite="{{$detail->placement->periodicite}}"
                                                            data-tauxannuel="{{$detail->placement->taux_annuel}}"
                                                            data-tauxperiode="{{$detail->placement->taux_periode}}"
                                                            data-placementid="{{$detail->placements_id}}"
                                                            data-divid="{{$detail->dividende}}"
                                                            data-rendem="{{$detail->rendement}}"
                                                            >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                            <button type="button" style="display: inline-block;" 
                                                            class="btn btn-del waves-effect waves-light delete-btn"
                                                            data-detailid="{{$detail->id}}"
                                                            data-placeid="{{ Crypt::encrypt($placement->id) }}">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button> 
                                                        </td>
                                                        
                                                    </tr>
                                                @endforeach
											</tbody>
										</table>

                                        {{-- Modal Start OBLIGATIONS --}}
                                            <div id="full-width-modal-obl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title mt-0" id="full-width-modalLabel"><strong style="font-size: 20px">{{ $placement->nom_placement }}</strong></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    {{-- 1ère Colonne  --}}
                                                                    <div class="col-lg-3">

                                                                        <input type="hidden" id="id_detail" class="form-control id_detail" name="id_detail"  readonly required>
                                                                        <input type="hidden" id="placement_id" class="form-control placement_id" name="placement_id"  readonly required>
                                                                    
                                                                        <div class="form-group">
                                                                            <label for="annee_exercice">Année d'excercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="annee_exercice" class="form-control annee_exercice" name="annee_exercice" readonly required>
                                                                            <span class="text-danger error-annee_exercice"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="solde_31_12_n1" id="solden1_label">Solde au 31/12/année antérieure <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="solde_31_12_n1" class="form-control solde_31_12_n1" name="solde_31_12_n1" required>
                                                                            <span class="text-danger error-solde_31_12_n_1"></span>
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
                                                                            <label for="solde_compta">Solde comptable <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="solde_compta" class="form-control solde_compta" name="solde_compta" required>
                                                                            <span class="text-danger error-solde_compta"></span>
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
                                                                            <label for="interet_recus" id="interetrecus_label">Intérêts reçus au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_recus" class="form-control interet_recus" name="interet_recus" required>
                                                                            <span class="text-danger error-interet_recu_31_12_n"></span>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="interet_attendu">Intérêts attendus <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_attendu" class="form-control interet_attendu" name="interet_attendu" readonly required>
                                                                            <span class="text-danger error-interet_attendu"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="ecart_icne">Écart ICNE<span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_icne" class="form-control ecart_icne" name="ecart_icne" readonly required>
                                                                            <span class="text-danger error-ecart_icne"></span>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">  
                                                                            <label for="tauxannuel">Taux annuel <span class="text-danger">*</span></label>  
                                                                            <div class="input-group">  
                                                                                <input type="text" id="tauxannuel" class="form-control tauxannuel" name="tauxannuel" required readonly>  
                                                                                <div class="input-group-append">  
                                                                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                                </div>
                                                                                <span class="text-danger"></span>
                                                                            </div>    
                                                                        </div>  
                                                                    </div> 

                                                                    {{-- 2ème Colonne  --}}
                                                                    <div class="col-lg-3">
            
                                                                        <div class="form-group">
                                                                            <label for="date_dernier_paie">Date de dernier paiement <span class="text-danger">*</span> </label>
                                                                            <input type="date" id="date_dernier_paie" class="form-control date_dernier_paie" name="date_dernier_paie" required>
                                                                            <span class="text-danger error-date_dernier_paiement"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="acquisition" id="acquis_label">Acquisition <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="acquisition" class="form-control acquisition" name="acquisition" required>
                                                                            <span class="text-danger error-acquisition"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="ecart">Écart <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart" class="form-control ecart" name="ecart" readonly required>
                                                                            <span class="text-danger error-ecart"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="icne" id="icne_label">ICNE au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="icne" class="form-control icne" name="icne" readonly required>
                                                                            <span class="text-danger error-icne_31_12_n"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="ecart_paiement">Écart de paiement <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_paiement" class="form-control ecart_paiement" name="ecart_paiement" readonly required>
                                                                            <span class="text-danger error-ecart_paiement"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="nbretitre">Nombre de titre <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control nbretitre" name="nbretitre" id="nbretitre" readonly required>
                                                                            <span class="text-danger"></span>
                                                                        </div>

                                                                        <div class="form-group">  
                                                                            <label for="tauxperiode">Taux période <span class="text-danger">*</span></label>  
                                                                            <div class="input-group">  
                                                                                <input type="text" id="tauxperiode" class="form-control tauxperiode" name="tauxperiode" required readonly>  
                                                                                <div class="input-group-append">  
                                                                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                                </div>
                                                                                <span class="text-danger"></span>
                                                                            </div>    
                                                                        </div>  
            
                                                                    </div>

                                                                    {{-- 3ème Colonne  --}}
                                                                    <div class="col-lg-3">
            
                                                                        <div class="form-group">
                                                                            <label for="date_arret">Date d'arrêt <span class="text-danger">*</span> </label>
                                                                            <input type="date" id="date_arret" class="form-control date_arret" name="date_arret" readonly required>
                                                                            <span class="text-danger error-date_arret"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="remboursement" id="remb_label">Remboursement <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="remboursement" class="form-control remboursement" name="remboursement" required>
                                                                            <span class="text-danger error-remboursement"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="provision" id="provis_label">Provision au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="provision" class="form-control provision" name="provision" readonly required>
                                                                            <span class="text-danger error-provision_31_12_n"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="interet_controle">Intérêts contrôlés <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_controle" class="form-control interet_controle" name="interet_controle" readonly required>
                                                                            <span class="text-danger error-interet_controle"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="ecart_compta">Écart comptabilisé <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_compta" class="form-control ecart_compta" name="ecart_compta" readonly required>
                                                                            <span class="text-danger error-ecart_comptabilise"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="valeurtitre">Valeur du titre <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control valeurtitre" name="valeurtitre" id="valeurtitre" readonly required />
                                                                            <span class="text-danger "></span>
                                                                        </div>

                                                                    </div>

                                                                    {{-- 4ème Colonne  --}}
                                                                    <div class="col-lg-3">
            
                                                                        <div class="form-group">
                                                                            <label for="nbre_jrs_icne">Nombre de jours d'ICNE <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="nbre_jrs_icne" class="form-control nbre_jrs_icne" name="nbre_jrs_icne" readonly required>
                                                                            <span class="text-danger error-nbre_jrs_icne"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="solde_31_12_n" id="solden_label">Solde au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="solde_31_12_n" class="form-control solde_31_12_n" name="solde_31_12_n" readonly required>
                                                                            <span class="text-danger error-solde_31_12_n"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="ext_icne" id="exticne_label">Ext d'ICNE au 31/12/année antérieure <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ext_icne" class="form-control ext_icne" name="ext_icne" required>
                                                                            <span class="text-danger error-ext_icne_31_12_n_1"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="interet_compta">Intérêts comptable <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_compta" class="form-control interet_compta" name="interet_compta" required>
                                                                            <span class="text-danger error-interet_comptable"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="icne_compta" id="icnecompta_label">ICNE comptable au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="icne_compta" class="form-control icne_compta" name="icne_compta" required>
                                                                            <span class="text-danger error-icne_comptable_31_12_n"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="periodicite">Périodicité <span class="text-danger">*</span> </label>
                                                                            <input type="text"  class="form-control periodicite" name="periodicite" id="periodicite"  readonly required>
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                        
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect " data-dismiss="modal">Fermer</button>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light apply-changes-btn" data-idplace="{{ Crypt::encrypt($placement->id) }}">Appliquer les changements</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div>
                                            </div>
                                        {{-- Modal End OBLIGATIONS --}}


                                        {{-- Modal Start ACTIONS --}}
                                            <div id="full-width-modal-act" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title mt-0" id="full-width-modalLabel"><strong style="font-size: 20px">{{ $placement->nom_placement }}</strong></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    {{-- 1ère Colonne  --}}
                                                                    <div class="col-lg-3">

                                                                        <input type="hidden" id="detail_actions_id" class="form-control detail_actions_id" name="detail_actions_id" readonly required>
                                                                        <input type="hidden" id="placement_actions_id" class="form-control placement_actions_id" name="placement_actions_id" readonly required>
                                                                    
                                                                        <div class="form-group">
                                                                            <label for="annee_exercice_actions">Année d'excercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="annee_exercice_actions" class="form-control annee_exercice_actions" name="annee_exercice_actions" readonly required>
                                                                            <span class="text-danger error-actions_annee_exercice"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="solde_31_12_n_actions" id="solden_actions_label">Solde au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="solde_31_12_n_actions" class="form-control solde_31_12_n_actions" name="solde_31_12_n_actions" readonly required>
                                                                            <span class="text-danger error-actions_solde_31_12_n"></span>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="dividende">Dividende <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="dividende" class="form-control dividende" name="dividende" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_dividende"></span>
                                                                        </div>
                                                                        
                                                                    
                                                                        <div class="form-group">
                                                                            <label for="interet_actions_recus" id="interetrecus_actions_label">Intérêts reçus au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_actions_recus" class="form-control interet_actions_recus" name="interet_actions_recus" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_interet_recu_31_12_n"></span>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="interet_actions_attendu">Intérêts attendus <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_actions_attendu" class="form-control interet_actions_attendu" name="interet_actions_attendu" readonly required>
                                                                            <span class="text-danger error-actions_interet_attendu"></span>
                                                                        </div>

                                                                        

                                                                        <div class="form-group">
                                                                            <label for="nbretitre_actions">Nombre de titre <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control nbretitre_actions" name="nbretitre_actions" id="nbretitre_actions" readonly required>
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                        
                                                                    </div> 

                                                                    {{-- 2ème Colonne  --}}
                                                                    <div class="col-lg-3">
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="solde_actions_31_12_n1" id="solden1_actions_label">Solde au 31/12/année antérieure <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="solde_actions_31_12_n1" class="form-control solde_actions_31_12_n1" name="solde_actions_31_12_n1" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_solde_31_12_n_1"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="solde_actions_compta">Solde comptable <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="solde_actions_compta" class="form-control solde_actions_compta" name="solde_actions_compta" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_solde_comptable"></span>
                                                                        </div>
            
                                                                        <div class="form-group">  
                                                                            <label for="rendement">Rendement <span class="text-danger">*</span></label>  
                                                                            <div class="input-group">  
                                                                                <input type="text" id="rendement" class="form-control rendement" name="rendement" required readonly>  
                                                                                <div class="input-group-append">  
                                                                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                                </div>
                                                                                <span class="text-danger error-actions_rendement"></span>
                                                                            </div>    
                                                                        </div>  
            
                                                                        <div class="form-group">
                                                                            <label for="icne_actions" id="icne_actions_label">ICNE au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="icne_actions" class="form-control icne_actions" name="icne_actions" required>
                                                                            <span class="text-danger error-actions_icne_31_12_n"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="ecart_actions_paiement">Écart de paiement <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_actions_paiement" class="form-control ecart_actions_paiement" name="ecart_actions_paiement" readonly required>
                                                                            <span class="text-danger error-actions_ecart_paiement"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="valeurtitre_actions">Valeur du titre <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control valeurtitre_actions" name="valeurtitre_actions" id="valeurtitre_actions" readonly required />
                                                                            <span class="text-danger"></span>
                                                                        </div>

                                                                    </div>

                                                                    {{-- 3ème Colonne  --}}
                                                                    <div class="col-lg-3">
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="acquisition_actions" id="acquis_actions_label">Acquisition <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="acquisition_actions" class="form-control acquisition_actions" name="acquisition_actions" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_acquisition"></span>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="ecart_actions">Écart <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_actions" class="form-control ecart_actions" name="ecart_actions" readonly required>
                                                                            <span class="text-danger error-actions_ecart"></span>
                                                                        </div>

                                                                        
            
                                                                        <div class="form-group">
                                                                            <label for="interet_actions_controle">Intérêts contrôlés <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_actions_controle" class="form-control interet_actions_controle" name="interet_actions_controle" readonly required>
                                                                            <span class="text-danger error-actions_interet_controle"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="ecart_actions_compta">Écart comptabilisé <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_actions_compta" class="form-control ecart_actions_compta" name="ecart_actions_compta" readonly required>
                                                                            <span class="text-danger error-actions_ecart_comptabilise"></span>
                                                                        </div>

                                                                       

                                                                        <div class="form-group">
                                                                            <label for="ecart_actions_icne">Écart ICNE<span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ecart_actions_icne" class="form-control ecart_actions_icne" name="ecart_actions_icne" readonly required>
                                                                            <span class="text-danger error-actions_ecart_icne"></span>
                                                                        </div>

                                                                    </div>

                                                                    {{-- 4ème Colonne  --}}
                                                                    <div class="col-lg-3">

                                                                        <div class="form-group">
                                                                            <label for="remboursement_actions" id="remb_actions_label">Remboursement <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="remboursement_actions" class="form-control remboursement_actions" name="remboursement_actions" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_remboursement"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="provision_actions" id="provis_actions_label">Provision au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="provision_actions" class="form-control provision_actions" name="provision_actions" readonly required>
                                                                            <span class="text-danger error-actions_provision_31_12_n"></span>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="ext_actions_icne" id="exticne_actions_label">Ext d'ICNE au 31/12/année antérieure <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="ext_actions_icne" class="form-control ext_actions_icne" name="ext_actions_icne" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_ext_icne_31_12_n_1"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="interet_actions_compta">Intérêts comptable <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="interet_actions_compta" class="form-control interet_actions_compta" name="interet_actions_compta" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_interet_comptable"></span>
                                                                        </div>
            
                                                                        <div class="form-group">
                                                                            <label for="icne_actions_compta" id="icnecompta_actions_label">ICNE comptable au 31/12/année exercice <span class="text-danger">*</span> </label>
                                                                            <input type="text" id="icne_actions_compta" class="form-control icne_actions_compta" name="icne_actions_compta" data-parsley-type="number" pattern="\d+" required>
                                                                            <span class="text-danger error-actions_icne_comptable_31_12_n"></span>
                                                                        </div>

                                                                    </div>
                                                                        
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect " data-dismiss="modal">Fermer</button>
                                                                <button type="button" class="btn btn-primary waves-effect waves-light apply-btn-actions" data-idactionsplace="{{ Crypt::encrypt($placement->id) }}">Appliquer les changements</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div>
                                            </div>
                                        {{-- Modal End ACTIONS --}}
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

        {{-- Script qui permet d'afficher le modal et de remplir le modal des informations --}}
        <script>
            // Script qui permet d'afficher le modal et de remplir le modal des informations de OBLIGATIONS
            $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.id_detail').val('');
                    $('.annee_exercice').val('');
                    $('.solde_31_12_n1').val('');
                    $('.solde_compta').val('');
                    $('.interet_recus').val('');
                    $('.interet_attendu').val('');
                    $('.ecart_icne').val('');
                    $('.date_dernier_paie').val('');
                    $('.acquisition').val('');
                    $('.ecart').val('');
                    $('.icne').val('');
                    $('.ecart_paiement').val('');
                    $('.date_arret').val('');
                    $('.remboursement').val('');
                    $('.provision').val('');
                    $('.interet_controle').val('');
                    $('.ecart_compta').val('');
                    $('.nbre_jrs_icne').val('');
                    $('.solde_31_12_n').val('');
                    $('.ext_icne').val('');
                    $('.interet_compta').val('');
                    $('.icne_compta').val('');
                    $('.nbretitre').val('');
                    $('.valeurtitre').val('');
                    $('.periodicite').val('');
                    $('.tauxannuel').val('');
                    $('.tauxperiode').val('');
                    $('.placement_id').val('');


                    // Récupérer les valeurs data-* de l'élément cliqué
                    const detailId = $(this).data('id');
                    const anneeExercice = $(this).data('annee');
                    const dateDernierPaiement = $(this).data('datedernierpaie');
                    const dateArret = $(this).data('datearret');
                    const nbreJrsIcne = $(this).data('nbrejrsicne');
                    const solde3112n1 = $(this).data('solde3112n1');
                    const acquisition = $(this).data('acquisition');
                    const remboursement = $(this).data('remboursement');
                    const solde3112n = $(this).data('solde3112n');
                    const soldeComptable = $(this).data('soldecomptable');
                    const ecart = $(this).data('ecart');
                    const provision = $(this).data('provision');
                    const extIcne = $(this).data('exticne');
                    const interetRecu = $(this).data('interetrecu');
                    const icne3112n = $(this).data('icne3112n');
                    const interetControle = $(this).data('interetcontrole');
                    const interetComptable = $(this).data('interetcomptable');
                    const interetAttendu = $(this).data('interetattendu');
                    const ecartPaiement = $(this).data('ecartpaiement');
                    const ecartCompta = $(this).data('ecartcompta');
                    const icneCompta3112n = $(this).data('icnecompta3112n');
                    const ecartIcne = $(this).data('ecarticne');
                    const nbreTitre = $(this).data('nbretitre');
                    const valeurTitre = $(this).data('valeurtitre');
                    const periodicite = $(this).data('periodicite');
                    const tauxAnnuel = $(this).data('tauxannuel');
                    const tauxPeriode = $(this).data('tauxperiode');
                    const placementID = $(this).data('placementid');

                    // Met à jour le label avec la valeur de anneeExercice  
                    $('#solden1_label').text(`Solde au 31/12/${anneeExercice-1}`);  
                    $('#solden_label').text(`Solde au 31/12/${anneeExercice}`);  
                    $('#acquis_label').text(`Acquisition ${anneeExercice}`);  
                    $('#remb_label').text(`Remboursement ${anneeExercice}`);  
                    $('#provis_label').text(`Provision au 31/12/${anneeExercice}`);  
                    $('#exticne_label').text(`Ext d'ICNE au 31/12/${anneeExercice-1}`);  
                    $('#interetrecus_label').text(`Intérêts reçus au 31/12/${anneeExercice}`);
                    $('#icne_label').text(`ICNE au 31/12/${anneeExercice}`);
                    $('#icnecompta_label').text(`ICNE comptable au 31/12/${anneeExercice}`);

                    
                    // Remplir les champs du modal avec les valeurs récupérées
                    $('.id_detail').val(detailId);
                    $('.annee_exercice').val(anneeExercice);
                    $('.solde_31_12_n1').val(solde3112n1);
                    $('.solde_compta').val(soldeComptable);
                    $('.interet_recus').val(interetRecu);
                    $('.interet_attendu').val(interetAttendu);
                    $('.ecart_icne').val(ecartIcne);
                    $('.date_dernier_paie').val(dateDernierPaiement);
                    $('.acquisition').val(acquisition);
                    $('.ecart').val(ecart);
                    $('.icne').val(icne3112n);
                    $('.ecart_paiement').val(ecartPaiement);
                    $('.date_arret').val(dateArret);
                    $('.remboursement').val(remboursement);
                    $('.provision').val(provision);
                    $('.interet_controle').val(interetControle);
                    $('.ecart_compta').val(ecartCompta);
                    $('.nbre_jrs_icne').val(nbreJrsIcne);
                    $('.solde_31_12_n').val(solde3112n);
                    $('.ext_icne').val(extIcne);
                    $('.interet_compta').val(interetComptable);
                    $('.icne_compta').val(icneCompta3112n);
                    $('.nbretitre').val(nbreTitre);
                    $('.valeurtitre').val(valeurTitre);
                    $('.periodicite').val(periodicite);
                    $('.tauxannuel').val(tauxAnnuel);
                    $('.tauxperiode').val(tauxPeriode);
                    $('.placement_id').val(placementID);
                });

                // Réinitialiser les champs lorsque le modal est fermé
                $('#full-width-modal-obl').on('hidden.bs.modal', function () {
                    $('.id_detail').val('');
                    $('.annee_exercice').val('');
                    $('.solde_31_12_n1').val('');
                    $('.solde_compta').val('');
                    $('.interet_recus').val('');
                    $('.interet_attendu').val('');
                    $('.ecart_icne').val('');
                    $('.date_dernier_paie').val('');
                    $('.acquisition').val('');
                    $('.ecart').val('');
                    $('.icne').val('');
                    $('.ecart_paiement').val('');
                    $('.date_arret').val('');
                    $('.remboursement').val('');
                    $('.provision').val('');
                    $('.interet_controle').val('');
                    $('.ecart_compta').val('');
                    $('.nbre_jrs_icne').val('');
                    $('.solde_31_12_n').val('');
                    $('.ext_icne').val('');
                    $('.interet_compta').val('');
                    $('.icne_compta').val('');
                    $('.nbretitre').val('');
                    $('.valeurtitre').val('');
                    $('.periodicite').val('');
                    $('.tauxannuel').val('');
                    $('.tauxperiode').val('');
                    $('.placement_id').val('');
                });
            });


             // Script qui permet d'afficher le modal et de remplir le modal des informations de ACTIONS
             $(document).ready(function () {
                // Utiliser un écouteur délégué pour les événements 'click' sur les boutons d'édition de DataTables
                $('#datatable-editable').on('click', '.edit-btn', function () {
                    // Effacer les valeurs existantes dans les champs du modal
                    $('.detail_actions_id').val('');
                    $('.placement_actions_id').val('');
                    $('.annee_exercice_actions').val('');
                    $('.solde_31_12_n_actions').val('');
                    $('.dividende').val('');
                    $('.interet_actions_recus').val('');
                    $('.interet_actions_attendu').val('');
                    $('.nbretitre_actions').val('');
                    $('.solde_actions_31_12_n1').val('');
                    $('.solde_actions_compta').val('');
                    $('.rendement').val('');
                    $('.icne_actions').val('');
                    $('.ecart_actions_paiement').val('');
                    $('.valeurtitre_actions').val('');
                    $('.acquisition_actions').val('');
                    $('.ecart_actions').val('');
                    $('.interet_actions_controle').val('');
                    $('.ecart_actions_compta').val('');
                    $('.ecart_actions_icne').val('');
                    $('.remboursement_actions').val('');
                    $('.provision_actions').val('');
                    $('.ext_actions_icne').val('');
                    $('.interet_actions_compta').val('');
                    $('.icne_actions_compta').val('');
            
                
                    // Récupérer les valeurs data-* de l'élément cliqué
                    const detailActionsId = $(this).data('id');
                    const placementActionsID = $(this).data('placementid');
                    const anneeActionsExercice = $(this).data('annee');
                    const solde3112n1Actions = $(this).data('solde3112n1');
                    const acquisitionActions = $(this).data('acquisition');
                    const remboursementActions = $(this).data('remboursement');
                    const solde3112nActions = $(this).data('solde3112n');
                    const soldeActionsComptable = $(this).data('soldecomptable');
                    const ecartActions = $(this).data('ecart');
                    const provisionActions = $(this).data('provision');
                    const extActionsIcne = $(this).data('exticne');
                    const interetActionsRecu = $(this).data('interetrecu');
                    const icne3112nActions = $(this).data('icne3112n');
                    const interetActionsControle = $(this).data('interetcontrole');
                    const interetActionsComptable = $(this).data('interetcomptable');
                    const interetActionsAttendu = $(this).data('interetattendu');
                    const ecartActionsPaiement = $(this).data('ecartpaiement');
                    const ecartActionsCompta = $(this).data('ecartcompta');
                    const icneActionsCompta3112n = $(this).data('icnecompta3112n');
                    const ecartActionsIcne = $(this).data('ecarticne');
                    const nbreActionsTitre = $(this).data('nbretitre');
                    const valeurActionsTitre = $(this).data('valeurtitre');
                    const dividende = $(this).data('divid');
                    const rendement = $(this).data('rendem');

                    // Met à jour le label avec la valeur de anneeExercice  
                    $('#solden1_actions_label').text(`Solde au 31/12/${anneeActionsExercice-1}`);  
                    $('#solden_actions_label').text(`Solde au 31/12/${anneeActionsExercice}`);  
                    $('#acquis_actions_label').text(`Acquisition ${anneeActionsExercice}`);  
                    $('#remb_actions_label').text(`Remboursement ${anneeActionsExercice}`);  
                    $('#provis_actions_label').text(`Provision au 31/12/${anneeActionsExercice}`);  
                    $('#exticne_actions_label').text(`Ext d'ICNE au 31/12/${anneeActionsExercice-1}`);  
                    $('#interetrecus_actions_label').text(`Intérêts reçus au 31/12/${anneeActionsExercice}`);
                    $('#icne_actions_label').text(`ICNE au 31/12/${anneeActionsExercice}`);
                    $('#icnecompta_actions_label').text(`ICNE comptable au 31/12/${anneeActionsExercice}`);

                    
                    // Remplir les champs du modal avec les valeurs récupérées
                    $('.detail_actions_id').val(detailActionsId);
                    $('.placement_actions_id').val(placementActionsID);
                    $('.annee_exercice_actions').val(anneeActionsExercice);
                    $('.solde_31_12_n_actions').val(solde3112nActions);
                    $('.dividende').val(dividende);
                    $('.interet_actions_recus').val(interetActionsRecu);
                    $('.interet_actions_attendu').val(interetActionsAttendu);
                    $('.nbretitre_actions').val(nbreActionsTitre);
                    $('.solde_actions_31_12_n1').val(solde3112n1Actions);
                    $('.solde_actions_compta').val(soldeActionsComptable);
                    $('.rendement').val(rendement);
                    $('.icne_actions').val(icne3112nActions);
                    $('.ecart_actions_paiement').val(ecartActionsPaiement);
                    $('.valeurtitre_actions').val(valeurActionsTitre);
                    $('.acquisition_actions').val(acquisitionActions);
                    $('.ecart_actions').val(ecartActions);
                    $('.interet_actions_controle').val(interetActionsControle);
                    $('.ecart_actions_compta').val(ecartActionsCompta);
                    $('.ecart_actions_icne').val(ecartActionsIcne);
                    $('.remboursement_actions').val(remboursementActions);
                    $('.provision_actions').val(provisionActions);
                    $('.ext_actions_icne').val(extActionsIcne);
                    $('.interet_actions_compta').val(interetActionsComptable);
                    $('.icne_actions_compta').val(icneActionsCompta3112n);
                });

                // Réinitialiser les champs lorsque le modal est fermé
                $('#full-width-modal-act').on('hidden.bs.modal', function () {
                    $('.detail_actions_id').val('');
                    $('.placement_actions_id').val('');
                    $('.annee_exercice_actions').val('');
                    $('.solde_31_12_n_actions').val('');
                    $('.dividende').val('');
                    $('.interet_actions_recus').val('');
                    $('.interet_actions_attendu').val('');
                    $('.nbretitre_actions').val('');
                    $('.solde_actions_31_12_n1').val('');
                    $('.solde_actions_compta').val('');
                    $('.rendement').val('');
                    $('.icne_actions').val('');
                    $('.ecart_actions_paiement').val('');
                    $('.valeurtitre_actions').val('');
                    $('.acquisition_actions').val('');
                    $('.ecart_actions').val('');
                    $('.interet_actions_controle').val('');
                    $('.ecart_actions_compta').val('');
                    $('.ecart_actions_icne').val('');
                    $('.remboursement_actions').val('');
                    $('.provision_actions').val('');
                    $('.ext_actions_icne').val('');
                    $('.interet_actions_compta').val('');
                    $('.icne_actions_compta').val('');
                });
            });
        </script>

        {{--  Script du calcul du nombre de jours d'icne  --}}
        <script>
            $(document).ready(function () {
                // Fonction pour calculer la différence en jours entre deux dates
                function calculateDays(dateArret, dateDernierPaiement) {
                    // Convertir les dates en objets Date
                    const dateA = new Date(dateArret);
                    const dateB = new Date(dateDernierPaiement);

                    // Calculer la différence en millisecondes
                    const diffTime = dateA - dateB;

                    // Convertir la différence en jours
                    return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                }

                // Ajouter un écouteur d'événement pour la modification de la date de dernier paiement
                $('#date_dernier_paie').on('change', function () {
                    const dateDernierPaiement = $(this).val(); // Récupérer la nouvelle valeur
                    const dateArret = $('#date_arret').val();  // Récupérer la date d'arrêt

                    // Vérifier que les deux dates sont définies
                    if (dateArret && dateDernierPaiement) {
                        // Calculer le nombre de jours
                        const nbreJoursIcne = calculateDays(dateArret, dateDernierPaiement);

                        // Vérifier si le calcul est valide
                        if (nbreJoursIcne >= 0) {
                            $('#nbre_jrs_icne').val(nbreJoursIcne).trigger('input'); // Mettre à jour le champ, Déclencher un événement 'input' manuellement;
                        } else {
                            alert("La date de dernier paiement ne peut pas être postérieure à la date d'arrêt.");
                            $('#nbre_jrs_icne').val(''); // Réinitialiser le champ
                        }
                    }
                });
            });
        </script>

        {{-- Script du calcul du solde de l'année d'exercice --}}
        <script>
            // Script du calcul du solde de l'année d'exercice OBLIGATIONS
            $(document).ready(function () {
                // Fonction pour vérifier si un nombre est un entier
                function isInteger(value) {
                    return Number.isInteger(value);
                }

                // Fonction pour calculer et afficher le solde
                function calculateSolde() {
                    // Récupérer les valeurs des champs
                    const solde31_12_N1 = parseFloat($('#solde_31_12_n1').val()) || 0; // Solde au 31/12 année antérieure
                    const acquisition = parseFloat($('#acquisition').val()) || 0; // Acquisition
                    const remboursement = parseFloat($('#remboursement').val()) || 0; // Remboursement

                    // Calculer le solde
                    const solde31_12_N = solde31_12_N1 + acquisition - remboursement;

                    // Vérifier si le résultat est un entier
                    const formattedSolde = isInteger(solde31_12_N) 
                        ? solde31_12_N // Si entier, pas de décimales
                        : solde31_12_N.toFixed(2); // Sinon, deux décimales

                    // Mettre à jour le champ Solde au 31/12 année exercice
                    $('#solde_31_12_n').val(formattedSolde).trigger('input'); // Déclencher un événement 'input' manuellement;
                }

                // Ajouter des écouteurs d'événements sur les champs
                $('#solde_31_12_n1, #acquisition, #remboursement').on('input', function () {
                    calculateSolde(); // Recalculer dès qu'une valeur est modifiée
                });
            });

            // Script du calcul du solde de l'année d'exercice ACTIONS
            $(document).ready(function () {
                // Fonction pour vérifier si un nombre est un entier
                function isInteger(value) {
                    return Number.isInteger(value);
                }

                // Fonction pour calculer et afficher le solde
                function calculateActionsSolde() {
                    // Récupérer les valeurs des champs
                    const solde31_12_N1_actions = parseFloat($('#solde_actions_31_12_n1').val()) || 0; // Solde au 31/12 année antérieure
                    const acquisitionActions = parseFloat($('#acquisition_actions').val()) || 0; // Acquisition
                    const remboursementActions = parseFloat($('#remboursement_actions').val()) || 0; // Remboursement

                    // Calculer le solde
                    const solde_actions_31_12_N = solde31_12_N1_actions + acquisitionActions - remboursementActions;

                    // Vérifier si le résultat est un entier
                    const formattedSolde = isInteger(solde_actions_31_12_N) 
                        ? solde_actions_31_12_N // Si entier, pas de décimales
                        : solde_actions_31_12_N.toFixed(2); // Sinon, deux décimales

                    // Mettre à jour le champ Solde au 31/12 année exercice
                    $('#solde_31_12_n_actions').val(formattedSolde).trigger('input'); // Déclencher un événement 'input' manuellement;
                }

                // Ajouter des écouteurs d'événements sur les champs
                $('#solde_actions_31_12_n1, #acquisition_actions, #remboursement_actions').on('input', function () {
                    calculateActionsSolde(); // Recalculer dès qu'une valeur est modifiée
                });
            });
        </script>

        {{-- Script du calcul de la Provision --}}
        <script>
            // Script du calcul de la provision OBLIGATIONS
            $(document).ready(function () {
                // Fonction pour calculer et afficher la provision
                function calculateProvision() {
                    // Récupérer les valeurs des champs
                    const solde31_12_N = parseFloat($('#solde_31_12_n').val()) || 0; // Solde au 31/12 année exercice
                    const valeurTitre = parseFloat($('#valeurtitre').val()) || 0; // Valeur du titre
        
                    // Calculer la provision selon les conditions
                    const provision = solde31_12_N > valeurTitre 
                        ? solde31_12_N - valeurTitre // Si le solde est supérieur à la valeur du titre
                        : 0; // Sinon, provision est 0
        
                    // Vérifier si le résultat est un entier
                    const formattedProvision = Number.isInteger(provision)
                        ? provision // Si entier, pas de décimales
                        : provision.toFixed(2); // Sinon, deux décimales
        
                    // Mettre à jour le champ Provision
                    $('#provision').val(formattedProvision);
                }
        
                // Ajouter des écouteurs d'événements sur les champs pertinents
                $('#solde_31_12_n, #valeurtitre').on('input', function () {
                    calculateProvision(); // Recalculer dès qu'une valeur est modifiée
                });
            });


            // Script du calcul de la provision ACTIONS
            $(document).ready(function () {
                // Fonction pour calculer et afficher la provision
                function calculateActionsProvision() {
                    // Récupérer les valeurs des champs
                    const solde_actions31_12_N = parseFloat($('#solde_31_12_n_actions').val()) || 0; // Solde au 31/12 année exercice
                    const valeurActionsTitre = parseFloat($('#valeurtitre_actions').val()) || 0; // Valeur du titre
        
                    // Calculer la provision selon les conditions
                    const provisionActions = solde_actions31_12_N > valeurActionsTitre 
                        ? solde_actions31_12_N - valeurActionsTitre // Si le solde est supérieur à la valeur du titre
                        : 0; // Sinon, provision est 0
        
                    // Vérifier si le résultat est un entier
                    const formattedProvision = Number.isInteger(provisionActions)
                        ? provisionActions // Si entier, pas de décimales
                        : provisionActions.toFixed(2); // Sinon, deux décimales
        
                    // Mettre à jour le champ Provision
                    $('#provision_actions').val(formattedProvision);
                }
        
                // Ajouter des écouteurs d'événements sur les champs pertinents
                $('#solde_31_12_n_actions, #valeurtitre_actions').on('input', function () {
                    calculateActionsProvision(); // Recalculer dès qu'une valeur est modifiée
                });
            });
        </script>

        {{-- Script du calcul de l'icne  --}}
        <script>
            $(document).ready(function () {
                /**
                 * Fonction pour calculer l'ICNE en fonction des valeurs des champs
                 */
                function calculateICNE() {
                    // Récupérer les valeurs des champs
                    const periodicite = $('#periodicite').val(); // Périodicité (Annuel, Semestre, Trimestre)
                    const tauxAnnuelPourcentage = parseFloat($('#tauxannuel').val()) || 0; // Taux annuel (%)
                    const nombreJoursICNE = parseFloat($('#nbre_jrs_icne').val()) || 0; // Nombre de jours d'ICNE
                    const solde31_12_N = parseFloat($('#solde_31_12_n').val()) || 0; // Solde au 31/12 année exercice

                    // Convertir le taux annuel de pourcentage à valeur décimale
                    const tauxAnnuel = tauxAnnuelPourcentage / 100;

                    let icne = 0; // Initialisation de l'ICNE

                    // Vérifier la périodicité pour appliquer la formule appropriée
                    if (periodicite === 'Annuel' || periodicite === 'Semestre') {
                        // Calcul pour Annuel ou Semestre
                        icne = (solde31_12_N * nombreJoursICNE * tauxAnnuel) / 360;
                    } else if (periodicite === 'Trimestre') {
                        // Calcul pour Trimestre
                        icne = (solde31_12_N * nombreJoursICNE * tauxAnnuel) / 360 * 0.98;
                    }

                    // Vérifier si le résultat est un entier
                    const formattedICNE = Number.isInteger(icne)
                        ? icne // Si entier, pas de décimales
                        : icne.toFixed(0); // Sinon, deux décimales

                    // Mettre à jour le champ ICNE
                    $('#icne').val(formattedICNE).trigger('input');
                }

                /**
                 * Ajouter des écouteurs d'événements pour recalculer l'ICNE
                 * chaque fois qu'une des valeurs change.
                 */
                $('#periodicite, #tauxannuel, #nbre_jrs_icne, #solde_31_12_n').on('input', function () {
                    calculateICNE(); // Recalculer l'ICNE
                });

                // Appeler une première fois pour initialiser les valeurs
                calculateICNE();
            });
        </script>

        {{-- Script du calcul de l'interet controlé --}}
        <script>
            // Script du calcul de l'interet controlé OBLIGATIONS
            $(document).ready(function () {
                /**
                 * Fonction pour calculer les Intérêts contrôlés
                 */
                function calculateInteretControle() {
                    // Récupérer les valeurs des champs
                    const interetRecus = parseFloat($('#interet_recus').val()) || 0; // Intérêts reçus
                    const icne = parseFloat($('#icne').val()) || 0; // ICNE
                    const extICNE = parseFloat($('#ext_icne').val()) || 0; // Ext d'ICNE

                    // Calcul des Intérêts contrôlés
                    const interetControle = interetRecus + icne - extICNE;

                    // Vérifier si le résultat est un entier
                    const formattedInteretControle = Number.isInteger(interetControle)
                        ? interetControle // Si entier, pas de décimales
                        : interetControle.toFixed(2); // Sinon, deux décimales

                    // Mettre à jour le champ Intérêts contrôlés
                    $('#interet_controle').val(formattedInteretControle).trigger('input');
                }

                /**
                 * Ajouter des écouteurs d'événements pour recalculer les Intérêts contrôlés
                 * chaque fois qu'une des valeurs change.
                 */
                $('#interet_recus, #icne, #ext_icne').on('input', function () {
                    calculateInteretControle(); // Recalculer les Intérêts contrôlés
                });

                // Appeler une première fois pour initialiser les valeurs
                calculateInteretControle();
            });


            // Script du calcul de l'interet controlé ACTIONS
            $(document).ready(function () {
                /**
                 * Fonction pour calculer les Intérêts contrôlés
                 */
                function calculateActionsInteretControle() {
                    // Récupérer les valeurs des champs
                    const interetActionsRecus = parseFloat($('#interet_actions_recus').val()) || 0; // Intérêts reçus
                    const icneActions = parseFloat($('#icne_actions').val()) || 0; // ICNE
                    const extICNEActions = parseFloat($('#ext_actions_icne').val()) || 0; // Ext d'ICNE

                    // Calcul des Intérêts contrôlés
                    const interetActionsControle = interetActionsRecus + icneActions - extICNEActions;

                    // Vérifier si le résultat est un entier
                    const formattedInteretControle = Number.isInteger(interetActionsControle)
                        ? interetActionsControle // Si entier, pas de décimales
                        : interetActionsControle.toFixed(2); // Sinon, deux décimales

                    // Mettre à jour le champ Intérêts contrôlés
                    $('#interet_actions_controle').val(formattedInteretControle).trigger('input');
                }

                /**
                 * Ajouter des écouteurs d'événements pour recalculer les Intérêts contrôlés
                 * chaque fois qu'une des valeurs change.
                 */
                $('#interet_actions_recus, #icne_actions, #ext_actions_icne').on('input', function () {
                    calculateActionsInteretControle(); // Recalculer les Intérêts contrôlés
                });

                // Appeler une première fois pour initialiser les valeurs
                calculateActionsInteretControle();
            });
        </script>

        {{-- Script du calcul des interets attendus --}}
        <script>
            // Script du calcul des interets attendus OBLIGATIONS
            $(document).ready(function () {
                /**
                 * Fonction pour calculer les Intérêts attendus
                 */
                function calculateInteretAttendu() {
                    // Récupérer les valeurs des champs
                    const periodicite = $('#periodicite').val(); // Périodicité
                    const soldeAnneeAnterieure = parseFloat($('#solde_31_12_n1').val()) || 0; // Solde au 31/12 de l'année précédente
                    const tauxPeriodePourcentage = parseFloat($('#tauxperiode').val()) || 0; // Taux période 

                    const tauxPeriode = tauxPeriodePourcentage / 100;

                    let interetAttendu = 0; // Initialiser la variable des Intérêts attendus

                    // Calculer les Intérêts attendus selon la périodicité
                    if (periodicite === 'Annuel') {
                        interetAttendu = soldeAnneeAnterieure * tauxPeriode;
                    } else if (periodicite === 'Semestre') {
                        interetAttendu = (soldeAnneeAnterieure * tauxPeriode) * 2;
                    } else if (periodicite === 'Trimestre') {
                        interetAttendu = ((soldeAnneeAnterieure * tauxPeriode) * 4) * 0.98;
                    }

                    // Vérifier si le résultat est un entier et formater en conséquence
                    const formattedInteretAttendu = Number.isInteger(interetAttendu)
                        ? interetAttendu // Si entier, pas de décimales
                        : interetAttendu.toFixed(2); // Sinon, deux décimales

                    // Mettre à jour le champ Intérêts attendus
                    $('#interet_attendu').val(formattedInteretAttendu);
                }

                /**
                 * Ajouter des écouteurs d'événements pour recalculer les Intérêts attendus
                 * chaque fois qu'une des valeurs change.
                 */
                $('#solde_31_12_n1, #tauxperiode, #periodicite').on('input', function () {
                    calculateInteretAttendu(); // Recalculer les Intérêts attendus
                });

                // Appeler une première fois pour initialiser les valeurs si elles sont déjà présentes
                calculateInteretAttendu();
            });
            
        </script>

        {{-- Script du calcul des écarts de paiements --}}
        <script>
            $(document).ready(function () {
                /**
                 * Fonction pour calculer l'écart de paiement
                 */
                function calculateEcartPaiement() {
                    // Récupérer les valeurs des champs
                    const interetRecus = parseFloat($('#interet_recus').val()) || 0; // Intérêts reçus
                    const interetAttendu = parseFloat($('#interet_attendu').val()) || 0; // Intérêts attendus

                    // Calculer l'écart de paiement
                    const ecartPaiement = interetRecus - interetAttendu;

                    // Vérifier si le résultat est un entier et formater en conséquence
                    const formattedEcartPaiement = Number.isInteger(ecartPaiement)
                        ? ecartPaiement // Si entier, pas de décimales
                        : ecartPaiement.toFixed(2); // Sinon, deux décimales

                    // Mettre à jour le champ Écart de paiement
                    $('#ecart_paiement').val(formattedEcartPaiement);
                }

                /**
                 * Ajouter des écouteurs d'événements pour recalculer l'écart de paiement
                 * chaque fois qu'une des valeurs change.
                 */
                $('#interet_recus, #interet_attendu').on('input', function () {
                    calculateEcartPaiement(); // Recalculer l'écart de paiement
                });

                // Appeler une première fois pour initialiser les valeurs si elles sont déjà présentes
                calculateEcartPaiement();
            });
        </script>

        {{-- Script du calcul de l'Ecart --}}
        <script>
            $(document).ready(function () {
                // Sélectionner les champs nécessaires
                const $solde3112nInput = $(".solde_31_12_n"); // Champ pour le solde au 31/12/n
                const $soldeComptaInput = $(".solde_compta"); // Champ pour le solde comptable
                const $ecartInput = $(".ecart");             // Champ pour l'écart
        
                // Fonction pour vérifier si un nombre est entier
                function formatNumber(value) {
                    // Vérifier si le nombre est un entier
                    if (Number.isInteger(value)) {
                        return value; // Retourner l'entier
                    }
                    // Sinon, formater le nombre avec 2 chiffres après la virgule
                    return value.toFixed(2);
                }
        
                // Fonction pour calculer et mettre à jour l'écart
                function calculateEcart() {
                    // Récupérer les valeurs des champs `solde_31_12_n` et `solde_compta`
                    const solde3112n = parseFloat($solde3112nInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
                    const soldeCompta = parseFloat($soldeComptaInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
        
                    // Calculer l'écart
                    const ecart = solde3112n - soldeCompta;
        
                    // Mettre à jour le champ `ecart` avec un formatage adapté
                    $ecartInput.val(formatNumber(ecart));
                }
        
                // Ajouter un écouteur d'événement pour détecter les modifications dans le champ `solde_compta`
                $soldeComptaInput.on("input", calculateEcart);
        
                // Si le solde au 31/12/n change (par script), recalculer l'écart
                $solde3112nInput.on("input", calculateEcart);
            });
        </script>
        

        {{-- Script du calcul de l'écart comptabilisé --}}
        <script>
            $(document).ready(function () {
                // Sélectionner les champs nécessaires
                const $ecartComptaInput = $(".ecart_compta"); // Champ pour l'écart comptabilisé
                const $interetControleInput = $(".interet_controle"); // Champ pour les intérêts contrôlés
                const $interetComptaInput = $(".interet_compta"); // Champ pour les intérêts comptables
                const $ecartIcneInput = $(".ecart_icne"); // Champ pour l'écart ICNE
        
                // Fonction pour vérifier si un nombre est entier ou décimal, avec 2 chiffres après la virgule si nécessaire
                function formatNumber(value) {
                    if (Number.isInteger(value)) {
                        return value; // Retourner l'entier
                    }
                    return value.toFixed(2); // Retourner le nombre avec 2 chiffres après la virgule
                }
        
                // Fonction pour calculer et mettre à jour l'écart comptabilisé
                function calculateEcartCompta() {
                    // Récupérer les valeurs des champs
                    const interetControle = parseFloat($interetControleInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
                    const interetCompta = parseFloat($interetComptaInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
                    const ecartIcne = parseFloat($ecartIcneInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
        
                    // Calculer l'écart comptabilisé
                    const ecartCompta = interetControle - interetCompta - ecartIcne;
        
                    // Mettre à jour le champ `écart_compta` avec un formatage adapté
                    $ecartComptaInput.val(formatNumber(ecartCompta));
                }
        
                // Ajouter des écouteurs d'événement pour recalculer l'écart comptabilisé
                $interetComptaInput.on("input", calculateEcartCompta);
                $ecartIcneInput.on("input", calculateEcartCompta);

                // Si le champ `interet_controle` est modifié (par script), recalculer également
                $interetControleInput.on("input", calculateEcartCompta);

            });
        </script>


        {{-- Script du calcul de l'écart ICNE --}}
        <script>
            $(document).ready(function () {
                // Sélectionner les champs nécessaires
                const $ecartIcneInput = $(".ecart_icne"); // Champ pour l'écart ICNE
                const $icneInput = $(".icne"); // Champ pour l'ICNE
                const $icneComptaInput = $(".icne_compta"); // Champ pour l'ICNE comptable
        
                // Fonction pour vérifier si un nombre est entier ou décimal, avec 2 chiffres après la virgule si nécessaire
                function formatNumber(value) {
                    if (Number.isInteger(value)) {
                        return value; // Retourner l'entier
                    }
                    return value.toFixed(2); // Retourner le nombre avec 2 chiffres après la virgule
                }
        
                // Fonction pour calculer et mettre à jour l'écart ICNE
                function calculateEcartIcne() {
                    // Récupérer les valeurs des champs
                    const icne = parseFloat($icneInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
                    const icneCompta = parseFloat($icneComptaInput.val()) || 0; // Convertir en nombre ou utiliser 0 par défaut
        
                    // Calculer l'écart ICNE
                    const ecartIcne = icne - icneCompta;
        
                    // Mettre à jour le champ `écart_icne` avec un formatage adapté
                    $ecartIcneInput.val(formatNumber(ecartIcne)).trigger('input');
                }
        
                // Ajouter des écouteurs d'événement pour recalculer l'écart ICNE
                $icneComptaInput.on("input", calculateEcartIcne);
        
                // Si le champ `icne` est modifié (par script), recalculer également
                $icneInput.on("input", calculateEcartIcne);
            });
        </script>
        

        {{-- Script pour faire la mise a jours du détail d'un placement --}}
        <script>

            // Script pour faire la mise à jour du détail d'un placement OBLIGATIONS
            document.addEventListener("DOMContentLoaded", function () {
                // Écouteur pour le bouton "Appliquer les changements"
                document.querySelectorAll('.apply-changes-btn').forEach(button => {
                    button.addEventListener('click', async function (e) {
                        e.preventDefault();

                        // Récupérer l'ID crypté du placement depuis l'attribut 'data-id'
                        const placementId = this.dataset.idplace;

                        // Récupérer les valeurs des champs du modal
                        const formData = {
                            id: document.querySelector('.id_detail').value,
                            placements_id: document.querySelector('.placement_id').value,
                            annee_exercice: document.querySelector('.annee_exercice').value,
                            solde_31_12_n_1: document.querySelector('.solde_31_12_n1').value,
                            solde_comptable: document.querySelector('.solde_compta').value,
                            interet_recu_31_12_n: document.querySelector('.interet_recus').value,
                            interet_attendu: document.querySelector('.interet_attendu').value,
                            ecart_icne: document.querySelector('.ecart_icne').value,
                            date_dernier_paiement: document.querySelector('.date_dernier_paie').value,
                            acquisition: document.querySelector('.acquisition').value,
                            ecart: document.querySelector('.ecart').value,
                            icne_31_12_n: document.querySelector('.icne').value,
                            ecart_paiement: document.querySelector('.ecart_paiement').value,
                            date_arret: document.querySelector('.date_arret').value,
                            remboursement: document.querySelector('.remboursement').value,
                            provision_31_12_n: document.querySelector('.provision').value,
                            interet_controle: document.querySelector('.interet_controle').value,
                            ecart_comptabilise: document.querySelector('.ecart_compta').value,
                            nbre_jrs_icne: document.querySelector('.nbre_jrs_icne').value,
                            solde_31_12_n: document.querySelector('.solde_31_12_n').value,
                            ext_icne_31_12_n_1: document.querySelector('.ext_icne').value,
                            interet_comptable: document.querySelector('.interet_compta').value,
                            icne_comptable_31_12_n: document.querySelector('.icne_compta').value,
                            _token: '{{ csrf_token() }}' // CSRF Token
                        };

                        console.log(formData); // Vérifiez que les valeurs envoyées sont correctes

                        try {
                            // Envoi de la requête Fetch
                            const response = await fetch(`/home/details-placement/${placementId}/modifier-obligations`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json', // Indique que les données envoyées sont au format JSON
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF Token pour Laravel
                                },
                                body: JSON.stringify(formData) // Conversion des données en JSON
                            });

                            // Traiter la réponse
                            const result = await response.json();

                            if (response.ok) {
                                if (result.success) {
                                    Swal.fire({
                                        title: 'Succès',
                                        text: result.message,
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3'
                                    }).then(() => {
                                        location.reload(); // Recharger la page après confirmation
                                    });
                                } else {
                                    Swal.fire("Erreur", result.message, "error");
                                }
                            } else {
                                // Afficher les messages d'erreur
                                if (result.errors) {
                                    Object.keys(result.errors).forEach(key => {
                                        const errorElement = document.querySelector(`.error-${key}`);
                                        if (errorElement) {
                                            errorElement.textContent = result.errors[key][0];
                                        }
                                    });
                                } else {
                                    Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                                }
                            }
                        } catch (error) {
                            console.error("Une erreur est survenue :", error);
                            Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                        }
                    });
                });
            });


            // Script pour faire la mise à jour du détail d'un placement ACTIONS
            document.addEventListener('DOMContentLoaded', function () {
                // Écouteur pour le bouton "Appliquer les changements"
                document.querySelectorAll('.apply-btn-actions').forEach(function (button) {
                    button.addEventListener('click', async function (e) {
                        e.preventDefault();

                        // Récupérer l'ID crypté du placement depuis l'attribut 'data-id'
                        const placementIdAct = this.dataset.idactionsplace;

                        // Récupérer les valeurs des champs du modal
                        const formData = {
                            id_actions_details: document.querySelector('.detail_actions_id').value,
                            actions_placements_id: document.querySelector('.placement_actions_id').value,
                            actions_annee_exercice: document.querySelector('.annee_exercice_actions').value,
                            actions_solde_31_12_n_1: document.querySelector('.solde_actions_31_12_n1').value,
                            actions_solde_comptable: document.querySelector('.solde_actions_compta').value,
                            actions_dividende: document.querySelector('.dividende').value,
                            actions_rendement: document.querySelector('.rendement').value,
                            actions_interet_recu_31_12_n: document.querySelector('.interet_actions_recus').value,
                            actions_interet_attendu: document.querySelector('.interet_actions_attendu').value,
                            actions_ecart_icne: document.querySelector('.ecart_actions_icne').value,
                            actions_acquisition: document.querySelector('.acquisition_actions').value,
                            actions_ecart: document.querySelector('.ecart_actions').value,
                            actions_icne_31_12_n: document.querySelector('.icne_actions').value,
                            actions_ecart_paiement: document.querySelector('.ecart_actions_paiement').value,
                            actions_remboursement: document.querySelector('.remboursement_actions').value,
                            actions_provision_31_12_n: document.querySelector('.provision_actions').value,
                            actions_interet_controle: document.querySelector('.interet_actions_controle').value,
                            actions_ecart_comptabilise: document.querySelector('.ecart_actions_compta').value,
                            actions_solde_31_12_n: document.querySelector('.solde_31_12_n_actions').value,
                            actions_ext_icne_31_12_n_1: document.querySelector('.ext_actions_icne').value,
                            actions_interet_comptable: document.querySelector('.interet_actions_compta').value,
                            actions_icne_comptable_31_12_n: document.querySelector('.icne_actions_compta').value,
                            _token: '{{ csrf_token() }}' // CSRF Token
                        };

                        console.log(formData); // Vérifiez que les valeurs envoyées sont correctes

                        try {
                            // Envoi de la requête Fetch API
                            const response = await fetch(`/home/details-placement/${placementIdAct}/modifier-actions`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': formData._token
                                },
                                body: JSON.stringify(formData)
                            });

                            // Vérifier si la réponse HTTP est OK
                            if (!response.ok) {
                                // Si une erreur HTTP survient, extraire les détails de l'erreur
                                const errorData = await response.json();
                                throw errorData;
                            }

                            // Récupérer la réponse en JSON
                            const data = await response.json();

                            // Gestion du succès
                            if (data.success) {
                                Swal.fire({
                                    title: 'Succès',
                                    text: data.message,
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3'
                                }).then(() => {
                                    location.reload(); // Recharger la page après confirmation
                                });
                            } else {
                                Swal.fire("Erreur", data.message, "error");
                            }
                        } catch (error) {
                            // Réinitialiser les messages d'erreur
                            document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

                            // Gestion des erreurs de validation ou autres erreurs serveur
                            if (error.errors) {
                                Object.keys(error.errors).forEach(key => {
                                    const errorElement = document.querySelector(`.error-${key}`);
                                    if (errorElement) {
                                        errorElement.textContent = error.errors[key][0];
                                    }
                                });
                            } else {
                                Swal.fire("Erreur", "Une erreur est survenue. Veuillez réessayer.", "error");
                            }
                        }
                    });
                });
            });

        </script>

        {{-- Script pour la suppression d'un détail dans le tableau --}}
        <script>
           // Utilisation de la délégation d'événements sur la table avec son ID
            $('#datatable-editable').on('click', '.delete-btn', function () {
                let detailId = $(this).data('detailid');  // Récupération de l'ID de l'élément à supprimer
                let placeId = $(this).data('placeid');

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
                            url: '/home/details-placement/' + placeId + '/supprimer',  // Route pour la suppression
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',  // Token CSRF pour valider la requête
                                id: detailId // ID de l'élément à supprimer
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
    
    </body>
</html>