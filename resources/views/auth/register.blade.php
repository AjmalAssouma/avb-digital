<!Doctype html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') . ' | Inscription'}}</title>
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

    <section class="fxt-template-animation fxt-template-layout21">
        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-10 col-lg-7 col-sm-12 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="{{route('registration')}}" class="fxt-logo"><img src="{{ asset('assets/img/logoAAVIE.png') }}" width="200" alt="L'Africiaine Vie Bénin"></a>
                            <p style="font-size: 15px; font-weight: 500;">Inscrivez-vous</p>
                        </div>
                        <div class="fxt-form">
                            <span>
                                {{-- <form action="">
                                    @csrf
                                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                        <div style="flex: 1;">
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="lastname" class="control-label">Nom</label>
                                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom" required="required">
                                                    @error('lastname')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="mail" class="control-label">Adresse mail</label>
                                                    <input type="email" name="mail" class="form-control" id="mail" placeholder="example@gmail.com" required="required">
                                                    @error('mail')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="birthdate" class="control-label">Date de naissance</label>
                                                    <input name="birthdate" type="date" class="form-control" id="birthdate">
                                                    @error('birthdate')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="address" class="control-label">Adresse</label>
                                                    <input type="text" name="address" class="form-control" id="address" placeholder="Adresse" required="required">
                                                    @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                
                                        
                                        <div style="flex: 1;">
                                            
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="firstname" class="control-label">Prénoms</label>
                                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénoms" required="required">
                                                    @error('firstname')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="phone" class="control-label">Numéro de téléphone</label>
                                                    <div style="display: flex; align-items: center;">
                                                        <input type="tel" name="indic" class="form-control" id="indic" value="+229" readonly style="max-width: 70px; margin-right: 5px; text-align: center; background-color:rgb(252, 253, 253)">
                                                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="Téléphone" required="required" style="flex: 1;">
                                                    </div>
                                                    @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                           
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <span>Genre</span><br>
                                                    <span style="display: inline-flex; align-items: center; margin-right: 10px; border: 2px solid #ccc; padding: 5px; border-radius: 5px; width: 40%;">
                                                        <label for="homme" style="margin-right: 5px; font-weight: 500; font-size: 18px;">Homme</label>
                                                        <input type="radio" name="genre" id="homme" value="1" required="required" style="margin-left: 40%;">
                                                    </span>
                                                    <span style="display: inline-flex; align-items: center; border: 2px solid #ccc; padding: 5px; border-radius: 5px; width: 40%;">
                                                        <label for="femme" style="margin-right: 5px; font-weight: 500; font-size: 18px;">Femme</label>
                                                        <input type="radio" name="genre" id="femme" value="2" required="required" style="margin-left: 40%;">
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <label for="password">Mot de passe</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required="required">
                                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                                            <button type="submit" class="fxt-btn-fill">S'inscrire</button>
                                        </div>
                                    </div>
                                </form>--}}

                                <form action="{{route('registration')}}" method="POST">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                        <!-- Colonne de gauche -->
                                        <div style="flex: 1;">
                                            <div class="form-group">
                                                <label for="lastname" class="control-label">Nom</label>
                                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nom" required>
                                                @error('lastname')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="mail" class="control-label">Adresse mail</label>
                                                <input type="email" name="mail" class="form-control" id="mail" placeholder="example@gmail.com" required>
                                                @error('mail')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="birthdate" class="control-label">Date de naissance</label>
                                                <input type="date" name="birthdate" class="form-control" id="birthdate">
                                                @error('birthdate')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="address" class="control-label">Adresse</label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="Adresse" required>
                                                @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <!-- Colonne de droite -->
                                        <div style="flex: 1;">
                                            <div class="form-group">
                                                <label for="firstname" class="control-label">Prénoms</label>
                                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénoms" required>
                                                @error('firstname')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="phone" class="control-label">Numéro de téléphone</label>
                                                <div style="display: flex; align-items: center;">
                                                    <input type="tel" name="indic" class="form-control" id="indic" value="+229" readonly style="max-width: 70px; margin-right: 5px; text-align: center; background-color:rgb(252, 253, 253)">
                                                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Téléphone" pattern="[0-9]{8}" title="Entrez un numéro de 8 chiffres" required style="flex: 1;">
                                                </div>
                                                {{-- <input type="tel" name="phone" class="form-control" id="phone" placeholder="Téléphone" pattern="[0-9]{8}" title="Entrez un numéro de 8 chiffres" required> --}}
                                                @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                    <span>Genre</span><br>
                                                    <span style="display: inline-flex; align-items: center; margin-right: 10px; border: 2px solid #ccc; padding: 8px; border-radius: 5px; width: 40%;">
                                                        <label for="genre_homme" style="margin-right: 5px; font-weight: 500; font-size: 18px;">Homme</label>
                                                        <input type="radio" name="gender" id="genre_homme" value="M" required style="margin-left: 40%;">
                                                    </span>
                                                    <span style="display: inline-flex; align-items: center; border: 2px solid #ccc; padding: 8px; border-radius: 5px; width: 40%;">
                                                        <label for="genre_femme" style="margin-right: 5px; font-weight: 500; font-size: 18px;">Femme</label>
                                                        <input type="radio" name="gender" id="genre_femme" value="F" required style="margin-left: 40%;">
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="agence" class="control-label">Agence</label>
                                                <select name="idAgency" id="agence" class="form-control">
                                                    @foreach ($agencies as $agencie)
                                                        <option class="form-control" value="{{ $agencie->id}}"> {{$agencie->name}} </option>
                                                    @endforeach
                                                    {{-- <option class="form-control" value="1">AFRICAINE VIE BENIN - Agence Cotonou</option>
                                                    <option class="form-control" value="2">AFRICAINE VIE BENIN - Agence Bohicon</option>
                                                    <option class="form-control" value="3">AFRICAINE VIE BENIN - Agence Parakou</option> --}}
                                                </select>
                                                @error('idAgency')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="********" minlength="8" required>
                                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>       
                                    <div class="form-group">
                                        <button type="submit" class="fxt-btn-fill">S'inscrire</button>
                                    </div>
                                </form>
                               
                            </span>
                            <p style="margin-top: 30px; margin-bottom: 0;">
                                Vous avez déja un compte? 
                                <a href="{{route('login')}}" style="margin: 0">Se connecter</a>
                            </p> 
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