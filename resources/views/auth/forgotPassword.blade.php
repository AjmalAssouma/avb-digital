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
                            <p>Mot de passe oublié</p>
                        </div>
                        <div class="fxt-form">
                            <span id="sms_verif_view">
                                <form action="{{ route('forgot.password.submit') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                                            <label for="email_or_phone">Email ou Numéro de téléphone</label>
                                            <input type="text" name="identifier" class="form-control" placeholder="Entrer votre email ou numéro de téléphone">
                                            @error('identifier') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                                            <button type="submit" class="fxt-btn-fill">Envoyer OTP</button>
                                        </div>
                                    </div>
                                </form>
                            </span>
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
                            <a href="" class="fxt-logo"><img src="{{ asset('assets/img/logoAAVIE.png') }}" width="180" alt="L'Africaine Vie Bénin"></a>
                            <p>Mot de passe oublié</p>
                        </div>
                        <div class="fxt-form">
                            <form action="{{ route('forgot.password.submit') }}" method="POST" novalidate>
                                @csrf
                                @if($errors->has('message'))
                                    <div class="alert alert-danger" style="text-align: center;">
                                        {{ $errors->first('message') }} <!-- Affiche uniquement le premier message d'erreur général -->
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                                        <label for="identifier">Email ou numéro de téléphone</label>
                                        <input type="text" name="identifier" id="identifier" class="form-control" placeholder="Entrer votre email ou numéro de téléphone" required="required">
                                        <!-- Affichage des messages d'erreur spécifiques -->
                                        @error('identifier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-4">
                                        <button type="submit" class="fxt-btn-fill">Envoyer le code</button>
                                    </div>
                                </div>

                                <!-- Message de session s'il y a un échec général -->
                                @if(session('error'))
                                    <div class="form-group">
                                        <span class="text-danger">{{ session('error') }}</span>
                                    </div>
                                @endif
                            </form>
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