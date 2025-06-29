<!doctype html>
<html lang="fr">
  <head>
    <title>Inscription</title>
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
        <form method="POST" action="{{ route('store.inscription') }}">
            @csrf
            <div class="row mb-3">
                <div class="col text-center">
                    <h5>Informations personnelle</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Non(*)</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->name ?? '' }}" placeholder="Votre nom" required readonly>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Prénom(s)(*)</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->firstname ?? '' }}" placeholder="Votre prénom" required readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Date de naissance (jj/mm/aaaa)(*)</label>
                    <input type="date" class="form-control" name="date_naissance">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Genre</label>
                    <select class="form-control" name="genre">
                        <option>Pas spécifié</option>
                        <option>Masculin</option>
                        <option>Féminin</option>
                      </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Ville(*)</label>
                    <input type="text" class="form-control" name="ville" placeholder="Ville où vous residez">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Commune/Quartier</label>
                    <input type="text" class="form-control" name="commune_quartier" placeholder="Lieu d'habitation">
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
                    <input type="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" placeholder="Votre email" required readonly>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Numéro de téléphone(*)</label>
                    <input type="text" class="form-control" name="telephone" placeholder="Votre numéro de téléphone" required>
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
                    <select class="form-control" name="niveau_etude" required>
                        <option>Choisissez votre niveau d'etude</option>
                        @foreach($diplome_requis as $requis)
                            <option value="{{ $requis }}"
                                {{ isset($diplomeRequisAuto) && $diplomeRequisAuto == $requis ? 'selected' : '' }}>
                                {{ $requis }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="formGroupExampleInput">Année d'obtention du diplôme (*)</label>
                    <input type="text" class="form-control" name="annee_obtention_diplome" required>
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
                    <select class="form-control" name="diplome_souhait" required>
                        <option>Choisissez le diplôme que vous souhaitez</option>
                        @foreach($diplome_final as $final)
                            <option value="{{ $final }}"
                                {{ isset($diplomeFinalAuto) && $diplomeFinalAuto == $final ? 'selected' : '' }}>
                                {{ $final }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col text-center">
                    <h5>Forme d'etude</h5>
                </div>
            </div>
            <div class="row form-group text-center">
                @foreach($mode_etudes as $mode_etude)
                    <div class="col-md-4 mb-4">
                        <input class="form-check-input" type="radio" name="mode_etude_id" id="inlineRadio{{ $mode_etude->id }}" value="{{ $mode_etude->id }}" required>
                        <label class="form-check-label" for="inlineRadio{{ $mode_etude->id }}">{{ $mode_etude->nom }}</label>
                    </div>
                @endforeach
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                <label for="formGroupExampleInput">Domaine d'etude(*)</label>
                <select class="form-control" name="filiere_id" required>
                    <option>Filière choisit</option>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}"
                            {{ isset($filiereSelectionnee) && $filiereSelectionnee->id == $filiere->id ? 'selected' : '' }}>
                            {{ $filiere->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-4">
                <label for="etablissementSelect">Choisissez votre université(*)</label>
                <select class="form-control" name="etablissement_id" required>
                    <option>Université choisit</option>
                    @foreach($etablissements as $etab)
                        <option value="{{ $etab->id }}"
                            {{ isset($etablissementSelectionne) && $etablissementSelectionne->id == $etab->id ? 'selected' : '' }}>
                            {{ $etab->nom }}
                        </option>
                    @endforeach
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
                    <textarea class="form-control" name="info_additionnel" id="exampleFormControlTextarea1" rows="10"></textarea>
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