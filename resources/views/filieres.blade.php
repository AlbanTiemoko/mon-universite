<!doctype html>
<html lang="fr">
  <head>
    <title>Filières et Université - Trouver Mon Ecole</title>
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
    <link rel="stylesheet" href="/assets/css/filieres.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>

    @include('components.menu')

      <div class="header_img pb-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center my-4 font-weight-bold">
                    <a href="{{ route('accueil') }}" class="home">Accueil</a> <span>/ Filières Industrielles</span>
                </div>
            </div>
            @foreach($filieres_industrielles->chunk(10) as $group)
                <div class="row mb-5">
                    @foreach($group as $filiere)
                        <div class="col">
                            <a href="{{ route('filieres', ['filiere' => $filiere->id]) }}"
                              class="btn btn-outline-primary rounded-pill w-100 {{ request('filiere') == $filiere->id ? 'active' : '' }}">
                              {{ $filiere->affichage }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
      </div>
      <div class="container mb-4">
        <div class="row">
            <div class="col text-center">
                <h2>Les établissements superieures</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti assumenda quae omnis itaque! Deleniti totam aut voluptatibus sint obcaecati quo dicta iure explicabo et? Inventore architecto tenetur quae provident officia.</p>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <form method="GET" action="{{ route('filieres') }}">
              <div class="row">
                <div class="col">
                  <select class="form-control" name="ville">
                      <option>Selectionnez une ville</option>
                      @foreach($villes as $ville)
                      <option value="{{ $ville->id }}" {{ request('ville') == $ville->id ? 'selected' : '' }}>
                          {{ $ville->nom }}
                      </option>
                      @endforeach
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="commune">
                      <option value="">Sélectionnez une commune</option>
                      @foreach($communes as $commune)
                          <option value="{{ $commune->id }}" {{ request('commune') == $commune->id ? 'selected' : '' }}>
                              {{ $commune->nom }}
                          </option>
                      @endforeach
                  </select>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-danger w-100">Recherchez</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="bg-secondary bg-section mb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col">

              <div class="row mb-5">
              </div>
            @foreach($etablissements as $etablissement)
          <div class="container bg-white mb-4 pb-4">
            <div class="row">
                  <div class="col-md-9 pl-4 pt-4">
                      <h4>{{$etablissement->nom}}</h4>
                  </div>
                  <div class="col-md-3">
                      <img src="{{ asset($etablissement->logo) }}" alt="Logo" width="111" height="118" class="pt-1">
                  </div>
              </div>
              <div class="row mt-md-n5">
                  <div class="col-md-3 pl-4">
                      <img src="{{ asset($etablissement->cover) }}" alt="cover" width="302" height="130">
                  </div>
                  <div class="col-md-7 ml-5 pl-5 pt-1 col-sm-12">
                      <p>Ville: <strong> {{ $etablissement->ville }}</strong> <br> Adresse: <strong> {{ $etablissement->commune_rue }}</strong> <br>Contacts : <strong> {{ $etablissement->contacts }}</strong></p>
                      <a href="{{ route('filieres.school', $etablissement->slug) }}" type="button" class="btn btn-primary btn-sm orange font-weight-bold">VOIR TOUTES LES FILIERES</a>
                      <a href="{{ route('description.school', $etablissement->slug) }}" type="button" class="btn btn-primary btn-sm green font-weight-bold">DETAILS DE L'UNIVERSITE</a>
                </div>   
              </div>
          </div>
            @endforeach
              <div class="justify-content-center pb-1">
              {{ $etablissements->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
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