<!doctype html>
<html lang="fr">
  <head>
    <title>Détails de l'Université</title>
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
    <link rel="stylesheet" href="/assets/css/presentation_school.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  </head>
  <body>
    
  @include('components.menu')

      <div class="header_img">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center font-weight-bold py-5 text-white">
                    <a href="{{ route('accueil') }}" class="text_header">Accueil</a><span> / </span><a href="{{ route('filieres') }}" class="text_header">Filières & Universités </a><span>/ Informations générales</span>
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
      
      <div class="bg-white mb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              
                <div class="row mb-5">
                    <div class="col">
                        <img src="{{ asset($etablissement->cover) }}" class="d-block w-100" alt="cover">
                    </div>
                </div>
              <div class="container my-5">
                <div class="row mb-2">
                      <div class="col">
                          <h2>{{$etablissement->reference}} en vidéo</h2>
                      </div>
                  </div>
                <div class="row">
                    <div class="col">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="500" height="310" class="embed-responsive-item"
                                    src="{{ $etablissement->url_spot_embed }}" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
              </div>
                <div class="container">
                  <div class="row mb-2">
                      <div class="col">
                          <h2>PRESENTATION</h2>
                      </div>
                  </div>
                  <div class="row mb-2">
                      <div class="col">
                          <p class="text-justify">{{$etablissement->description}}</p>
                      </div>
                  </div>
                
                  <div class="row mb-5">
                      <div class="col text-center">
                          <a href="#" class="btn btn-primary mr-3">TELECHARGER LA BROCHURE</a> 
                          <a href="{{ route('filieres.school', $etablissement->slug) }}" class="btn btn-danger ml-5">TOUTES LES FILIERES</a>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                        <div id="map" style="height: 500px; width: 100%;"></div>
                      </div>
                  </div>
                  <div class="container my-5">
                    <h2 class="text-center">Donnez Votre Avis</h2>
                    <form method="POST" action="{{ route('store.avis') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Votre Nom</label>
                            <input type="text" class="form-control" name="nom"
                                    value="{{ auth()->check() ? auth()->user()->name : '' }}"
                                    placeholder="Entrez votre nom" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="email" class="form-label">Votre Email</label>
                            <input type="email" class="form-control" name="email"
                                    value="{{ auth()->check() ? auth()->user()->email : '' }}"
                                    placeholder="Entrez votre email" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="review" class="form-label">Votre Avis</label>
                            <textarea class="form-control" name="avis" rows="4" placeholder="Rédigez votre avis ici" required></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="rating" class="form-label">Notez-nous</label>
                            <div class="star-rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="note" id="star{{ $i }}" value="{{ $i }}">
                                    <label for="star{{ $i }}"></label>
                                @endfor
                            </div>
                        </div>
                        <input type="hidden" name="etablissement_id" value="{{ $etablissement->id }}">
                        <button type="submit" class="btn btn-primary">Envoyer Votre Avis</button>
                    </form>
                </div>

                @foreach($avis as $avi)
                <div class="row mb-3"> 
                  <div class="col">
                    <div class="user-review">
                      <h4>{{$avi->nom}}</h4>
                      <p><strong>Email:</strong> {{$avi->email}}</p>
                      <p><strong>Avis:</strong> {{$avi->avis}}</p>
                      <div>
                            <strong>Note :</strong>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $avi->note)
                                    <span style="color: gold;">&#9733;</span> {{-- étoile pleine --}}
                                @else
                                    <span style="color: #ccc;">&#9733;</span> {{-- étoile vide --}}
                                @endif
                            @endfor
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              
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

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('map').setView([{{ $etablissement->longitude }}, {{ $etablissement->latitude }}], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([{{ $etablissement->longitude }}, {{ $etablissement->latitude }}])
                .addTo(map)
                .bindPopup("{{ $etablissement->nom }}")
                .openPopup();
        });
    </script>
  </body>
</html>