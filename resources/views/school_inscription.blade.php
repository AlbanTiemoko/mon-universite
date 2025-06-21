<!doctype html>
<html lang="fr">
  <head>
    <title>Inscription - Trouver Mon Ecole</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="FAVICON/Appl Touche 57X57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="FAVICON/Appl Touche 72X72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="FAVICON/Appl Touche 114X114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="FAVICON/Appl Touche 114X114.png">
    <link rel="icon" href="FAVICON/Appl Touche 152X152.png">
    <link rel="shortcut icon" href="/assets/FAVICON/Flaticon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/school_inscription.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  @include('components.menu')

      <div class="container mb-4">
        <div class="row">
            <div class="col text-center font-weight-bold py-5">
                <a href="{{ route('accueil') }}" class="text_header">Accueil</a><span> / </span><a href="{{ route('filieres') }}" class="text_header">Filières & Universités </a><span>/ Inscription</span>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <h2>Inscription</h2>
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
                    <h5>Informations personnelle</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Non(*)</label>
                    <input type="text" class="form-control" placeholder="Votre nom" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Prénom(s)(*)</label>
                    <input type="text" class="form-control" placeholder="Votre prénom" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Date de naissance (jj/mm/aaaa)(*)</label>
                    <input type="date" class="form-control ">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Genre</label>
                    <select class="form-control ">
                        <option>Pas spécifié</option>
                        <option>Masculin</option>
                        <option>Féminin</option>
                      </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Ville(*)</label>
                    <select class="form-control " required>
                        <option>Choisissez votre ville</option>
                        <option>Abidjan</option>
                        <option>Korogho</option>
                        <option>San Pédro</option>
                        <option>Yamoussoukro</option>
                      </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Commune/Quartier</label>
                    <input type="text" class="form-control " placeholder="Lieu d'habitation">
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Vos coordonnées</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="inputEmail4">Email(*)</label>
                    <input type="email" class="form-control " id="inputEmail4" placeholder="Votre email" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Numéro de téléphone(*)</label>
                    <input type="text" class="form-control " placeholder="Votre numéro de téléphone" required>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Education et compétences</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Niveau d'etude (vous avez déjà)(*)</label>
                    <select class="form-control " required>
                        <option>Choisissez votre niveau d'etude</option>
                        <option>Master</option>
                        <option>Licence professionnel</option>
                        <option>BTS</option>
                        <option>BAC</option>
                        <option>BT</option>
                        <option>BEPC</option>
                      </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Année d'obtention du diplôme (*)</label>
                    <input type="text" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Votre aspiration</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col mb-4">
                    <label for="formGroupExampleInput">Diplôme souhaité(*)</label>
                    <select class="form-control " required>
                        <option>Choisissez le diplôme que vous souhaitez</option>
                        <option>Doctorat</option>
                        <option>Master professionnel</option>
                        <option>Licence professionnelle</option>
                        <option>Brevet de Technicien Superieure (BTS)</option>
                        <option>Formation qualifiante</option>
                        <option>Certificat</option>
                      </select>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Forme d'etude</h5>
                </div>
            </div>
            <div class="row form-group text-center">
                <div class="col-md-4 mb-4">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Temps plein (cours du jours)</label>
                </div>
                <div class="col-md-4 mb-4">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Temps partielle (cours du soir)</label>
                </div>
                <div class="col-md-4 mb-4">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                    <label class="form-check-label" for="inlineRadio3">Cours en ligne</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Domaine d'etude(*)</label>
                    <select class="form-control " required>
                        <option>Choisissez votre filière</option>
                        <option>Informatique Développeur d'Application</option>
                        <option>Génie Logiciel & TIC</option>
                        <option>Finances / Comptabilité</option>
                        <option>Marketing et Management Commerciale</option>
                        <option>Droits des Affaires et Fiscalité</option>
                        <option>Réseau Informatique et Telecom</option>
                        <option>Transport et Logistique</option>
                        <option>Gestion des Projets</option>
                        <option>Gestion des Ressources Humaines</option>
                      </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="exampleFormControlSelect2">Choisissez votre université(*)</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2" required>
                        <option>Groupe LOKO</option>
                        <option>Groupe EDHEC</option>
                        <option>Institut des Hautes Etudes Avicenne</option>
                        <option>Agitel Formation</option>
                        <option>Institut de Formation Sainte Marie</option>
                        <option>HETEC Abidjan</option>
                        <option>INPHB Yamoussoukro</option>
                        <option>International University Abidjan (IUA)</option>
                        <option>UCAO Abidjan</option>
                        <option>ISTC Abidjan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Information additionnelle</h5>
                </div>
            </div>
            <div class="row form-group mb-5">
                <div class="col">
                    <label for="exampleFormControlTextarea1"><em> Si vous avez des informations supplémentaire. Ecrivez les</em></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                </div>
            </div>
            <div class="row form-group mb-5">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary font-weight-bold w-25">ENVOYER A L'UNIVERSITE</button>
                </div>
            </div>
        </form>
      </div>

      @include('components.footer')
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>