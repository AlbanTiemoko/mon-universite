<!doctype html>
<html lang="fr">
  <head>
    <title>Site Officiel sur l'enseignement superieure en Côte d'Ivoire pour les etudiants - Trouver Mon Ecole</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/assets/FAVICON/Appl Touche 57X57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/FAVICON/Appl Touche 72X72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/FAVICON/Appl Touche 114X114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assetsFAVICON/Appl Touche 114X114.png">
    <link rel="icon" href="/assets/FAVICON/Appl Touche 152X152.png">
    <link rel="shortcut icon" href="/assets/FAVICON/Flaticon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body>

  @include('components.menu')

    <div class="slide pb-3">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="700" height="510" class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
      </div>
  </div>
    <div class="bg-white">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="my-5 py-5 px-4 bg-secondary">
                <div class="col text-center">
                    <h5 class="mb-4 text-white font font-weight-bold">PROGRAME DE RECHERCHE RAPIDE</h5>
                </div>
                  <form method="GET" action="{{ route('search') }}">
                    <div class="form-row">
                      {{-- Diplôme requis --}}
                      <div class="col">
                        <select class="form-control" name="diplome_requis">
                          <option value="">Votre diplôme actuel</option>
                          @foreach($diplomesRequis as $d)
                            <option value="{{ $d }}" {{ request('diplome_requis') == $d ? 'selected' : '' }}>
                              {{ $d }}
                            </option>
                          @endforeach
                        </select>
                      </div>

                      {{-- Domaine d'étude --}}
                      <div class="col">
                        <select class="form-control" name="domaine">
                          <option value="">Domaine d'étude</option>
                          @foreach($domaines as $dom)
                            <option value="{{ $dom }}" {{ request('domaine') == $dom ? 'selected' : '' }}>
                              {{ $dom }}
                            </option>
                          @endforeach
                        </select>
                      </div>

                      {{-- Mode d'étude --}}
                      <div class="col">
                        <select class="form-control" name="mode">
                          <option value="">Mode d'étude</option>
                          @foreach($modes as $m)
                            <option value="{{ $m }}" {{ request('mode') == $m ? 'selected' : '' }}>
                              {{ $m }}
                            </option>
                          @endforeach
                        </select>
                      </div>

                      {{-- Bouton --}}
                      <div class="col">
                        <button type="submit" class="btn btn-danger search">RECHERCHER</button>
                      </div>
                    </div>
                  </form>
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
          <div class="container-fluid bg-light">
            <div class="container text-whitemb-3 py-4">
                <div class="row pl-5">
                  <div class="col text-center ">
                    <div class="h1 font-weight-bold">Les filieres les plus recherchées</div>
                  </div>
                </div>
                @foreach(['filieres_industrielles', 'filieres_tertiaires', 'filieres_qualifiantes'] as $key)
                    <div class="row mt-4">
                        @foreach($$key as $filiere)
                            <div class="col">
                                <button type="button" class="btn btn-outline-warning rounded-pill w-100">
                                    {{ $filiere->affichage }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row mt-4">
                  <div class="col">
                    
                  </div>
                  <div class="col">
                    
                  </div>
                  <div class="col">
                    
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('filieres') }}" ><button type="button" class="btn btn-lg">Voir Toutes les Filieres</button></a>
                  </div>
                </div>
            </div>
          </div>
          <div class="container-fluid femme d-flex justify-content-center align-items-center">
              <div class="row">
                  <div class="col-md-6">
      
                </div>
                <div class="col-md-6 gradute py-4">
                  <div class="line-height-reduced font-weight-bold text-secondary">MON UNIVERSITE</div><br>
                  <div class="h2 font-weight-bold mb-4">Faites une demande d'apparition gratuitement</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto error fugiat doloribus aperiam, sapiente deserunt assumenda, id autem at odio corrupti possimus delectus asperiores dolore similique tempora tempore minima nesciunt. </p>
                  <form>
                    <div class="row mb-3">
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Non de votre établissement">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Numéro de téléphone etablissement">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Adresse de votre établissement">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Description de votre etablissement"></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col">
                        <button type="submit" class="btn btn-primary mb-2">SOUMETTRE VOTRE DEMANDE</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
          <div class="container my-5">
            <div class="row mb-4">
              <div class="col text-center ">
                <div class="h1 font-weight-bold">Ils Parlent de Nous</div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="card w-100" style="width: 18rem;">
                  <div class="card-body orange">
                    <h5 class="card-title">Kouassi Yao Martial</h5>
                    <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Diallo Tiemoko Alban</h5>
                    <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100" style="width: 18rem;">
                  <div class="card-body vert">
                    <h5 class="card-title">Guy Armand</h5>
                    <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid etudiante">
            <div class="container">
              <div class="row mb-4 py-5 text-white">
                <div class="col text-center ">
                  <div class=" line-height-reduced text-white font-weight-bold">MON UNIVERSITE</div><br>
                    <div class="h2 font-weight-bold mb-4">Réalisations et Statistiques</div>
                </div>
              </div>
              <div class="row font-weight-bold text-center">
                <div class="col">
                  <div class="w-100" style="width: 18rem;">
                    <div class="stats py-4 px-4">
                      <h2 class="card-title">50+</h2>
                      <p class="card-text">Etablissements Inscrites</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="w-100" style="width: 18rem;">
                    <div class="stats py-4 px-4">
                      <h2 class="card-title">400+</h2>
                      <p class="card-text">Filieres disponibles</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="w-100" style="width: 18rem;">
                    <div class="stats py-4 px-4">
                      <h2 class="card-title">1 000+</h2>
                      <p class="card-text">Demandes d'Inscription</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
          </div>
          </div>
          <!-- SIDEBAR A DROITE-->
          
          <!-- FIN SIDEBAR A DROITE-->
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