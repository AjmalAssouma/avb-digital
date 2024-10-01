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
    
</head>

<body>
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    {{-- <section class="fxt-template-animation fxt-template-layout21">
        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-7 col-sm-12 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="" class="fxt-logo"><img src="{{asset('assets/img/logoAAVIE.png')}}" width="150" alt="L'Africiaine Vie Bénin"></a>
                            <p>Se connecter</p>
                        </div>
                        <div class="fxt-form">
                            <span id="sms_verif_view">

                                <form action="{{ route('login') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                                            <input type="text" id="identifier" class="form-control" name="identifier" placeholder="Téléphone ou Email" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="fxt-transformY-50 fxt-transition-delay-2">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                                            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                                            <button type="submit" class="fxt-btn-fill">Se connecter</button>
                                        </div>
                                    </div>
                                </form>

                            </span>
                        </div>
                        <div class="fxt-footer">
                            <div class="fxt-transformY-50 fxt-transition-delay-9">
                                <a style="float: right;" href="{{ route('forgot.password') }}" class="switcher-text fxt-ri">Mot de passe oublié</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="fxt-template-animation fxt-template-layout21">
        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-7 col-sm-12 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="{{route('login')}}" class="fxt-logo"><img src="{{ asset('assets/img/logoAAVIE.png') }}" width="190" alt="L'Africiaine Vie Bénin"></a>
                            <p style="font-size: 19px; font-weight: 500;"> Se connecter</p>
                        </div>
                        <div class="fxt-form">
                            <span id="sms_verif_view">
                                <form action="{{ route('login') }}" method="POST" novalidate>
                                    @csrf
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
                            </span>
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

</body>

</html>