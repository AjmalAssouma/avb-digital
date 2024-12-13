<!Doctype html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') . ' | Se connecter'}}</title>
    <meta name="description" content="UBA BENIN COMPTE PARRAINE ALAFIA">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/font/flaticon.css')}}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/css/style.css')}}">

    <link href="{{asset('assetss/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />

    <script src="{{asset('assetss/js/modernizr.min.js')}}"></script>

    {{-- <style>
        #identifier:focus{
            border-color: #86f58c; 
            box-shadow: 0 0 8px rgba(134, 200, 245, 0.5);
        }

        #password:focus{
            border-color: #86f58c; 
            box-shadow: 0 0 8px rgba(134, 200, 245, 0.5);
        }
    </style> --}}

    <style>  
        /* Masque l'icône intégrée à Edge   */
        input[type="password"]::-ms-reveal {  
            display: none;  
        }  

        input[type="password"]::-ms-clear {  
            display: none;  
        }  

        .field-icon {  
            position: absolute;  
            right: 12px;  
            top: 50%;  
            transform: translateY(-50%);  
            cursor: pointer;  
            z-index: 10;  
        } 

        .float-right {  
            position: relative; /* Permet d'ajuster un positionnement si nécessaire */  
            top: 5px; /* Ajuster la position verticale du lien */  
            margin-left: 64%;  
        }  
    </style>  
    
</head>

<body class="bg-transparent">
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>


    {{-- <section class="fxt-template-animation fxt-template-layout21 ">
        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-6 col-sm-12 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="{{route('login')}}" class="fxt-logo"><img src="{{ asset('assets/img/logoAAVIE.png') }}" width="190" alt="L'Africiaine Vie Bénin"></a>
                            <p style="font-size: 19px; font-weight: 500;"> Se connecter</p>
                        </div>
                        <div class="fxt-form">
                            <form action="{{ route('login') }}" method="POST" novalidate>
                                @csrf
                                @if (session('message'))
                                    <div class="alert alert-warning" style="margin-top: -5%">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <!-- Message d'erreur pour mot de passe expiré -->
                                @if($errors->has('password_expired'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password_expired') }}
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <input type="text" id="identifier" class="form-control @error('identifier') is-invalid @enderror" name="identifier" placeholder="Téléphone ou Email" required="required" value="{{ old('identifier') }}">
                                        <!-- Afficher les messages d'erreur pour identifier -->
                                        @error('identifier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required="required">
                                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                        <!-- Afficher les messages d'erreur pour password -->
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-4">
                                        <button type="submit" class="fxt-btn-fill">Se connecter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="fxt-footer">
                            <div class="fxt-transformY-50 fxt-transition-delay-9">
                                <a style="float: right;" href="{{ route('forgot.password') }}" class="text fxt-ri" style="color: #348cd4">Mot de passe oublié</a>
                            </div>
                            <br>
                            <br>
                            <div class="fxt-transformY-50">
                                <p style="float: right; color: #000;  margin: 0;">
                                    Vous n'avez pas de compte? <a href="{{route('registration')}}" class="fxt-form">Inscrivez-vous</a>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="{{route('login')}}" class="fxt-logo"><img src="{{ asset('assets/img/logoAAVIE.png') }}" width="190" alt="L'Africiaine Vie Bénin"></a>
                                </h2>
                                {{-- <h4 class="text-uppercase font-bold m-b-0">Sign In</h4> --}}
                            </div>


                            <div class="account-content">
                                <form class="form-horizontal" action="{{ route('login') }}" method="POST" novalidate>
                                    @csrf
                                    @if (session('message'))
                                        <div class="alert alert-warning" style="margin-top: -5%">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <!-- Message d'erreur pour mot de passe expiré -->
                                    @if($errors->has('password_expired'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('password_expired') }}
                                        </div>
                                    @endif

                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <label for="identifier">Adresse mail ou numéro de téléphone</label>   
                                            <input type="text" id="identifier" class="form-control input-lg @error('identifier') is-invalid @enderror" name="identifier" placeholder="Téléphone ou Email" required="required" value="{{ old('identifier') }}">
                                            <!-- Afficher les messages d'erreur pour identifier -->
                                            @error('identifier')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group m-b-25">
                                        <div class="col-12">

                                            <label for="password">Mot de passe</label>
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" placeholder="********" required="required">
                                                <i toggle="#password" class="fa fa-eye-slash fa-fw toggle-password field-icon"></i>

                                                <!-- Afficher les messages d'erreur pour password -->
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <a href="{{ route('forgot.password') }}" class="text-muted float-right">Mot de passe oublié?</a>

                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-12">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remembercheck">
                                                <label class="custom-control-label" for="remembercheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Se connecter</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- end card-box-->


                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Vous n'avez pas de compte ? <a href="{{route('registration')}}" class="text-dark m-l-5">S'inscrire</a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    

    
    <!-- jquery-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Imagesloaded js -->
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- Particles js -->
    <script src="{{asset('assets/js/particles.min.js')}}"></script>
    <script src="{{asset('assets/js/particles-1.js')}}"></script>
    <!-- Validator js -->
    <script src="{{asset('assets/js/validator.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('module/login.js')}}"></script>

    <!-- jQuery  -->
    <script src="{{asset('assetss/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assetss/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assetss/js/waves.js')}}"></script>
    <script src="{{asset('assetss/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assetss/js/jquery.core.js')}}"></script>
    <script src="{{asset('assetss/js/jquery.app.js')}}"></script>
    
</body>

</html>