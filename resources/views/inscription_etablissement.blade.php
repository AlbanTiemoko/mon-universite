<!doctype html>
<html lang="fr">
  <head>
    <title>Inscription Etablissement - Trouver Mon Ecole</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/assets/FAVICON/Appl Touche 57X57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/FAVICON/Appl Touche 72X72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="icon" href="/assets//assets//Appl Touche 152X152.png">
    <link rel="shortcut icon" href="/assets//assets/Flaticon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/inscription_etablissement.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  @include('components.menu')

      <div class="container mb-4">
        <div class="row">
            <div class="col text-center font-weight-bold py-5">
                <a href="index.html" class="text_header">Accueil</a><span> / Inscription etablissement</span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <h2>Inscription etablissement</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto error fugiat doloribus aperiam, sapiente deserunt assumenda, id autem at odio corrupti possimus delectus asperiores dolore similique tempora tempore minima nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores harum illum, dicta sint omnis culpa maxime repellendus, aliquam impedit ex et dolores incidunt, dolore dolorum doloribus pariatur porro cupiditate? Corporis!</p>
            </div>
        </div>
      </div>
      <div class="container">
        <form action="traitement-php">
            <div class="row mb-3">
                <div class="col text-center">
                    <h5>Détails de votre compte</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Non d'utilisateur</label>
                    <input type="text" class="form-control" placeholder="Votre nom d'utilisateur">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputEmail4">Adresse email de l'etablissement(*)</label>
                    <input type="email" class="form-control " id="inputEmail4" placeholder="Email de l'etablissement" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1">Mot de passe(*)</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre Mot de passe" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1">Confirmer mot de passe(*)</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retaper le mot de passe" required>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Détails de votre établissemnt</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Non de votre établissement(*)</label>
                    <input type="text" class="form-control" placeholder="Nom etablissement" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Numéro de téléphone etablissement(*)</label>
                    <input type="text" class="form-control " placeholder="Votre numéro de téléphone" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="exampleFormControlFile1">Logo de votre etablissement (Dimensions 111X117 px)(*)</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="exampleFormControlFile1">Document d'autorisation de création d'établissement(*)</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col mb-4">
                    <label for="formGroupExampleInput">Adresse de votre établissement(*)</label>
                    <input type="text" class="form-control" placeholder="Adresse géographique de votre établissement" required>
                </div>
            </div>
            <div class="row form-group mb-5">
                <div class="col">
                    <label for="exampleFormControlTextarea1"><em> Description de votre établissement(*)</em></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" required></textarea>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary font-weight-bold w-25">INSCRIPTION</button>
                </div>
            </div>
        </form>
        <div class="text-center mb-5">
            <span class="password font-weight-bold">Déjà un compte ?  </span> <a href="{{ route('etablissement.connexion') }}" class="password font-weight-bold">Connectez-vous !</a>
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