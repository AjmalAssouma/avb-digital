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
                                                <form action="{{route('creation.placement')}}" method="POST">
                                                
                                                    @csrf
                                                    
                                                    <ul class="nav nav-tabs tabs-bordered nav-justified" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="obl-tab-b2" data-toggle="tab" href="#obl-b2" role="tab" aria-controls="obl-b2" aria-selected="false">
                                                                <span class="d-block d-sm-none">OBLIGATION</span>
                                                                <span class="d-none d-sm-block">OBLIGATION</span>
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link " id="action-tab-b2" data-toggle="tab" href="#action-b2" role="tab" aria-controls="action-b2" aria-selected="true">
                                                                <span class="d-block d-sm-none">ACTION</span>
                                                                <span class="d-none d-sm-block">ACTION <br></span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="dat-tab-b2" data-toggle="tab" href="#dat-b2" role="tab" aria-controls="dat-b2" aria-selected="false">
                                                                <span class="d-block d-sm-none">DAT</span>
                                                                <span class="d-none d-sm-block">DAT (Dépôt A Terme)</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="fcp-tab-b2" data-toggle="tab" href="#fcp-b2" role="tab" aria-controls="fcp-b2" aria-selected="false">
                                                                <span class="d-block d-sm-none">FCP</span>
                                                                <span class="d-none d-sm-block">FCP (Fonds Commun de Placement)</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane show active" id="obl-b2" role="tabpanel" aria-labelledby="obl-tab-b2">
                                                            <br>

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
                                                                        <label for="nbre_titre">Nombre de titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control nbre_titre" name="nbre_titre" id="nbre_titre" 
                                                                        placeholder="Le nombre de titre pour ce placement." data-parsley-type="number" pattern="\d+" value="{{ old('nbre_titre') }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="vacq_titre">Valeur d'acquisition du titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control vacq_titre" name="vacq_titre" id="vacq_titre" 
                                                                        placeholder="La valeur d'acquisition du titre." data-parsley-type="number" pattern="\d+" oninput="calculateGain()" value="{{ old('vacq_titre') }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="duree_annee">Durée (en année) <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="duree_annee" class="form-control duree_annee" name="duree_annee"
                                                                        placeholder="Nombre d'année que couvre le placement" pattern="\d+" oninput="calculateGain()" value="{{ old('duree_annee') }}" required>
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
                                                                        <select class="form-control select2" name="sgis_id" id="sgis_id"  required>
                                                                            <option value="">Sélectionnez une SGI</option>
                                                                            @foreach ($sgis as $sgi)
                                                                            <option value="{{$sgi->id}}" > {{$sgi->code_sgi}} ({{ $sgi->num_compte_prod_finan }}) </option>                                                                          
                                                                            @endforeach
                                                                        </select>  
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="valeur_titre">Valeur du titre <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control valeur_titre" name="valeur_titre" id="valeur_titre" 
                                                                        placeholder="La valeur du titre pour ce placement." data-parsley-type="number" oninput="calculateGain()" pattern="\d+" value="{{ old('valeur_titre') }}"  required />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Plages de dates</label>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <input type="date" class="form-control" name="date_start" placeholder="Date de début" value="{{ old('date_start') }}" required />
                                                                                @error('date_start')
                                                                                    <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            
                                                                            
                                                                            <div>
                                                                                <span class="input-group-text bg-custom text-white b-0">à</span>
                                                                            </div>

                                                                            <div class="col">
                                                                                <input type="date" class="form-control" name="date_end" placeholder="Date de fin" value="{{ old('date_end') }}"  required />
                                                                                @error('date_end')
                                                                                    <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="gain">Gain total du produit financier <span class="text-danger">*</span> </label>
                                                                        <input type="text" id="gain" class="form-control gain" name="gain" 
                                                                        placeholder="(Valeur du titre - Valeur d'acquisition du titre) * Durée" data-parsley-type="number" pattern="\d+" value="{{ old('gain') }}" readonly required>
                                                                        @error('gain')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                            
                                                            </div>
                                                            
                                                            <div class="inp-sub-div">
                                                                <button type="submit"  class="btn btn-primary inp-sub-place">Créer</button>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane show" id="action-b2" role="tabpanel" aria-labelledby="action-tab-b2">
                                                            <p>Donec pede justo, ACTIONNNNNNNNfringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
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
        {{-- <script src="{{asset('assetss/pages/jquery.form-pickers.init.js')}}"></script> --}}
        <script src="{{asset('assetss/pages/jquery.form-advanced.init.js')}}"></script>

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

            document.querySelector('.valeur_titre').addEventListener('input', calculateGain);
            document.querySelector('.vacq_titre').addEventListener('input', calculateGain);
            document.querySelector('.duree_annee').addEventListener('input', calculateGain);

            function calculateGain() {
                const valeurTitre = parseFloat(document.querySelector('.valeur_titre').value);
                const valeurAcquisition = parseFloat(document.querySelector('.vacq_titre').value);
                const duree = parseInt(document.querySelector('.duree_annee').value);

                // On vérifie si les champs nécessaires ont bien des valeurs numériques
                if (!isNaN(valeurTitre) && !isNaN(valeurAcquisition) && !isNaN(duree)) {
                    let gain = (valeurTitre - valeurAcquisition) * duree;
                    
                    // Condition pour afficher sans .00 si le gain est un entier
                    document.querySelector('.gain').value = Number.isInteger(gain) ? gain : gain.toFixed(2).replace(/\.00$/, '');
                }
            }
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const typePlacementInput = document.getElementById('type_placement');
                
                // Par défaut, la valeur est "OBLIGATION"
                typePlacementInput.value = 'OBLIGATION';

                // Sélectionnez tous les liens des onglets
                const tabs = document.querySelectorAll('.nav-link');

                // Ajoutez un écouteur de clic pour chaque onglet
                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        // Récupérez le texte de l'onglet cliqué
                        const placementType = this.innerText.trim();

                        // Mettez à jour le champ Type de placement
                        typePlacementInput.value = placementType;
                    });
                });
            });
        </script>

        <script>  
            !function ($) {  
                "use strict";  
            
                var SweetAlert = function () {};  
            
                //examples  
                SweetAlert.prototype.init = function () {  
                    // Success Message when page loads with session success  
                    if ({{ session('success') ? 'true' : 'false' }}) {  
                        Swal.fire(  
                            {  
                                title: 'Succès',  
                                text: '{{ session("success") }}',  
                                type: 'success',  
                                confirmButtonColor: '#4fa7f3'  
                            }  
                        );  
                    }   
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