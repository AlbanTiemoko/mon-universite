    <div class="container-fluid bg-success">
      <div class="">
          <div class="row">
              <div class="col d-flex align-items-center justify-content-center">
                  <a href="#" class="text-white"><i class="fa fa-envelope"></i> infos@monuniversite.ci</a>
              </div>
              <div class="col d-flex align-items-center justify-content-center">
                  <a href="#" class="text-white"><i class="fa fa-phone"></i> (+225) 07 599 233 63 / 01 016 484 75</a>
              </div>
              <div class="col d-flex align-items-center justify-content-center">
                    <a class="btn btn-outline-warning bg-warning font-weight-bold mr-4" href="{{ route('student.connexion') }}">ESPACE ETUDIANT</a>
                    <a class="btn btn-outline-white bg-white text-dark font-weight-bold" href="{{ route('etablissement.connexion') }}">ESPACE ETABLISSEMENT</a>
              </div>
          </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row my-lg-5 d-flex justify-content-center">
          <div class="col-md-4 align-self-center">
              <a href="{{ route('accueil') }}">
              <img src="/assets/Images/LOGO.png" alt="logo"></a>
          </div>
          <div class="col-md-8 align-self-center image-container">
              <img src="/assets/Images/MOOV-LEADERBOARD-ENCART-22012021-2.jpg" alt="bannière publicitaire">
          </div>
      </div>
    </div>
    <div class="bg-light d-flex justify-content-center align-items-center">
      <div class="container mt-3 text-center">
        <div class="row font-weight-bold">
          <nav class="col navbar navbar-expand-lg navbar-light justify-content-between">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="nav-item {{ Route::is('accueil') ? 'active' : '' }}">
                    <a class="nav-link mr-3" href="{{ route('accueil') }}">ACCUEIL</a>
                </li>
                <li class="nav-item {{ Route::is('filieres') ? 'active' : '' }}">
                    <a class="nav-link ml-5 mr-3" href="{{ route('filieres') }}">FILIERES INDUSTRIELLE</a>
                </li>
                <li class="nav-item {{ Route::is('filieres.tertiaire') ? 'active' : '' }}">
                    <a class="nav-link ml-5 mr-3" href="{{ route('filieres.tertiaire') }}">FILIERES TERTIAIRES</a>
                </li>
                <li class="nav-item {{ Route::is('formations') ? 'active' : '' }}">
                    <a class="nav-link ml-5 mr-3" href="{{ route('formations') }}">FORMATIONS QUALIFIANTES</a>
                </li>
                <li class="nav-item {{ Route::is('blog') ? 'active' : '' }}">
                    <a class="nav-link ml-5 mr-3" href="{{ route('blog') }}">BLOG</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>