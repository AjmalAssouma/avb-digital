<!DOCTYPE html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') . ' | PROFIL UTILISATEUR'}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="L'Africaine Vie Bénin SA" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/logoAAVIE')}}.png">
        <!-- C3 charts css -->
        <link href="{{asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />
        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('assetss/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
         <!-- Importation de Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>

        <style>
            .btn-customm {
                background-color: #38af4a ; /* Vert sombre */
                color: white;
                padding: 5px 10px; /* Ajuste le padding pour rendre le bouton plus petit */
                font-size: 14px; /* Taille du texte plus petite */
                border-radius: 6px; /* Optionnel : légèrement arrondi */
                border: none; /* Enlève la bordure */
            }

            .btn-customm:hover {
                background-color: #38af4a ; /* Couleur plus foncée au survol */
            }
        </style>
    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ route('home') }}" class="logo">
                        <span>
                            <img src="{{asset('assets/img/logoAAVIE.png')}}" alt="" height="90" width="190">
                        </span>
                    </a>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Navbar-left -->
                        <ul class="nav navbar-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-right list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('logout') }}" class="right-menu-item text-white dropdown-toggle">
                                    <i class="dripicons-exit"></i>
                                </a>
                            </li>

                            <li class="dropdown user-box list-inline-item">
                                {{-- <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}" alt="user-img" class="rounded-circle user-img">
                                </a> --}}

                                <a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img 
                                        src="{{ auth()->check() && auth()->user()->profile_photo 
                                                ? (file_exists(storage_path('app/public/' . auth()->user()->profile_photo)) 
                                                    ? asset('storage/' . auth()->user()->profile_photo) 
                                                    : asset('assetss/images/icons/businessman.svg')) 
                                                : asset('assetss/images/icons/businessman.svg')}}" 
                                        alt="user-img" 
                                        class="rounded-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="{{route('home.userprofil')}}" class="dropdown-item">Profile</a></li>
                                    <li><a href="" class="dropdown-item"><span class="badge badge-pill badge-info float-right">4</span>Paramètres</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a href="{{ route('logout') }}" class="dropdown-item">Déconnexion</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container-fluid -->
                </div><!-- end navbar -->
            </div>         
                     
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">MENU</li>
                            <li>
                                <a href="{{ route('home') }}"><i class="fi-air-play"></i><span class="badge badge-pill badge-success float-right"></span> <span>Tableau de bord</span> </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->
            </div>

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
                                    <h4 class="page-title">Profile</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{ route('home.userprofil') }}">Utilisateur</a>
                                        </li>
                                    
                                        <li class="active">
                                            Profile
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <div class="profile-photo-wrapper text-center">
                                            {{-- <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}" alt="avatar" id="profile-photo-preview" class="rounded-circle img-fluid"> --}}
                                            
                                            <img src="{{ auth()->check() && auth()->user()->profile_photo 
                                            ? (file_exists(storage_path('app/public/' . auth()->user()->profile_photo)) 
                                                ? asset('storage/' . auth()->user()->profile_photo) 
                                                : asset('assetss/images/icons/businessman.svg')) 
                                            : asset('assetss/images/icons/businessman.svg')}}" 
                                            alt="avatar" 
                                            id="profile-photo-preview" 
                                            class="rounded-circle img-fluid">

                                            <label for="profile_photo" class="edit-icon">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                        
                                        <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="profile_photo" id="profile_photo" accept="image/*" onchange="previewPhoto()">
                                            <button type="submit" class="btn btn-customm mt-3">Modifier</button>
                                        </form>
                                        

                                        <div class="container" style="font-size: 15px;">
                                            <div class="mb-1 mt-4 d-flex">
                                                <div class="col-5 col-md-4 col-lg-6 fw-bold text-end me-9" >Nom et Prénoms :</div>
                                                <div>{{ $user->lastname }} {{ $user->firstname }}</div>
                                            </div>
                                        
                                            <div class="mb-1 d-flex flex-nowrap">
                                                <div class="col-5 col-md-4 col-lg-6 fw-bold text-end">Agence :</div>
                                                <div class="text-start">{{ $user->agency->name ?? 'Aucune agence' }}</div>
                                            </div>
                                        
                                            <div class="mb-1 d-flex">
                                                <div class="col-5 col-md-4 col-lg-6 fw-bold text-end">Rôle :</div>
                                                <div>{{ $user->role->habilitation ?? 'Aucun rôle' }}</div>
                                            </div>
                                        </div>                                        
                                  </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Téléphone</p>
                                            </div>
                                            <div class="col-sm-20">
                                                <p class="text-muted mb-0"><span class="ff"> {{ old('phone', $user->phone)}} </span></p>
                                            </div>
                                            <hr class="hh">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-20">
                                                <p class="text-muted mb-0"><span class="ff"> {{old('email', $user->email)}} </span></p>
                                            </div>
                                            <hr class="hh">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Adresse</p>
                                            </div>
                                            <div class="col-sm-20">
                                                <p class="text-muted mb-0"><span class="ff"> {{old('address', $user->address)}} </span></p>
                                            </div>
                                            <hr class="hh">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Date de création</p>
                                            </div>
                                            <div class="col-sm-20">
                                                <p class="text-muted mb-0"><span class="ff"> Créé le {{old('created_at', $user->created_at->format('d/m/Y'))}}</span></p>
                                            </div>
                                            <hr class="hh">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg">
                                <div class="card mb-6">
                                  <div class="card-body">
                                    <div class="button-list">
                                        <button data-toggle="modal" data-target="#passwordReset" type="button" class="btn btn-block btn-sm btn-warning waves-effect waves-light">Changement de mot de passe</button>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="card mb-6">
                                  <div class="card-body">
                                    <div class="button-list">
                                        <button type="button" data-toggle="modal" data-target="#userUpdateHisInfoForm" class="btn btn-block btn-sm btn-primary waves-effect waves-light">Actualiser mes informations</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div id="passwordReset" class="modal fade" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title mt-0">Changement de mot de passe</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">

                                            @if (session('successpass'))
                                                <div id="successMessage" class="alert alert-success">
                                                    {{ session('successpass') }}
                                                </div>
                                            @endif

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span id="msg"></span>
                                                        <label for="oldpwd" class="control-label">Mot de passe actuel</label>
                                                        <input required type="password" name="current_password" class="form-control" id="current_password" placeholder="Mot de passe actuel">
                                                        @error('current_password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="newpwd" class="control-label">Nouveau mot de passe</label>
                                                        <input required type="password" name="password" class="form-control" id="password" placeholder="Choisissez un nouveau mot de passe">
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="confirmpwd" class="control-label">Confirmer le mot de passe</label>
                                                        <input required type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmez le nouveau mot de passe">
                                                        @error('password_confirmation')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="text" class="btn btn-secondary waves-effect" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Changer</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                        

                        <!-- User update his info -->

                        <div id="userUpdateHisInfoForm" class="modal fade" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title mt-0">Modifier mes informations</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('info.update') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            @if (session('successinfo'))
                                                <div class="alert alert-success">
                                                    {{ session('successinfo') }}
                                                </div>
                                            @endif
                                            <span id="msgInfo"></span>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname" class="control-label">Nom</label>
                                                        <input name="lastname" type="text" class="form-control" id="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Nom">
                                                        @error('lastname')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname" class="control-label">Prénoms</label>
                                                        <input name="firstname" type="text" class="form-control" id="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="Prénoms">
                                                        @error('firstname')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone" class="control-label">Téléphone</label>
                                                        <input name="phone" type="text" class="form-control " id="phone" value="{{ old('phone', $user->phone) }}" placeholder="Téléphone">
                                                        @error('phone')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" class="control-label">Email</label>
                                                        <input name="email" type="text" class="form-control" id="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                                                        @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address" class="control-label">Adresse</label>
                                                        <input name="address" type="text" class="form-control" id="address" value="{{ old('address', $user->address) }}" placeholder="Adresse">
                                                        @error('address')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="birthdate" class="control-label">Date de naissance</label>
                                                        <input name="birthdate" type="date" class="form-control" id="birthdate" value="{{ old('birthdate', $user->birthdate) }}" placeholder="Adresse">
                                                        @error('birthdate')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Modifier</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <footer class="footer text-center">
                    2024 © <span class="text-success">L'AFRICAINE VIE BENIN SA</span> <span class="d-none d-sm-inline-block"> - Lafricaineviebenin.com</span>
                </footer>

            </div>

        </div>
        <!-- END wrapper -->

        <script>
            // JavaScript pour rouvrir le modal si un message de succès ou d'erreur est présent
            document.addEventListener('DOMContentLoaded', function () {
                // @if (session('success') || $errors->any())
                //     $('#passwordReset').modal('show');
                //     $('#userUpdateHisInfoForm').modal('show');
                // @endif

                if("{{ session('successpass') }}" || "{{ $errors->has('current_password') }}" || "{{ $errors->has('password') }}" || "{{ $errors->has('password_confirmation') }}"){
                    $('#passwordReset').modal('show');
                }
                

                // Vérifie si un message de succès ou d'erreur existe pour la modification des informations
                if("{{ session('successinfo') }}" || "{{ $errors->has('firstname') }}" || "{{ $errors->has('lastname') }}" || "{{ $errors->has('phone') }}" || "{{ $errors->has('email') }}" || "{{ $errors->has('address') }}" || "{{ $errors->has('birthdate') }}"){
                    $('#userUpdateHisInfoForm').modal('show');
                }
            });

           
            
        </script>

        <script>
            // $(document).ready(function() {
            //     // Vérifie si un message de succès ou d'erreur existe pour le changement de mot de passe
            //     if ("{{ session('passwordSuccess') }}" || "{{ $errors->has('current_password') }}" || "{{ $errors->has('password') }}" || "{{ $errors->has('password_confirmation') }}") {
            //         $('#passwordReset').modal('show');
            //     }
                
            //     // Vérifie si un message de succès ou d'erreur existe pour la modification des informations
            //     if ("{{ session('infoSuccess') }}" || "{{ $errors->has('firstname') }}" || "{{ $errors->has('lastname') }}" || "{{ $errors->has('phone') }}" || "{{ $errors->has('email') }}" || "{{ $errors->has('address') }}" || "{{ $errors->has('birthdate') }}") {
            //         $('#userUpdateHisInfoForm').modal('show');
            //     }
            // });
        </script>

        <script>
            function previewPhoto() {
                const input = document.getElementById('profile_photo');
                const preview = document.getElementById('profile-photo-preview');

                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>



        <!-- jQuery  -->
        <script src="{{asset('assetss/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assetss/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assetss/js/waves.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
        
        {{-- <script src="module/utils.js"></script>
        <script src="module/user_profil.js"></script> --}}
        <!-- App js -->
        <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
        <script src="{{asset('assetss/js/jquery.app.js')}}"></script>

    </body>
</html>