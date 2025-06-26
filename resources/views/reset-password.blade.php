<!doctype html>
<html lang="fr">
  <head>
    <title>Réinitialiser votre mot de passe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="FAVICON/Appl Touche 57X57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/FAVICON/Appl Touche 72X72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="icon" href="/assets/FAVICON/Appl Touche 152X152.png">
    <link rel="shortcut icon" href="/assets/FAVICON/Flaticon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/password_forget.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

      @include('components.menu')

      <div class="container mb-4">
        <div class="row">
            <div class="col text-center font-weight-bold py-5">
                <a href="{{ route('login') }}" class="text_header">Connexion</a><span> / Réinitialisation mot de passe</span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <h2>Réinitialiser votre mot de passe</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>Definissez votre nouveau mot de passe</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col">
                    <form method="POST" action="{{ route('password.update') }}">
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
                        
                        <!-- Champ Email -->
                        <div class="form-group mb-4 text-left">
                            <label for="email">Votre adresse email</label>
                            <input type="hidden" name="token" value="{{ request('token') }}">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" placeholder="Adresse email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nouveau mot de passe -->
                        <div class="form-group mb-4 text-left">
                            <label for="password">Nouveau mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"id="password" name="password" placeholder="Nouveau mot de passe" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="form-group mb-4 text-left">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" 
                                id="password_confirmation" name="password_confirmation" 
                                placeholder="Confirmer mot de passe" required>
                        </div>

                        <div class="form-group mb-4 text-center">
                            <button type="submit" class="btn btn-primary font-weight-bold w-50">
                                RÉINITIALISER
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">

                </div>
                <div class="row">
                    <div class="col text-center">
                      <h3 class="text-danger">Comment ca marche ?</h3>
                      <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus exercitationem aliquam autem architecto, corrupti impedit alias amet culpa molestiae earum maiores illum facere unde, error officia fuga repellat omnis libero?</p>
                    </div>
                </div>
                <div class="row">
                  <div class="col card-group mb-5 text-center">
                    <div class="col">
                      <div class="card border-light shadow-sm">
                        <img src="/assets/Images/etudiant.svg" height="200" w="200" alt="choisissez votre etablissement">
                        <div class="card-body">
                          <h6 class="card-title">Choisissez votre filière et université</h6>
                          <a href="{{ route('filieres') }}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card border-light shadow-sm">
                        <img src="/assets/Images/payment.svg" height="200" w="200" alt="frais de scolarité" class="card-img-top">
                        <div class="card-body">
                          <h6 class="card-title">Renseignez-vous sur la scolarité</h6>
                          <a href="{{ route('filieres') }}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card border-light shadow-sm">
                        <img src="/assets/Images/document.svg" height="200" w="200" alt="documents necessaires" class="card-img-top">
                        <div class="card-body">
                          <h6 class="card-title">Preparez les documents nécessaires</h6>
                          <a href="{{ route('filieres') }}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card border-light shadow-sm">
                        <img src="/assets/Images/inscription.svg" height="200" w="200" alt="Programmation Swift" class="card-img-top">
                        <div class="card-body">
                          <h6 class="card-title">Inscrivez-vous en toute simplicité</h6>
                          <a href="{{ route('filieres') }}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card border-light shadow-sm">
                        <img src="/assets/Images/complete.svg" height="200" w="200" alt="Programmation Swift" class="card-img-top">
                        <div class="card-body">
                          <h6 class="card-title">Recevez votre reponse sans se deplacez</h6>
                          <a href="{{ route('filieres') }}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
              </div>
                </div>
            </div>
        </div>
    </div>

        @include('components.footer')
        
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>