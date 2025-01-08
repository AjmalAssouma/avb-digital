<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name') . ' | Placement'}}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />
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
                                            Placements
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
                                        <br>
                                        
                                        <div class="row">
                                            <div class="col">
                                                <ul class="nav nav-tabs tabs-bordered nav-justified" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="obl-tab-b2" data-toggle="tab" href="#obl-b2" role="tab" aria-controls="obl-b2" aria-selected="true">
                                                            <span class="d-block d-sm-none">OBLIGATIONS</span>
                                                            <span class="d-none d-sm-block">OBLIGATIONS</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" id="action-tab-b2" data-toggle="tab" href="#action-b2" role="tab" aria-controls="action-b2" aria-selected="true">
                                                            <span class="d-block d-sm-none">ACTIONS</span>
                                                            <span class="d-none d-sm-block">ACTIONS <br></span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="dat-tab-b2" data-toggle="tab" href="#dat-b2" role="tab" aria-controls="dat-b2" aria-selected="true">
                                                            <span class="d-block d-sm-none">DAT</span>
                                                            <span class="d-none d-sm-block">DAT (Dépôt A Terme)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="fcp-tab-b2" data-toggle="tab" href="#fcp-b2" role="tab" aria-controls="fcp-b2" aria-selected="true">
                                                            <span class="d-block d-sm-none">FCP</span>
                                                            <span class="d-none d-sm-block">FCP (Fonds Commun de Placement)</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    {{-- -------------------------OBLIGATIONS----------------------------------}}
                                                    <div class="tab-pane fade show active" id="obl-b2" role="tabpanel" aria-labelledby="obl-tab-b2">
                                                        <form action="{{route('creation.placement.obligation')}}" method="POST">
                                                            @csrf

                                                            @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif

                                                            <br>

                                                            @if(session('success_obligations'))
                                                                <div class="alert alert-icon alert-success alert-dismissible fade show justify-content-center col-sm-6 col-md-6" style="margin: 0 auto; margin-top: -10px; margin-bottom: 15px;" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <i class="mdi mdi-check-all"></i>
                                                                    {{ session('success_obligations') }}
                                                                </div>
                                                            @endif 

                                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                                <!-- Colonne de gauche -->
                                                                <div style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="type_placement">Type du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="type_placement" class="form-control type_placement" name="type_placement" placeholder="OBLIGATIONS" required>
                                                                        @error('type_placement')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="nom_placement">Nom du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="nom_placement" class="form-control nom_placement" name="nom_placement" 
                                                                        placeholder="Type de placement + taux annuel + année debut - année fin." readonly required>
                                                                        @error('nom_placement')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="periodicite">Périodicité <span class="text-danger">*</span> </label>
                                                                        <select  class="form-control" name="periodicite" id="periodicite" required  style="cursor: pointer">
                                                                            <option value="">Sélectionnez une périodicité.</option>
                                                                            <option value="Trimestre">Trimestre</option>
                                                                            <option value="Semestre">Semestre</option>
                                                                            <option value="Annuel">Annuel</option>
                                                                        </select>
                                                                    </div>
        
                                                                    <div class="form-group">  
                                                                        <label for="taux_periode">Taux période <span class="text-danger">*</span></label>  
                                                                        <div class="input-group">  
                                                                            <input type="text" id="taux_periode" class="form-control taux_periode" name="taux_periode" required readonly>  
                                                                            <div class="input-group-append">  
                                                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                            </div>
                                                                        </div>    
                                                                    </div>  

                                                                    <div class="form-group">
                                                                        <label for="duree_annee">Durée (en année) <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="duree_annee" class="form-control duree_annee" name="duree_annee"
                                                                        placeholder="Nombre d'année que couvre le placement" pattern="\d+" readonly value="{{old('duree_annee')}}" required>
                                                                        @error('duree_annee')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
        
                                                                <!-- Colonne de droite -->
                                                                <div  style="flex: 1;">
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="num_compte">Numéro de compte <span class="text-danger">*</span></label>
                                                                        <select class="form-control select2" name="num_compte" id="num_compte" required>
                                                                            <option value="">Sélectionnez un numéro de compte</option>
                                                                            @foreach ($numcomptes as $numcompte)
                                                                                <option value="{{ $numcompte->id }}">{{ $numcompte->num_compte }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('num_compte')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ncpf_obl">Numéro de compte du produit financier <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="ncpf_obl" class="form-control ncpf_obl" name="ncpf_obl" 
                                                                        placeholder="Numéro de compte du produit financier" readonly required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="taux_annuel">Taux annuel <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="taux_annuel" class="form-control taux_annuel" name="taux_annuel" value="{{old('taux_annuel')}}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Plages de dates</label>
                                                                        
                                                                        <div class="input-group">
                                                                            <input type="date" class="form-control date_start" name="date_start" placeholder="Date de début" value="{{old('date_start')}}" required />

                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                            </div>
                                                                            
                                                                            <input type="date" class="form-control date_end" name="date_end" placeholder="Date de fin" value="{{old('date_end')}}" required />
                                                                           
                                                                        </div> 
                                                                    </div>

                                                                </div>     
                                                            </div>

                                                            <div class="accordion" id="accordion-test">
                                                                <div class="card-sgi">

                                                                    <div class="card-heading">
                                                                        <h4 class="card-title font-14">
                                                                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1" style="font-size: 20px">
                                                                                SGI (Societe de Gestion d'Intermédiations)
                                                                            </a>
                                                                        </h4>
                                                                    </div>

                                                                    <div id="collapseOne-1" class="collapse show" data-parent="#accordion-test">

                                                                        <div class="card-body">
                                                                            <div class="container-dynamic">
                                                                                <!-- Premier formulaire de base -->
                                                                                <div class="row form-block" data-index="0">

                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label for="sgis_id_0">SGI <span class="text-danger">*</span></label>
                                                                                            <select class="form-control select2" name="sgis[0][id]" id="sgis_id_0" required>
                                                                                                <option value="">Sélectionnez une SGI</option>
                                                                                                @foreach ($sgis as $sgi)
                                                                                                    <option value="{{ $sgi->id }}">{{ $sgi->code_sgi }} ({{ $sgi->num_compte_tresor }})</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="valeur_titre_0">Valeur du titre <span class="text-danger">*</span></label>
                                                                                            <input type="text" class="form-control valeur_titre" name="sgis[0][valeur_titre]" id="valeur_titre_0"
                                                                                                placeholder="La valeur du titre." data-parsley-type="number" value="{{old('sgis.0.valeur_titre')}}" required>
                                                                                            @error('sgis.0.valeur_titre')
                                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                            @enderror
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="gain_0">Gain total <span class="text-danger">*</span></label>
                                                                                            <input type="text" id="gain_0" class="form-control gain" name="sgis[0][gain]"
                                                                                                placeholder="(Valeur du titre - Valeur d'acquisition du titre)" data-parsley-type="number" value="{{old('sgis.0.gain')}}" readonly required>
                                                                                            @error('sgis.0.gain')
                                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label for="nbre_titre_0">Nombre de titre <span class="text-danger">*</span></label>
                                                                                            <input type="text" class="form-control nbre_titre" name="sgis[0][nbre_titre]" id="nbre_titre_0"
                                                                                                placeholder="Le nombre de titre." data-parsley-type="number" value="{{old('sgis.0.nbre_titre')}}" required>
                                                                                            @error('sgis.0.nbre_titre')
                                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="vacq_titre_0">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                                                            <input type="text" class="form-control vacq_titre" name="sgis[0][vacq_titre]" id="vacq_titre_0"
                                                                                                placeholder="La valeur d'acquisition du titre." data-parsley-type="number" value='{{old('sgis.0.vacq_titre')}}' required>
                                                                                            @error('sgis.0.vacq_titre')
                                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Bouton Retirer -->
                                                                                    <div class="col-12 text-right">
                                                                                        <button type="button" class="btn btn-secondary btn-retirer waves-effect">Retirer</button>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                            </div>
                                                                            <button type="button" class="btn-ajsgi btn-appliq waves-effect waves-light">Ajouter</button>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                            <div class="inp-sub-div">
                                                                <button type="submit" class="btn btn-primary inp-sub-place">Créer</button>
                                                            </div>
                                                                
                                                        </form>
                                                    </div>

                                                    {{----------------------------ACTIONS--------------------------------------}}
                                                    <div class="tab-pane fade" id="action-b2" role="tabpanel" aria-labelledby="action-tab-b2">
                                                        <form action="{{route('creation.placement.action')}}" method="POST">
                                                            @csrf
                                                           
                                                            <br>
                                                            @if(session('success_action'))
                                                                <div class="alert alert-icon alert-success alert-dismissible fade show justify-content-center col-sm-6 col-md-6" style="margin: 0 auto; margin-top: -10px; margin-bottom: 15px;" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <i class="mdi mdi-check-all"></i>
                                                                    {{ session('success_action') }}
                                                                </div>
                                                            @endif 
                                                            
                                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                                <!-- Colonne de gauche -->
                                                                <div style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="typeplacement_act">Type du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="typeplacement_act" class="form-control typeplacement_act" name="typeplacement_act" placeholder="ACTION" required>
                                                                        @error('typeplacement_act')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="numcompte_act">Numéro de compte <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control numcompte_act" name="numcompte_act" id="numcompte_act" 
                                                                        placeholder="Le numéro de compte doit etre uniquement composé de chiffre"  data-parsley-type="number" pattern="\d+" value="{{ old('numcompte_act') }}" required>
                                                                        @error('numcompte_act')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="nbretitre_act">Nombre de titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control nbretitre_act" name="nbretitre_act" id="nbretitre_act" 
                                                                        placeholder="Le nombre de titre pour ce placement." data-parsley-type="number" pattern="\d+" value="{{ old('nbretitre_act') }}" oninput="calculateGain()" required>
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="vacqtitre_act">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control vacqtitre_act" name="vacqtitre_act" id="vacqtitre_act" 
                                                                        placeholder="La valeur d'acquisition du titre." data-parsley-type="number" pattern="\d+" oninput="calculateGain()" value="{{ old('vacqtitre_act') }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="dureeannee_act">Durée (en année) <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="dureeannee_act" class="form-control dureeannee_act" name="dureeannee_act"
                                                                        placeholder="Nombre d'année que couvre le placement" value="{{ old('dureeannee_act') }}" pattern="\d+" readonly required>
                                                                    </div>

                                                                </div>
        
                                                                <!-- Colonne de droite -->
                                                                <div  style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="nomplacement_act">Nom du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="nomplacement_act" class="form-control nomplacement_act" name="nomplacement_act" 
                                                                        placeholder="Nom de l'ACTIONS" value="{{ old('nomplacement_act') }}" required>
                                                                        @error('nomplacement_act')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="sgisid_act">SGI <span class="text-danger">*</span></label> 
                                                                        <select class="form-control select2" name="sgisid_act" id="sgisid_act" required>
                                                                            <option value="">Sélectionnez une SGI</option>
                                                                            @foreach ($sgis as $sgi)
                                                                            <option value="{{$sgi->id}}" > {{$sgi->code_sgi}} ({{ $sgi->num_compte_prod_finan }}) </option>                                                                          
                                                                            @endforeach
                                                                        </select>  
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="valeurtitre_act">Valeur du titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control valeurtitre_act" name="valeurtitre_act" id="valeurtitre_act" 
                                                                        placeholder="La valeur du titre pour ce placement." data-parsley-type="number" oninput="calculateGain()" pattern="\d+" value="{{ old('valeurtitre_act') }}"  required />
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label>Plages de dates</label>
                                                                        
                                                                        <div class="input-group">
                                                                            <input type="date" class="form-control datestart_act" name="datestart_act" placeholder="Date de début" value="{{ old('datestart_act') }}" required />
                                                                            @error('datestart_act')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
        
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                            </div>
                                                                            
                                                                            <input type="date" class="form-control dateend_act" name="dateend_act" placeholder="Date de fin" value="{{ old('dateend_act') }}"  required />
                                                                            @error('dateend_act')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div> 
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="gain_act">Gain total <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="gain_act" class="form-control gain_act" name="gain_act" 
                                                                        placeholder="(Valeur du titre - Valeur d'acquisition du titre)" data-parsley-type="number" pattern="\d+" value="{{ old('gain_act') }}" readonly required>
                                                                        @error('gain_act')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>     
                                                            </div>
        
                                                            <div class="inp-sub-div">
                                                                <button type="submit" class="btn btn-primary inp-sub-place sub-act">Créer</button>
                                                            </div>
                                                                
                                                        </form>
                                                    </div>

                                                    {{----------------------------DAT--------------------------------------}}
                                                    <div class="tab-pane" id="dat-b2" role="tabpanel" aria-labelledby="dat-tab-b2">
                                                        <form action="{{route('creation.placement.dat')}}" method="POST">
                                                            @csrf
                                                           
                                                            <br>
                                                            @if(session('success_dat'))
                                                                <div class="alert alert-icon alert-success alert-dismissible fade show justify-content-center col-sm-6 col-md-6" style="margin: 0 auto; margin-top: -10px; margin-bottom: 15px;" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <i class="mdi mdi-check-all"></i>
                                                                    {{ session('success_dat') }}
                                                                </div>
                                                            @endif 
                                                            
                                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                                <!-- Colonne de gauche -->
                                                                <div style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="typeplacement_dat">Type du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="typeplacement_dat" class="form-control typeplacement_dat" name="typeplacement_dat" placeholder="DAT" value="{{ old('typeplacement_dat') }}" required>
                                                                        @error('typeplacement_dat')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="numcompte_dat">Numéro de compte <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control numcompte_dat" name="numcompte_dat" id="numcompte_dat" 
                                                                        placeholder="Le numéro de compte doit etre uniquement composé de chiffre"  data-parsley-type="number" pattern="\d+" value="{{ old('numcompte_dat') }}" required>
                                                                        @error('numcompte_dat')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="periodicite_dat">Périodicité <span class="text-danger">*</span> </label>
                                                                        <select  class="form-control periodicite_dat" name="periodicite_dat" id="periodicite_dat" required style="cursor: pointer">
                                                                            <option value="">Sélectionnez une périodicité.</option>
                                                                            <option value="Mensuel">Mensuel</option>
                                                                            <option value="Trimestre">Trimestre</option>
                                                                            <option value="Semestre">Semestre</option>
                                                                            <option value="Annuel">Annuel</option>
                                                                        </select>
                                                                    </div>
        
                                                                    <div class="form-group">  
                                                                        <label for="tauxperiode_dat">Taux période <span class="text-danger">*</span></label>  
                                                                        <div class="input-group">  
                                                                            <input type="text" id="tauxperiode_dat" class="form-control tauxperiode_dat" name="tauxperiode_dat" pattern="\d+" value="{{ old('tauxperiode_dat') }}" required readonly>  
                                                                            <div class="input-group-append">  
                                                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                            </div>
                                                                        </div>
                                                                        @error('tauxperiode_dat')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror  
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="dureeannee_dat">Durée (en année) <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="dureeannee_dat" class="form-control dureeannee_dat" name="dureeannee_dat"
                                                                        placeholder="Nombre d'année que couvre le placement" pattern="\d+" readonly value="{{ old('dureeannee_dat') }}" required>
                                                                        @error('dureeannee_dat')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror  
                                                                    </div> 

                                                                </div>
        
                                                                <!-- Colonne de droite -->
                                                                <div  style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="nomplacement_dat">Nom du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="nomplacement_dat" class="form-control nomplacement_dat" name="nomplacement_dat" 
                                                                        placeholder="Nom du DAT" value="{{ old('nomplacement_dat') }}" required>
                                                                        @error('nomplacement_dat')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="sgisid_dat">Numéro de compte du produits financiers <span class="text-danger">*</span></label> 
                                                                        <select class="form-control select2" name="sgisid_dat" id="sgisid_dat" required>
                                                                            <option value="">Sélectionnez un numéro de compte</option>
                                                                            @foreach ($sgis as $sgi)
                                                                            <option value="{{$sgi->id}}" > {{ $sgi->num_compte_prod_finan }}</option>                                                                          
                                                                            @endforeach
                                                                        </select>  
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="tauxannuel_dat">Taux annuel <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="tauxannuel_dat" class="form-control tauxannuel_dat" name="tauxannuel_dat"  value="{{ old('tauxannuel_dat') }}" required>
                                                                        @error('tauxannuel_dat')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label>Plages de dates</label>
                                                                        
                                                                        <div class="input-group">
                                                                            <input type="date" class="form-control datestart_dat" name="datestart_dat" placeholder="Date de début" value="{{ old('datestart_dat') }}" required />
                                                                            @error('datestart_dat')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
        
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                            </div>
                                                                            
                                                                            <input type="date" class="form-control dateend_dat" name="dateend_dat" placeholder="Date de fin" value="{{ old('dateend_dat') }}"  required />
                                                                            @error('dateend_dat')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div> 
                                                                    </div>
                                                                    
                                                                </div>     
                                                            </div>
        
                                                            <div class="inp-sub-div">
                                                                <button type="submit" class="btn btn-primary inp-sub-place">Créer</button>
                                                            </div>
                                                                
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane" id="fcp-b2" role="tabpanel" aria-labelledby="fcp-tab-b2">
                                                        <p>Donec pede justo, FCPPPPPPPPfringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                                    </div>
                                                </div>
                                            </div>  
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
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('assetss/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assetss/js/waves.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>


        <!-- Init js -->
        {{-- <script src="{{asset('assetss/pages/jquery.form-pickers.init.js')}}"></script> --}}
        <script src="{{asset('assetss/pages/jquery.form-advanced.init.js')}}"></script>

        <script src="{{asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>


        <!-- Counter js  -->
        <script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>

        <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>

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

        {{-- Script permattant de remplir les champs correspondant lorsque le numéro de compte est sélectionné --}}
        <script>
            $(document).ready(function () {
                // Sélection des éléments HTML
                const $numCompteSelect = $('#num_compte'); // Menu déroulant pour choisir un numéro de compte
                const $ncpfOblInput = $('#ncpf_obl');      // Champ pour afficher le numéro de compte produit financier
                const $nomPlacementInput = $('#nom_placement'); // Champ pour afficher le nom du placement
        
                /**
                 * Fonction pour afficher un message de chargement dans les champs
                 */
                const afficherChargement = () => {
                    $ncpfOblInput.val('Chargement en cours...');
                    $nomPlacementInput.val('Chargement en cours...');
                };
        
                /**
                 * Fonction pour réinitialiser les champs en cas d'erreur ou si aucun compte n'est sélectionné
                 */
                const reinitialiserChamps = () => {
                    $ncpfOblInput.val('');
                    $nomPlacementInput.val('');
                };
        
                /**
                 * Fonction pour remplir les champs avec les données reçues
                 * @param {Object} data - Les données retournées par le serveur
                 */
                const remplirChamps = (data) => {
                    $ncpfOblInput.val(data.num_compte_prod_finan || 'Non disponible');
                    $nomPlacementInput.val(data.nom_placement || 'Non disponible');
                };
        
                /**
                 * Gestion de l'événement "change" sur le champ "num_compte"
                 */
                $numCompteSelect.on('change', function () {
                    const numCompteId = $(this).val(); // Récupérer la valeur sélectionnée dans le menu déroulant
        
                    if (numCompteId) {
                       
                        // Afficher un message de chargement dans les champs
                        afficherChargement();
        
                        // Effectuer une requête avec Fetch API
                        fetch(`/home/creer-un-placement/${numCompteId}`)
                            .then((response) => {
                                if (!response.ok) {
                                    // Si la réponse HTTP est invalide, lever une erreur
                                    throw new Error(`Erreur HTTP : ${response.status}`);
                                }
                                return response.json(); // Convertir la réponse en JSON
                            })
                            .then((data) => {
                                // Vérifier si le serveur a retourné une erreur dans les données
                                if (data.error) {
                                    alert(data.error); // Afficher une alerte avec l'erreur
                                    reinitialiserChamps(); // Réinitialiser les champs
                                    return;
                                }
        
                                // Mettre à jour les champs avec les données reçues
                                remplirChamps(data);
                            })
                            .catch((error) => {
                                // Gestion des erreurs (réseau, serveur, etc.)
                                console.error('Erreur lors de la récupération des données :', error);
                                alert('Une erreur est survenue. Veuillez réessayer plus tard.');
                                reinitialiserChamps(); // Réinitialiser les champs
                            });
                    } else {
                        // Si aucun numéro de compte n'est sélectionné, réinitialiser les champs
                        reinitialiserChamps();
                    }
                });
            });
        </script>
        
        
        {{-- Script permettant de gerer dynamiquement l'affichage de la section SGI pour chaque placement --}}
        <script>
            // $(document).ready(function () {
            //     let formIndex = 0; // Index pour identifier dynamiquement les champs

            //     // Fonction pour ajouter un nouveau bloc
            //     $('.btn-ajsgi').on('click', function () {
            //         formIndex++; // Incrémenter l'index pour les nouveaux blocs
            //         const newFormBlock = `
            //             <div class="row form-block" data-index="${formIndex}">
            //                 <div class="col-lg-6">
            //                     <div class="form-group">
            //                         <label for="sgis_id_${formIndex}">SGI <span class="text-danger">*</span></label>
            //                         <select class="form-control select2" name="sgis[0][id]" id="sgis_id_${formIndex}" required>
            //                             <option value="">Sélectionnez une SGI</option>
            //                             @foreach ($sgis as $sgi)
            //                                 <option value="{{ $sgi->id }}">{{ $sgi->code_sgi }} ({{ $sgi->num_compte_tresor }})</option>
            //                             @endforeach
            //                         </select>
            //                     </div>
            //                     <div class="form-group">
            //                         <label for="valeur_titre_${formIndex}">Valeur du titre <span class="text-danger">*</span></label>
            //                         <input type="text" class="form-control valeur_titre" name="sgis[0][valeur_titre]" id="valeur_titre_${formIndex}"
            //                             placeholder="La valeur du titre." data-parsley-type="number" pattern="\\d+" required />
            //                     </div>
            //                     <div class="form-group">
            //                         <label for="gain_${formIndex}">Gain total <span class="text-danger">*</span></label>
            //                         <input type="text" id="gain_${formIndex}" class="form-control gain" name="sgis[0][gain]"
            //                             placeholder="(Valeur du titre - Valeur d'acquisition du titre)" data-parsley-type="number"
            //                             pattern="\\d+"  required>
            //                     </div>
            //                 </div>
            //                 <div class="col-lg-6">
            //                     <div class="form-group">
            //                         <label for="nbre_titre_${formIndex}">Nombre de titre <span class="text-danger">*</span></label>
            //                         <input type="text" class="form-control nbre_titre" name="sgis[0][nbre_titre]" id="nbre_titre_${formIndex}"
            //                             placeholder="Le nombre de titre." data-parsley-type="number" pattern="\\d+" required>
            //                     </div>
            //                     <div class="form-group">
            //                         <label for="vacq_titre_${formIndex}">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
            //                         <input type="text" class="form-control vacq_titre" name="sgis[0][vacq_titre]" id="vacq_titre_${formIndex}"
            //                             placeholder="La valeur d'acquisition du titre." data-parsley-type="number" pattern="\\d+" required>
            //                     </div>
            //                 </div>
            //                 <!-- Bouton Retirer uniquement sur les blocs dupliqués -->
            //                 <div class="col-12 text-right">
            //                     <button type="button" class="btn btn-secondary btn-retirer waves-effect">Retirer</button>
            //                 </div>
            //             </div>
            //             <hr>`;
                    
            //         // Ajouter le nouveau bloc et le <hr> dans le conteneur
            //         $('.container-dynamic').append(newFormBlock);

            //         // Réinitialiser Select2 pour les nouveaux champs
            //         $(`#sgis_id_${formIndex}`).select2();
            //     });

            //     // Fonction pour retirer un bloc
            //     $(document).on('click', '.btn-retirer', function () {
            //         // Supprimer le bloc parent et le <hr> associé
            //         $(this).closest('.form-block').next('hr').remove(); // Supprimer le <hr>
            //         $(this).closest('.form-block').remove(); // Supprimer le bloc
            //     });

            //     // Initialiser Select2 pour les champs de base
            //     $('.select2').select2();

            //     // Masquer le bouton "Retirer" sur le premier bloc
            //     $('.form-block:first').find('.btn-retirer').hide();
            // });

            $(document).ready(function () {
                let formIndex = 0;

                // Fonction pour ajouter un nouveau bloc
                $('.btn-ajsgi').on('click', function () {
                    formIndex++;
                    const newFormBlock = `
                        <div class="row form-block" data-index="${formIndex}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sgis_id_${formIndex}">SGI <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="sgis[${formIndex}][id]" id="sgis_id_${formIndex}" required>
                                        <option value="">Sélectionnez une SGI</option>
                                        @foreach ($sgis as $sgi)
                                            <option value="{{ $sgi->id }}">{{ $sgi->code_sgi }} ({{ $sgi->num_compte_tresor }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="valeur_titre_${formIndex}">Valeur du titre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control valeur_titre" name="sgis[${formIndex}][valeur_titre]" id="valeur_titre_${formIndex}"
                                        placeholder="La valeur du titre." data-parsley-type="number" required>
                                        @error('sgis.*.valeur_titre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gain_${formIndex}">Gain total <span class="text-danger">*</span></label>
                                    <input type="text" id="gain_${formIndex}" class="form-control gain" name="sgis[${formIndex}][gain]"
                                        placeholder="(Valeur du titre - Valeur d'acquisition du titre)" data-parsley-type="number" required>
                                        @error('sgis.*.gain')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nbre_titre_${formIndex}">Nombre de titre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control nbre_titre" name="sgis[${formIndex}][nbre_titre]" id="nbre_titre_${formIndex}"
                                        placeholder="Le nombre de titre." data-parsley-type="number" required>
                                        @error('sgis.*.nbre_titre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="vacq_titre_${formIndex}">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control vacq_titre" name="sgis[${formIndex}][vacq_titre]" id="vacq_titre_${formIndex}"
                                        placeholder="La valeur d'acquisition du titre." data-parsley-type="number" required>
                                        @error('sgis.*.vacq_titre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-secondary btn-retirer waves-effect">Retirer</button>
                            </div>
                        </div>
                        <hr>`;
                    $('.container-dynamic').append(newFormBlock);

                    // Initialiser Select2 pour le nouveau bloc
                    $(`#sgis_id_${formIndex}`).select2();
                });

                // Fonction pour retirer un bloc
                $(document).on('click', '.btn-retirer', function () {
                    $(this).closest('.form-block').next('hr').remove();
                    $(this).closest('.form-block').remove();
                });

                // Initialiser Select2 pour le premier bloc
                $('.select2').select2();

                // Masquer le bouton "Retirer" du premier bloc
                $('.form-block:first').find('.btn-retirer').hide();
            });

        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Champ pour l'onglet OBLIGATION
                const typePlacementOblInput = document.getElementById('type_placement');

                // Champ pour l'onglet ACTION
                const typePlacementActInput = document.getElementById('typeplacement_act');

                // Champ pour l'onglet DAT
                const typePlacementDatInput = document.getElementById('typeplacement_dat');

                // Par défaut, définir le champ OBLIGATIONS à "OBLIGATIONS"
                if (typePlacementOblInput) {
                    typePlacementOblInput.value = 'OBLIGATIONS';
                }

                // Par défaut, définir le champ ACTIONS à "ACTIONS"
                if (typePlacementActInput) {
                    typePlacementActInput.value = 'ACTIONS';
                }

                // Par défaut, définir le champ DAT à "DAT"
                if (typePlacementDatInput) {
                    typePlacementDatInput.value = 'DAT';
                }

                // Sélectionnez tous les liens des onglets
                const tabs = document.querySelectorAll('.nav-link');

                // Ajoutez un écouteur de clic pour chaque onglet
                tabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        // Récupérez le texte de l'onglet cliqué
                        const placementType = this.innerText.trim();

                        // Mettez à jour le champ correspondant en fonction du type
                        if (placementType === 'OBLIGATIONS' && typePlacementOblInput) {
                            typePlacementOblInput.value = placementType;
                        } else if (placementType === 'ACTIONS' && typePlacementActInput) {
                            typePlacementActInput.value = placementType;
                        } else if (placementType === 'DAT' && typePlacementDatInput) {
                            typePlacementDatInput.value = placementType;
                        }
                    });
                });
            });
        </script>

        <script>
            $("input[name='taux_annuel']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.01,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });

            $("input[name='tauxannuel_dat']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.01,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
        </script>

        <script>
            !function ($) {  
                "use strict";  
            
                var SweetAlert = function () {};  
            
                //examples  
                SweetAlert.prototype.init = function () {  
                    //----------------------OBLIGATIONS------------------------------
                        // Success Message when page loads with session success  
                        if ({{ session('success_obligations') ? 'true' : 'false' }}) {  
                            Swal.fire(  
                                {  
                                    title: 'Succès',  
                                    text: '{{ session("success_obligations") }}',  
                                    type: 'success',  
                                    confirmButtonColor: '#4fa7f3'  
                                }  
                            );  
                        }

                        // Message d'erreur quand la page se charge avec session error  
                        if ({{ session('error_obligations') ? 'true' : 'false' }}) {  
                            Swal.fire({  
                                title: 'Erreur',  
                                text: '{{ session("error_obligations") }}',  
                                type: 'error',  
                                confirmButtonColor: '#f27474'  
                            });  
                        }
                    //-------------------------------------------------------------------------  
                    
                    //----------------------ACTIONS--------------------------------------------
                        if ({{ session('success_action') ? 'true' : 'false' }}) {  
                            Swal.fire(  
                                {  
                                    title: 'Succès',  
                                    text: '{{ session("success_action") }}',  
                                    type: 'success',  
                                    confirmButtonColor: '#4fa7f3'  
                                }  
                            );  
                        }

                        // Message d'erreur quand la page se charge avec session error  
                        if ({{ session('error_action') ? 'true' : 'false' }}) {  
                            Swal.fire({  
                                title: 'Erreur',  
                                text: '{{ session("error_action") }}',  
                                type: 'error',  
                                confirmButtonColor: '#f27474'  
                            });  
                        }
                    //-------------------------------------------------------------------------  

                    //----------------------DAT------------------------------
                        // Success Message when page loads with session success  
                        if ({{ session('success_dat') ? 'true' : 'false' }}) {  
                            Swal.fire(
                                {  
                                    title: 'Succès',  
                                    text: '{{ session("success_dat") }}',  
                                    type: 'success',  
                                    confirmButtonColor: '#4fa7f3'  
                                }  
                            );  
                        }

                        // Message d'erreur quand la page se charge avec session error  
                        if ({{ session('error_dat') ? 'true' : 'false' }}) {  
                            Swal.fire({  
                                title: 'Erreur',  
                                text: '{{ session("error_dat") }}',  
                                type: 'error',  
                                confirmButtonColor: '#f27474'  
                            });  
                        }
                    //-------------------------------------------------------------------------  

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

        {{-- Script de calcul des diférents champs pour OBLIGATIONS --}}
        <script>
            //Script pour calculer le taux periode 
            document.addEventListener("DOMContentLoaded", function() {
                const tauxAnnuelInput = document.querySelector("input[name='taux_annuel']");
                const periodiciteSelect = document.querySelector("#periodicite");
                const tauxPeriodeInput = document.querySelector("#taux_periode");
        
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
                $("input[name='taux_annuel']").on('touchspin.on.stopspin', function() {
                    calculateTauxPeriode();
                });
            });

            //---------------------------------Script pour calculer le gain ----------

                $(document).ready(function () {
                    // Fonction pour calculer le gain
                    function calculateGain() {
                        // Parcourir chaque groupe de champs
                        $('.valeur_titre').each(function (index) {
                            const $valeurTitreInput = $(this); // Champ valeur_titre courant
                            const $valeurAcquisitionInput = $('.vacq_titre').eq(index); // Champ vacq_titre correspondant
                            const $gainInput = $('.gain').eq(index); // Champ gain correspondant

                            // Récupération des valeurs et conversion en float
                            const valeurTitre = parseFloat($valeurTitreInput.val());
                            const valeurAcquisition = parseFloat($valeurAcquisitionInput.val());

                            // Vérification des valeurs numériques
                            if (!isNaN(valeurTitre) && !isNaN(valeurAcquisition)) {
                                const gain = valeurTitre - valeurAcquisition; // Calcul du gain

                                // Affichage du gain formaté (sans .00 si entier)
                                $gainInput.val(Number.isInteger(gain) ? gain : gain.toFixed(3).replace(/\.00$/, ''));
                            } else {
                                $gainInput.val(''); // Réinitialisation si les valeurs sont invalides
                            }
                        });
                    }

                    // Ajout des gestionnaires d'événements
                    $(document).on('input', '.valeur_titre, .vacq_titre', calculateGain);
                });

            // -----------------------------------------------------------------------


            // -------------------------------Script permettant de calculer la durée en année ---------------------
                // Sélection des champs de date et de durée via leurs classes
                const dateStartInput = document.querySelector('.date_start');
                const dateEndInput = document.querySelector('.date_end');
                const dureeAnneeInput = document.querySelector('.duree_annee');

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
            // -------------------------------------------------------------------------------------------------------

        </script>

        {{-- Script de calcul des diférents champs pour ACTIONS --}}
        <script>
            // -------------------------------Script permettant de calculer la durée en année ---------------------
                $(document).ready(function () {
                    // Sélection des champs de date et de durée via leurs classes
                    const $dateStartInput = $('.datestart_act'); // Champ "Date de début"
                    const $dateEndInput = $('.dateend_act'); // Champ "Date de fin"
                    const $dureeAnneeInput = $('.dureeannee_act'); // Champ "Durée (en années)"

                    // Fonction pour calculer la différence en années
                    function calculateDuration() {
                        // Récupération des dates sélectionnées
                        const dateStartAct = new Date($dateStartInput.val());
                        const dateEndAct = new Date($dateEndInput.val());

                        // Validation : Les dates doivent être valides et la date de fin >= date de début
                        if (!isNaN(dateStartAct) && !isNaN(dateEndAct) && dateEndAct >= dateStartAct) {
                            const startYear = dateStartAct.getFullYear(); // Année de début
                            const endYear = dateEndAct.getFullYear(); // Année de fin
                            const duration = endYear - startYear; // Calculer la différence en années

                            // Affecter la durée dans le champ correspondant
                            $dureeAnneeInput.val(duration);
                        } else {
                            // Réinitialiser si les dates sont invalides
                            $dureeAnneeInput.val('');
                        }
                    }

                    // Ajouter des écouteurs d'événements sur les champs de dates
                    $dateStartInput.on('change', calculateDuration);
                    $dateEndInput.on('change', calculateDuration);
                });
            // -------------------------------------------------------------------------------------------------------

            // ------------------------------- Script pour calculer le gain -------------------------------
                $(document).ready(function () {
                    // Sélection des champs de saisie via leurs classes
                    const $valeurTitreInput = $('.valeurtitre_act'); // Champ "Valeur Titre"
                    const $valeurAcquisitionInput = $('.vacqtitre_act'); // Champ "Valeur d'Acquisition"
                    const $gainInput = $('.gain_act'); // Champ "Gain"

                    // Fonction pour calculer le gain
                    function calculateGain() {
                        // Récupération des valeurs des champs
                        const valeurTitre = parseFloat($valeurTitreInput.val());
                        const valeurAcquisition = parseFloat($valeurAcquisitionInput.val());

                        // Vérification : Les valeurs doivent être des nombres valides
                        if (!isNaN(valeurTitre) && !isNaN(valeurAcquisition)) {
                            let gain = valeurTitre - valeurAcquisition; // Calcul du gain

                            // Condition pour afficher un nombre entier ou avec 3 décimales maximum
                            $gainInput.val(Number.isInteger(gain) ? gain : gain.toFixed(3).replace(/\.00$/, ''));
                        } else {
                            // Réinitialiser si les champs ne contiennent pas de valeurs valides
                            $gainInput.val('');
                        }
                    }

                    // Ajouter des écouteurs d'événements sur les champs de valeur
                    $valeurTitreInput.on('input', calculateGain);
                    $valeurAcquisitionInput.on('input', calculateGain);
                });
            // -------------------------------------------------------------------------------------------


        </script>

        {{-- Script de calcul des diférents champs pour DAT --}}
        <script>
            //Script pour calculer le taux periode 
            $(document).ready(function () {
                // Fonction pour calculer le taux période
                function calculateDatTauxPeriode() {
                    // Récupération et stockage des valeurs dans des variables
                    const $tauxAnnuelInput = $('.tauxannuel_dat'); // Champ "Taux Annuel"
                    const $periodiciteInput = $('.periodicite_dat'); // Champ "Périodicité"
                    const $tauxPeriodeInput = $('.tauxperiode_dat'); // Champ "Taux Période"

                    // Conversion et extraction des valeurs
                    const tauxAnnuel = parseFloat($tauxAnnuelInput.val()); // Valeur du taux annuel
                    const periodicite = $periodiciteInput.val(); // Valeur de la périodicité

                    // Initialisation du taux période
                    let tauxPeriode = 0;

                    // Vérification du taux annuel valide
                    if (isNaN(tauxAnnuel) || tauxAnnuel < 0) {
                        $tauxPeriodeInput.val(''); // Réinitialise si le taux annuel est invalide
                        return;
                    }

                    // Calcul du taux période selon la périodicité
                    switch (periodicite) {
                        case 'Mensuel':
                            tauxPeriode = tauxAnnuel / 12;
                            break;
                        case 'Trimestre':
                            tauxPeriode = tauxAnnuel / 4;
                            break;
                        case 'Semestre':
                            tauxPeriode = tauxAnnuel / 2;
                            break;
                        case 'Annuel':
                            tauxPeriode = tauxAnnuel;
                            break;
                        default:
                            tauxPeriode = 0; // Réinitialise si aucune périodicité n'est sélectionnée
                    }

                    // Mise à jour du champ "Taux période"
                    $tauxPeriodeInput.val(tauxPeriode.toFixed(2)); // Formate en 2 décimales
                }

                // Écoute des changements sur les champs
                $('.tauxannuel_dat, .periodicite_dat').on('input change', function () {
                    calculateDatTauxPeriode();
                });
            });

            //Script du calcul de la durée en année
            $(document).ready(function () {
                // Fonction pour calculer la durée en années en utilisant uniquement les années
                function calculerDureeEnAnnees() {
                    // Récupération des champs DOM et des valeurs
                    const $dateStartInput = $('.datestart_dat'); // Champ "Date de début"
                    const $dateEndInput = $('.dateend_dat'); // Champ "Date de fin"
                    const $dureeAnneeInput = $('.dureeannee_dat'); // Champ "Durée (en années)"

                    // Extraction des années à partir des dates saisies
                    const dateStart = new Date($dateStartInput.val());
                    const dateEnd = new Date($dateEndInput.val());

                    // Validation : Vérifier si les dates sont valides
                    if (isNaN(dateStart.getTime()) || isNaN(dateEnd.getTime())) {
                        $dureeAnneeInput.val(''); // Réinitialise le champ "Durée" si une date est invalide
                        return;
                    }

                    // Récupérer uniquement les années des dates
                    const anneeStart = dateStart.getFullYear(); // Année de la date de début
                    const anneeEnd = dateEnd.getFullYear(); // Année de la date de fin

                    // Calcul de la différence entre les années
                    const dureeEnAnnees = anneeEnd - anneeStart;

                    // Vérifier si la durée est négative (date de fin avant date de début)
                    if (dureeEnAnnees < 0) {
                        $dureeAnneeInput.val(''); // Réinitialise si la date de fin est avant la date de début
                        return;
                    }

                    // Mise à jour du champ "Durée (en années)" avec le résultat
                    $dureeAnneeInput.val(dureeEnAnnees);
                }

                // Ajouter des écouteurs d'événements sur les champs de dates
                $('.datestart_dat, .dateend_dat').on('change', function () {
                    calculerDureeEnAnnees(); // Appelle la fonction lorsque l'une des dates est modifiée
                });
            });
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
        </script>    --}}
    
    </body>
</html>