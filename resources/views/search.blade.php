<!doctype html>
<html lang="fr">
  <head>
    <title>Recherche Etablissements - Trouver Mon Ecole</title>
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
    <link rel="stylesheet" href="/assets/css/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
      
    @include('components.menu')

        <div class="container-fluid header_img">
            <div class="row">
                <div class="col text-center font-weight-bold py-5">
                    <a href="index.html" class="text_header">Accueil</a><span> / </span><a href="{{ route('filieres') }}" class="text_header">Filières & Universités </a><span>/ Programmes</span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center font-weight-boldpy-5">
                    <h2>Recherche etablissements</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-left font-weight-bold py-3">
                    <span>Programmes de recherche d'etablissement</span>
                </div>
            </div>
        </div>
      <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nam maiores dolorum quis cumque vel commodi distinctio culpa hic quod explicabo, blanditiis illo amet non est! Et cupiditate saepe quam.</p>
            </div>
            <div class="row bg-fil py-4 px-4">
              <form method="GET" action="{{ route('search') }}">
                <div class="form-row">
                  {{-- Diplôme requis --}}
                  <div class="col">
                    <label for=""> Votre diplôme actuel </label>
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
                    <label for="">Filiere </label>
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
                    <label for="">Mode d'étude </label>
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
                    <label for="">.</label>
                    <button type="submit" class="btn btn-danger search">RECHERCHER</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
      <div class="bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                  <div class="container">
                    @foreach($filieres as $filiere)
                    <div class="{{ $loop->iteration % 2 == 0 ? 'bg-fil' : 'bg-white' }} my-5 p-4">
                        <div class="row pl-5">
                            <div class="col-md-9">
                                <h5 class="font-weight-bold">{{ $filiere->nom }}</h5>
                                <a href="{{ route('description.school', $filiere->etablissement->slug) }}" target="_blank">
                                    <h6 class="font-weight-bold mt-n1">{{ $filiere->etablissement->nom }}</h6>
                                </a>
                            </div>
                            <div class="col-md-3 pt-n5">
                                <img src="{{ asset($filiere->etablissement->logo_path ?? '/assets/Images/LOGO SCHOOL.png') }}" 
                                    alt="Logo {{ $filiere->etablissement->nom }}">
                            </div>
                        </div>
                        <div class="row pl-5 mt-md-n5">
                            <div class="col-md-6">
                                <h6> 
                                    <strong>Diplôme de fin cycle</strong>: {{ $filiere->diplome_final }}<br>
                                    <strong>Diplôme requis</strong>: {{ $filiere->diplome_requis }}<br>
                                    <strong>Durée</strong>: {{ $filiere->duree }} ans<br>
                                    <strong>Montant de la formation</strong>: {{ $filiere->montant_formate }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h6> 
                                    <strong>Mode d'étude</strong>: @foreach($filiere->mode_etudes as $mode)
                                    {{ $mode->nom }}<br>
                                @endforeach<br>
                                    <strong>Prise en charge</strong>: {{ $filiere->prise_en_charge }}
                                </h6>
                            </div>
                        </div>
                        <div class="row pl-5 mt-4">
                            <div class="col-md-6">
                                <a href="{{ route('inscription', [
                                        'filiere_id' => $filiere->id,
                                        'etablissement_id' => $filiere->etablissement->id,
                                        'diplome_requis' => $filiere->diplome_requis,
                                        'diplome_final' => $filiere->diplome_final
                                    ]) }}"
                                  class="btn btn-primary font-weight-bold w-75 now">
                                  INSCRIVEZ VOUS MAINTENANT
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div class="d-flex justify-content-center">
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