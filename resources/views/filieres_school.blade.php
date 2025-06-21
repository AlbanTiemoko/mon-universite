<!doctype html>
<html lang="fr">
  <head>
    <title>Toutes les Filières du Groupe EDHEC - Trouver Mon Ecole </title>
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
    <link rel="stylesheet" href="/assets/css/filiere_school.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  @include('components.menu')

      <div class="header_img">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center font-weight-bold py-5 text-white">
                    <a href="{{ route('accueil') }}" class="text_header">Accueil</a><span> / </span><a href="{{ route('filieres') }}" class="text_header">Filières & Universités </a><span>/ Filières et Facultés</span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center font-weight-bold text-white py-5">
                    <h2>Groupe EDHEC Abidjan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-left font-weight-bold text-white py-3">
                    <span>Ville/Commune: Abidjan Cocody Cité des Arts Rue C42</span>
                </div>
            </div>
        </div>
      </div>
      <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                <a href="{{ route('description.school') }}" class="btn btn-outline-success rounded-pill mr-3 font-weight-bold text_info">Informations générales</a><a href="{{ route('filieres.school') }}" class="btn btn-outline-success rounded-pill ml-5 font-weight-bold text_filière">Filières/Facultés</a>
            </div>
        </div>
      </div>
      <div class="bg-white">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col mb-2">
                  <h5 class="text-center font-weight-bold">Recherche filières/facultés</h6>
                </div>
              </div>
              <div class="container bg-fil pl-5 py-4">
                <form action="traitement.php">
                  <div class=" form-group row pb-4">
                    <div class="col-md-6">
                      <label for="formGroupExampleInput">Votre diplôme actuel</label>
                      <select class="form-control w-75">
                        <option>Tous</option>
                        <option>BAC-5 et Plus</option>
                        <option>BAC+4</option>
                        <option>BAC+3</option>
                        <option>BAC+2</option>
                        <option>BAC</option>
                        <option>BT</option>
                        <option>BEPC</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="formGroupExampleInput">Diplôme souhaité</label>
                      <select class="form-control w-75">
                        <option>Tous</option>
                        <option>Doctorat</option>
                        <option>Master 1 & 2</option>
                        <option>Licence</option>
                        <option>BTS / DUT</option>
                        <option>Certificat</option>
                        <option>Formation Qualifiante</option>
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="formGroupExampleInput">Mode d'etude</label>
                      <select class="form-control w-75">
                        <option>Tous</option>
                        <option>Temps Plein (Cours du jours)</option>
                        <option>Cours du Soir</option>
                        <option>Cours en Ligne</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success font-weight-bold w-75 search">TROUVER FILIERES/FACULTES</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="container bg-white my-5">
                <div class="row pl-5">
                  <div class="col-md-9">
                    <h6 class="font-weight-bold">Informatique Développeur d'Application <br><span class="text-primary"> BTS D'ETAT / DUT</span></h6>
                  </div>
                  <div class="col-md-3 pt-n5">
                    <img src="/assets/Images/LOGO SCHOOL.png" alt="">
                  </div>
                </div>
                <div class="row pl-5 mt-md-n5">
                  <div class="col-md-6">
                    <h6> <strong> Diplôme réquis</strong>: BAC F2, C, D, E <br><strong>Durée</strong>: 03 ans <br><strong>Montant de la formation</strong>: 200 000 par an</h6>
                  </div>
                  <div class="col-md-6">
                    <h6> <strong> Mode d'etude</strong>: Temps plein, <br> Cours du soir <br><strong>Prise en charge</strong>: -25%</h6>
                  </div>
                </div>
                <div class="row pl-5 mt-4">
                  <div class="col-md-6">
                    <a href="{{ route('inscription') }}" class="btn btn-success font-weight-bold w-75 now">INSCRIVEZ VOUS MAINTENANT</a>
                  </div>
                </div>
              </div>
              <div class="container bg-fil py-4 my-5">
                <div class="row pl-5">
                  <div class="col-md-9">
                    <h6 class="font-weight-bold">Génie Logiciel et TIC <br><span class="text-primary"> LICENCE PROFESSIONNELLE / INGENIEURIE</span></h6>
                  </div>
                  <div class="col-md-3 pt-n5">
                    <img src="/assets/Images/LOGO SCHOOL.png" alt="">
                  </div>
                </div>
                <div class="row pl-5 mt-md-n5">
                  <div class="col-md-6">
                    <h6> <strong> Diplôme réquis</strong>: BTS IDA, RIT <br><strong>Durée</strong>: 01 ans <br><strong>Montant de la formation</strong>: 400 000 par an</h6>
                  </div>
                  <div class="col-md-6">
                     <h6> <strong> Mode d'etude</strong>: Cours du soir <br><strong>Prise en charge</strong>: -25%</h6>
                  </div>
                </div>
                <div class="row pl-5 mt-4">
                  <div class="col-md-6">
                    <a href="{{ route('inscription') }}" class="btn btn-success font-weight-bold w-75 now">INSCRIVEZ VOUS MAINTENANT</a>
                  </div>
                </div>
              </div>

              <ul class="pagination justify-content-center pb-4">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="filieres_school.html">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Suivant</a>
                </li>
              </ul>

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