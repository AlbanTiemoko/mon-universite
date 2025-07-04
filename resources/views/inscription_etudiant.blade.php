<!doctype html>
<html lang="fr">
  <head>
    <title>Inscription etudiant</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/assets/FAVICON/Appl Touche 57X57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/FAVICON/Appl Touche 72X72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="icon" href="/assets/FAVICON/Appl Touche 152X152.png">
    <link rel="shortcut icon" href="/assets/FAVICON/Flaticon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/inscription_etudiant.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    @include('components.menu')

      <div class="container mb-4">
        <div class="row">
            <div class="col text-center font-weight-bold py-5">
                <a href="index.html" class="text_header">Accueil</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <h2>Inscription etudiant</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto error fugiat doloribus aperiam, sapiente deserunt assumenda, id autem at odio corrupti possimus delectus asperiores dolore similique tempora tempore minima nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores harum illum, dicta sint omnis culpa maxime repellendus, aliquam impedit ex et dolores incidunt, dolore dolorum doloribus pariatur porro cupiditate? Corporis!</p>
            </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="text-left">
                    <h2 class="text-center">Inscription</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- Messages d'erreur globaux -->
                        @if($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Champs existants avec gestion des erreurs -->
                        <div class="form-group mb-4">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                  id="name" name="name" placeholder="Nom" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="firstname">Prénom(s)</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" 
                                  id="firstname" name="firstname" placeholder="Prenom"" required>
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                          <label for="inputEmail4">Votre adresse email</label>
                          <input type="email" class="form-control " id="inputEmail4" name="email" placeholder="Adresse email" required>
                        </div>
                        <div class="form-group mb-4">
                          <label for="exampleInputPassword1">Entrer un mot de passe</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Mot de passe" required>
                        </div>
                        <div class="form-group mb-4">
                          <label for="exampleInputPassword1">Confirmer le mot de passe</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Mot de passe" required>
                        </div>
                        <div class="form-group form-check text-center">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                          <label class="form-check-label" for="exampleCheck1">J'accepte le traitement de mes données personnelles.</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary font-weight-bold w-100 mb-4">S'INSCRIRE</button>
                    </form>

                    <!-- Script pour afficher/masquer le mot de passe -->
                    <script>
                    function togglePassword() {
                        const passwordInput = document.getElementById("exampleInputPassword1");
                        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
                    }
                    </script>
                </div>
                  <div class="text-center mb-3">
                    <span class="password font-weight-bold">Déjà un compte ? </span> <a href="{{ route('login') }}" class="password font-weight-bold">Connectez-vous maintenant</a>
                  </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        @include('components.faq')
      </div>

      @include('components.footer')
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>