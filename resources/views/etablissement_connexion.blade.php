<!doctype html>
<html lang="fr">
  <head>
    <title>Connexion etablissement</title>
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
    <link rel="stylesheet" href="/assets/css/etablissement_connexion.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  @include('components.menu')

      <div class="container mb-4">
        <div class="row">
            <div class="col text-center font-weight-bold py-5">
                <a href="{{ route('accueil') }}" class="text_header">Accueil</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <h2>Connexion etablissement</h2>
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
                <div class="text-center">
                    <h2>Connexion</h2>
                    <form action="traitement.php">
                        <div class="form-group mb-4 text-left">
                            <label for="inputEmail4">Votre adresse email</label>
                            <input type="email" class="form-control " id="inputEmail4" placeholder="Adresse email" required>
                          </div>
                          <div class="form-group mb-4 text-left">
                            <label for="exampleInputPassword1">Votre mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required>
                          </div>
                          <button type="submit" class="btn btn-primary font-weight-bold w-100 mb-4">SE CONNECTER</button>
                    </form>
                </div>
                <div class="text-center mb-3">
                    <a href="{{ route('password.forget') }}" class="password font-weight-bold">Mot de passe oublié ?</a>
                  </div>
                  <div class="text-center mb-3">
                   <span class="password font-weight-bold">Pas de compte ? </span> <a href="{{ route('etablissement.inscription') }}" class="password font-weight-bold">Inscrivez-vous maintenant</a>
                  </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="row my-4">
          <div class="col text-center">
            <h2 class="text-danger">Comment ca marche ?</h2>
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

      @include('components.footer')
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>