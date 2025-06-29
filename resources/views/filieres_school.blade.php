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
                    <h2>{{$etablissement->nom}} ({{$etablissement->reference}})</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left font-weight-bold text-white py-3">
                    <span>Commune/quartier : {{ $etablissement->commune_rue }}</span>
                </div>
                <div class="col-md-4 text-center font-weight-bold text-white py-3">
                    <span>Ville : {{ $etablissement->ville }}</span>
                </div>
                <div class="col-md-4 text-right font-weight-bold text-white py-3">
                    <span>Contacts : {{ $etablissement->contacts }}</span>
                </div>
            </div>
        </div>
      </div>
      <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                <a href="{{ route('description.school', $etablissement->slug) }}" class="btn btn-outline-success rounded-pill mr-3 font-weight-bold text_info">Informations générales</a>
                <a href="{{ route('filieres.school', $etablissement->slug) }}" class="btn btn-outline-success rounded-pill ml-5 font-weight-bold text_filière">Filières/Facultés</a>
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
                <form method="GET" action="{{ route('filieres.school', $etablissement->slug) }}">
                  <div class="form-group row pb-4">
                      <div class="col-md-6">
                          <label>Votre diplôme actuel</label>
                          <select name="diplome_requis" class="form-control w-75">
                              <option value="">Tous</option>
                              @foreach($diplomeRequis as $item)
                              <option value="{{ $item }}" 
                                  {{ request('diplome_requis') == $item ? 'selected' : '' }}>
                                  {{ $item }}
                              </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-6">
                          <label>Diplôme souhaité</label>
                          <select name="diplome_final" class="form-control w-75">
                              <option value="">Tous</option>
                              @foreach($diplomeFinaux as $item)
                              <option value="{{ $item }}"
                                  {{ request('diplome_final') == $item ? 'selected' : '' }}>
                                  {{ $item }}
                              </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                          <label>Mode d'étude</label>
                          <select name="mode_etude" class="form-control w-75">
                              <option value="">Tous</option>
                              @foreach($modeEtudes as $item)
                              <option value="{{ $item }}"
                                  {{ request('mode_etude') == $item ? 'selected' : '' }}>
                                  {{ $item }}
                              </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-6">
                          <button type="submit" class="btn btn-success font-weight-bold w-75">
                              TROUVER FILIÈRES/FACULTÉS
                          </button>
                          <a href="{{ route('filieres.school', $etablissement->slug) }}" 
                            class="btn btn-secondary mt-2 w-75">
                              Réinitialiser
                          </a>
                      </div>
                  </div>
              </form>
              </div>
              @foreach($filieres as $filiere)
                <div class="container {{ $loop->iteration % 2 == 0 ? 'bg-fil' : 'bg-white' }} py-4 my-5">
                    <div class="row pl-5">
                        <div class="col-md-9">
                            <h6 class="font-weight-bold">
                                {{ $filiere->nom }} <br>
                                <span class="text-primary">{{ $filiere->diplome_final }}</span>
                            </h6>
                        </div>
                        <div class="col-md-3 pt-n5">
                            <img src="{{ asset($etablissement->logo) }}" alt="Logo" width="111" height="118">
                        </div>
                    </div>

                    <div class="row pl-5 mt-md-n5">
                        <div class="col-md-6">
                            <h6>
                                <strong> Diplôme réquis</strong>: {{ $filiere->diplome_requis }} <br>
                                <strong>Durée</strong>: {{ $filiere->duree }} ans <br>
                                <strong>Montant annuel</strong>: {{ $filiere->montant_formate }}
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h6>
                                <strong> Mode d'etude</strong>: 
                                @foreach($filiere->mode_etudes as $mode)
                                    {{ $mode->nom }}<br>
                                @endforeach<br>
                                <strong>Prise en charge</strong>: {{ $filiere->prise_en_charge }}
                            </h6>
                        </div>
                    </div>

                    <div class="row pl-5 mt-4">
                        <div class="col-md-6">
                            <a href="{{ route('inscription', ['filiere_id' => $filiere->id, 'etablissement_id' => $filiere->etablissement->id]) }}"
                              class="btn btn-success font-weight-bold w-75 now">
                                INSCRIVEZ VOUS MAINTENANT
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

              {{ $filieres->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}

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