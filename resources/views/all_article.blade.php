<!doctype html>
<html lang="fr">
  <head>
    <title>Tous les Articles - Trouver Mon Ecole</title>
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
    <link rel="stylesheet" href="/assets/css/all_article.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    @include('components.menu')

      <div class="container mb-4">
        <div class="row">
            <div class="col text-center font-weight-bold pt-5">
                <a href="{{ route('accueil') }}" class="text_header">Accueil</a><span> / Actualités</span>
            </div>
        </div>
      </div>
      <div class="container mb-4">
        <div class="row">
            <div class="col text-center">
                <a href="{{ route('blog') }}" class="btn btn-outline-success rounded-pill mr-3 font-weight-bold text_info">Tous les articles</a>
            </div>
        </div>
      </div>
      <div class="container mt-4">
        <div class="col">
            <div class="row">
                <div class="col text-center">
                    <h2>Notre Blog</h2>
                </div>
            </div>
        </div>
      </div>
      <div class="bg-section">
        <div class="container my-4">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                    <form class="form-inline" amethod="GET" action="{{ route('blog') }}">
                        <label for="annee">Recherche par année :</label>
                            <select class="form-control ml-3 w-50" name="annee" id="annee" onchange="this.form.submit()">
                                <option value="">Toutes les années</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ request('annee') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                    </form>
                </div>
                <div class="col-md-3">
    
                </div>
            </div>
          </div>
      </div>
      <div class="bg-white">
        <div class="container">
          @foreach($articles->chunk(2) as $articleChunk)
            <div class="row mb-4">
              @foreach($articleChunk as $article)
                <div class="col-md-6">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{ asset($article->image) }}" alt="Image article">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('description.article', $article->slug) }}">{{ $article->titre }}</a></h5>
                      <p class="card-text">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->description), 150, '...') }}
                      </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">{{ $article->date }}</small>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach

          {{ $articles->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
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