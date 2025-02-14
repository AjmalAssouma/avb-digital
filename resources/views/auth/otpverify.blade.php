<!Doctype html>
<html class="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') . ' | Authentification OTP'}}</title>
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

    <link href="{{asset('assetss/css/icons.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .otp-inputs {
        display: flex;
        gap: 10px;
        justify-content: center; /* Centrer les champs */
        margin-top: 10px;
        }

        .otp-input {
        width: 50px;
        height: 50px;
        text-align: center;
        font-size: 18px;
        border: 2px solid #ddd;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
        }

        .otp-input:focus {
        border-color: #86f58c; /* Couleur au focus */
        box-shadow: 0 0 8px rgba(134, 200, 245, 0.5);
        }
   
        .otp-input::placeholder {
        color: #ccc; /* Couleur du placeholder */
        }
    </style>
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
        {{-- <div id="particles-js"></div> --}}
        <!-- Animation End Here -->
        
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-7 col-sm-12 col-12 fxt-bg-color">

                    <div class="fxt-content">

                        <div class="fxt-header">
                            <a href="" class="fxt-logo"><img src="{{asset('assets/img/otp-icon.png')}}" width="70" alt="L'Africiaine Vie Bénin"></a>
                            <h5 class="text-uppercase font-bold m-b-0">Vérification.</h5>
                        </div>

                        <div class="fxt-form">
                            <!-- Formulaire OTP -->
                            <form action="{{ route('otp.verify.submit') }}" method="POST" novalidate>
                                @csrf
                                <div style="margin-top: -20px">
                                    @if (session('success'))
                                        <div class="alert alert-success" style="text-align: center; font-size: 15px; padding: 10px 5px; margin-top: -40px">
                                            <i class="mdi mdi-check-all"></i>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if($errors->has('message'))
                                        <div class="alert alert-danger" style="text-align: center;">
                                            {{ $errors->first('message') }} <!-- Affiche uniquement le premier message d'erreur général -->
                                        </div>
                                    @endif
                                    
                                    <p style="font-family: 'Poppins', sans-serif; text-align:center; text-justify:inter-word; font-size: 16px; color: #000000; line-height: 1.5; font-weight: 550">
                                        Veuillez renseigner le code que vous avez reçu.
                                    </p>
                                    <input type="hidden" name="email" class="form-control" value="{{ session('reset_identifier') }}" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-5">
                                        <div class="otp-inputs">
                                            <input type="text" id="otp1" name="otp1" class="otp-input" maxlength="1" required>
                                            <input type="text" id="otp2" name="otp2" class="otp-input" maxlength="1" required>
                                            <input type="text" id="otp3" name="otp3" class="otp-input" maxlength="1" required>
                                            <input type="text" id="otp4" name="otp4" class="otp-input" maxlength="1" required>
                                            <input type="text" id="otp5" name="otp5" class="otp-input" maxlength="1" required>
                                            <input type="text" id="otp6" name="otp6" class="otp-input" maxlength="1" required>
                                        </div>
                                        @if($errors->has('otp'))
                                            <span class="text-danger">{{ $errors->first('otp') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div style="display: flex; align-items: center; gap: 10px; margin-left: 80px;">
                                    <span style="font-size: 15px; color: #000000;">Vous n'avez pas reçu le code ?</span>
                                    <!-- Bouton pour renvoyer le code via un autre formulaire -->
                                    <button type="button" id="resendOtpButton" style="background-color: #131212; border: none; padding: 5px 8px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                                        <span id="resendText" style="color: white; font-size: 14px; font-weight: 500;">Renvoyer le code</span>
                                    </button>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="fxt-transformY-50 fxt-transition-delay-6">
                                        <button type="submit" class="fxt-btn-fill">Vérifier le code</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Formulaire séparé pour renvoyer le code OTP -->
                            <form id="resendOtpForm" action="{{ route('forgotpassword.otp.resend') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="identifier" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Script pour gérer le bouton "Renvoyer le code"
        document.getElementById('resendOtpButton').addEventListener('click', function() {
            document.getElementById('resendOtpForm').submit();
        });
    
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                // Déplace le focus au suivant
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
    
            input.addEventListener('keydown', (e) => {
                // Permet de revenir en arrière
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        document.getElementById('resendOtpButton').addEventListener('click', function() {
            // Récupérer l'identifiant depuis la session ou un champ caché
            const identifier = "{{ session('reset_identifier') }}";

            // Mettre à jour le champ caché dans le formulaire de renvoi d'OTP
            document.querySelector('#resendOtpForm input[name="identifier"]').value = identifier;

            // Soumettre le formulaire caché pour renvoyer l'OTP
            document.getElementById('resendOtpForm').submit();
        });

        document.addEventListener("DOMContentLoaded", () => {
            const resendOtpButton = document.getElementById("resendOtpButton");
            const resendOtpForm = document.getElementById("resendOtpForm");
            const resendText = document.getElementById("resendText");
            const countdownDuration = 10; // Temps de décompte en secondes

            // Vérifier si un décompte est déjà enregistré dans localStorage
            const storedTimestamp = localStorage.getItem("resendStartTime");

            if (storedTimestamp) {
                const elapsedTime = Math.floor((Date.now() - storedTimestamp) / 1000);
                const remainingTime = countdownDuration - elapsedTime;

                if (remainingTime > 0) {
                    startCountdown(remainingTime); // Reprendre le décompte si encore valide
                } else {
                    clearCountdown(); // Supprimer les données si le temps est écoulé
                }
            }

            // Gérer le clic sur le bouton "Renvoyer le code"
            resendOtpButton.addEventListener("click", () => {
                // Soumettre le formulaire pour renvoyer le code
                resendOtpForm.submit();

                // Désactiver le bouton immédiatement après le clic
                resendOtpButton.disabled = true;
                resendOtpButton.style.backgroundColor = "#a9a9a9"; // Couleur désactivée
                resendOtpButton.style.cursor = "not-allowed";

                // Sauvegarder l'heure de début du décompte
                localStorage.setItem("resendStartTime", Date.now());
            });

            // Fonction pour démarrer le décompte
            function startCountdown(timeLeft) {
                resendOtpButton.disabled = true;
                resendOtpButton.style.backgroundColor = "#a9a9a9";
                resendOtpButton.style.cursor = "not-allowed";

                const interval = setInterval(() => {
                    timeLeft--;
                    resendText.innerText = `Renvoyer le code (${timeLeft}s)`;

                    if (timeLeft <= 0) {
                        clearInterval(interval);
                        clearCountdown();

                        // Réactiver le bouton
                        resendOtpButton.disabled = false;
                        resendOtpButton.style.backgroundColor = "#131212"; // Couleur initiale
                        resendOtpButton.style.cursor = "pointer";
                        resendText.innerText = "Renvoyer le code";
                    }
                }, 1000);
            }

            // Fonction pour effacer les données du décompte
            function clearCountdown() {
                localStorage.removeItem("resendStartTime");
            }
        });
    </script>


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
    {{-- <script src="{{asset('module/login.js')}}"></script> --}}

</body>

</html>