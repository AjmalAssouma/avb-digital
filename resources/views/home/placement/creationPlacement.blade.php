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
                                                           
                                                            <br>
                                                            @if(session('success_obligation'))
                                                                <div class="alert alert-icon alert-success alert-dismissible fade show justify-content-center col-sm-6 col-md-6" style="margin: 0 auto; margin-top: -10px; margin-bottom: 15px;" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <i class="mdi mdi-check-all"></i>
                                                                    {{ session('success_obligation') }}
                                                                </div>
                                                            @endif 
                                                            
                                                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                                <!-- Colonne de gauche -->
                                                                <div style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="type_placement">Type du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="type_placement" class="form-control type_placement" name="type_placement" placeholder="OBLIGATION" required>
                                                                        @error('type_placement')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="num_compte">Numéro de compte <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control num_compte" name="num_compte" id="num_compte" 
                                                                        placeholder="Le numéro de compte doit etre uniquement composé de chiffre"  data-parsley-type="number" pattern="\d+" value="{{ old('num_compte') }}" required>
                                                                        @error('num_compte')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="periodicite">Périodicité <span class="text-danger">*</span> </label>
                                                                        <select  class="form-control" name="periodicite" id="periodicite" required style="cursor: pointer">
                                                                            <option value="">Sélectionnez une périodicité.</option>
                                                                            <option value="Trimestre">Trimestre</option>
                                                                            <option value="Semestre">Semestre</option>
                                                                            <option value="Annuel">Annuel</option>
                                                                        </select>
                                                                    </div>
        
                                                                    <div class="form-group">  
                                                                        <label for="taux_periode">Taux période <span class="text-danger">*</span></label>  
                                                                        <div class="input-group">  
                                                                            <input type="text" id="taux_periode" class="form-control taux_periode" name="taux_periode" value="{{old('taux_periode')}}" required readonly>  
                                                                            <div class="input-group-append">  
                                                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-percent"></i></span>  
                                                                            </div>
                                                                            @error('taux_periode')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror  
                                                                        </div>    
                                                                    </div>  
        
                                                                    <div class="form-group">
                                                                        <label for="valeur_titre">Valeur du titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control valeur_titre" name="valeur_titre" id="valeur_titre" 
                                                                        placeholder="La valeur du titre pour ce placement." data-parsley-type="number" oninput="calculateGain()" pattern="\d+" value="{{ old('valeur_titre') }}"  required />
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label>Plages de dates</label>
                                                                        
                                                                        <div class="input-group">
                                                                            <input type="date" class="form-control date_start" name="date_start" placeholder="Date de début" value="{{ old('date_start') }}" required />
                                                                            @error('date_start')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
        
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                            </div>
                                                                            
                                                                            <input type="date" class="form-control date_end" name="date_end" placeholder="Date de fin" value="{{ old('date_end') }}"  required />
                                                                            @error('date_end')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div> 
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="gain">Gain total <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="gain" class="form-control gain" name="gain" 
                                                                        placeholder="(Valeur du titre - Valeur d'acquisition du titre)" data-parsley-type="number" pattern="\d+" value="{{ old('gain') }}" readonly required>
                                                                        @error('gain')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    
                                                                </div>
        
                                                                <!-- Colonne de droite -->
                                                                <div  style="flex: 1;">
        
                                                                    <div class="form-group">
                                                                        <label for="nom_placement">Nom du placement <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="nom_placement" class="form-control nom_placement" name="nom_placement" 
                                                                        placeholder="Type de placement + taux annuel + année debut - année fin." value="{{ old('nom_placement') }}" required>
                                                                        @error('nom_placement')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="sgis_id">SGI <span class="text-danger">*</span></label> 
                                                                        <select class="form-control select2" name="sgis_id" id="sgis_id" required>
                                                                            <option value="">Sélectionnez une SGI</option>
                                                                            @foreach ($sgis as $sgi)
                                                                            <option value="{{$sgi->id}}" > {{$sgi->code_sgi}} ({{ $sgi->num_compte_prod_finan }}) </option>                                                                          
                                                                            @endforeach
                                                                        </select>  
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="taux_annuel">Taux annuel <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="taux_annuel" class="form-control taux_annuel" name="taux_annuel" value="{{old('taux_annuel')}}" required>
                                                                        @error('taux_annuel')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="nbre_titre">Nombre de titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control nbre_titre" name="nbre_titre" id="nbre_titre" 
                                                                        placeholder="Le nombre de titre pour ce placement." data-parsley-type="number" pattern="\d+" value="{{ old('nbre_titre') }}" oninput="calculateGain()" required>
                                                                    </div>
        
                                                                    <div class="form-group">
                                                                        <label for="vacq_titre">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control vacq_titre" name="vacq_titre" id="vacq_titre" 
                                                                        placeholder="La valeur d'acquisition du titre." data-parsley-type="number" pattern="\d+" oninput="calculateGain()" value="{{ old('vacq_titre') }}" required>
                                                                    </div>
        
                                                                
        
                                                                    <div class="form-group">
                                                                        <label for="duree_annee">Durée (en année) <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="duree_annee" class="form-control duree_annee" name="duree_annee"
                                                                        placeholder="Nombre d'année que couvre le placement" value="{{ old('duree_annee') }}" pattern="\d+" readonly required>
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
                                                                        placeholder="Type de placement + taux annuel + année debut - année fin." value="{{ old('nomplacement_act') }}" required>
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

                                                    <div class="tab-pane" id="dat-b2" role="tabpanel" aria-labelledby="dat-tab-b2">
                                                        <p>Lorem ipsum dolor DATTTTTTTsit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                                        <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Champ pour l'onglet OBLIGATION
                const typePlacementOblInput = document.getElementById('type_placement');

                // Champ pour l'onglet ACTION
                const typePlacementActInput = document.getElementById('typeplacement_act');

                // Par défaut, définir le champ OBLIGATION à "OBLIGATION"
                if (typePlacementOblInput) {
                    typePlacementOblInput.value = 'OBLIGATIONS';
                }

                // Par défaut, définir le champ ACTION à "ACTION"
                if (typePlacementActInput) {
                    typePlacementActInput.value = 'ACTIONS';
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
                document.querySelector('.valeur_titre').addEventListener('input', calculateGain);
                document.querySelector('.vacq_titre').addEventListener('input', calculateGain);

                function calculateGain() {
                    const valeurTitre = parseFloat(document.querySelector('.valeur_titre').value);
                    const valeurAcquisition = parseFloat(document.querySelector('.vacq_titre').value);

                    // On vérifie si les champs nécessaires ont bien des valeurs numériques
                    if (!isNaN(valeurTitre) && !isNaN(valeurAcquisition)) {
                        let gain = (valeurTitre - valeurAcquisition);
                        
                        // Condition pour afficher sans .00 si le gain est un entier
                        document.querySelector('.gain').value = Number.isInteger(gain) ? gain : gain.toFixed(3).replace(/\.00$/, '');
                    }else{
                        document.querySelector('.gain').value = '';
                    }
                }
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

        <script>  
            !function ($) {  
                "use strict";  
            
                var SweetAlert = function () {};  
            
                //examples  
                SweetAlert.prototype.init = function () {  
                    //----------------------OBLIGATIONS------------------------------
                        // Success Message when page loads with session success  
                        if ({{ session('success_obligation') ? 'true' : 'false' }}) {  
                            Swal.fire(  
                                {  
                                    title: 'Succès',  
                                    text: '{{ session("success_obligation") }}',  
                                    type: 'success',  
                                    confirmButtonColor: '#4fa7f3'  
                                }  
                            );  
                        }

                        // Message d'erreur quand la page se charge avec session error  
                        if ({{ session('error_obligation') ? 'true' : 'false' }}) {  
                            Swal.fire({  
                                title: 'Erreur',  
                                text: '{{ session("error_obligation") }}',  
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


        {{-- Script de calcul des diférents champs pour ACTIONS --}}
        <script>
            // -------------------------------Script permettant de calculer la durée en année ---------------------
                // Sélection des champs de date et de durée via leurs classes
                const dateStartActionsInput = document.querySelector('.datestart_act');
                const dateEndActionsInput = document.querySelector('.dateend_act');
                const dureeAnneeActionsInput = document.querySelector('.dureeannee_act');

                // Fonction pour calculer la différence en années
                function calculateDuration() {
                    const dateStartAct = new Date(dateStartActionsInput.value);
                    const dateEndAct = new Date(dateEndActionsInput.value);

                    if (dateStartAct && dateEndAct && dateEndAct >= dateStartAct) {
                    const startYear = dateStartAct.getFullYear(); // Année de début
                    const endYear = dateEndAct.getFullYear();     // Année de fin
                    const duration = endYear - startYear;      // Différence en années

                    dureeAnneeActionsInput.value = duration;          // Affecter la durée

                    } else {
                        dureeAnneeActionsInput.value = ''; // Réinitialiser si les dates sont invalides
                    }
                }

                // Ajouter des écouteurs d'événements pour recalculer à chaque changement
                dateStartActionsInput.addEventListener('change', calculateDuration);
                dateEndActionsInput.addEventListener('change', calculateDuration);
            // -------------------------------------------------------------------------------------------------------


            //---------------------------------Script pour calculer le gain ----------
                document.querySelector('.valeurtitre_act').addEventListener('input', calculateGain);
                document.querySelector('.vacqtitre_act').addEventListener('input', calculateGain);

                function calculateGain() {
                    const valeurTitreActions = parseFloat(document.querySelector('.valeurtitre_act').value);
                    const valeurAcquisitionActions = parseFloat(document.querySelector('.vacqtitre_act').value);

                    // On vérifie si les champs nécessaires ont bien des valeurs numériques
                    if (!isNaN(valeurTitreActions) && !isNaN(valeurAcquisitionActions)) {
                        let gainActions = (valeurTitreActions - valeurAcquisitionActions);
                        
                        // Condition pour afficher sans .00 si le gain est un entier
                        document.querySelector('.gain_act').value = Number.isInteger(gainActions) ? gainActions : gainActions.toFixed(3).replace(/\.00$/, '');
                    }else{
                        document.querySelector('.gain_act').value = '';
                    }
                }
            // -----------------------------------------------------------------------

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