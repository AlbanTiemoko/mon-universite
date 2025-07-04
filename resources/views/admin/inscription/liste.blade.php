<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Liste des Demandes d'Inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" charset="utf-8"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/FAVICON/Flaticon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/index.css">
        <link rel="stylesheet" href="{{asset("assets/css/header-fixed.css")}}">

    </head>

    <body>

        <!-- Begin page -->
            
            @include('components.header-top')
            
                    <div class="container-fluid">

                        <div class="row">
                            @include('components.sidebar')
                            <!-- start page title -->
                                <div class="col-md-10 mt-4">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">LISTE DES DEMANDES D'INSCRIPTION ({{ $inscriptions->count() }})</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('liste.inscription') }}" method="GET">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Reférence</label>
                                                                        <input type="text" class="form-control" name="reference" value="{{ request('reference') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Date Demande</label>
                                                                        <input type="date" class="form-control" name="date_demande" value="{{ request('date_demande') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Nom Etudiant</label>
                                                                        <input type="text" class="form-control" name="nom" value="{{ request('nom') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Prenom Etud</label>
                                                                        <input type="text" class="form-control" name="prenom" value="{{ request('prenom') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Numero Tel</label>
                                                                        <input type="text" class="form-control" name="telephone" value="{{ request('telephone') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Niveau d'etude</label>
                                                                        <input type="text" class="form-control" name="niveau_etude" value="{{ request('niveau_etude') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Diplome final</label>
                                                                        <input type="text" class="form-control" name="diplome_final" value="{{ request('diplome_final') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Forme d'etude</label>
                                                                        <input type="text" class="form-control" name="forme_etude" value="{{ request('forme_etude') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Etablissement</label>
                                                                        <input type="text" class="form-control" name="etablissement" value="{{ request('etablissement') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Etat</label>
                                                                        <select class="form-control select2" name="etat">
                                                                            <option value=""></option>
                                                                            <option value="1" {{ request('etat')=='1' ? 'selected':'' }}>Envoyé</option>
                                                                            <option value="2" {{ request('etat')=='2' ? 'selected':'' }}>Traité</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="formGroupExampleInput" class="text-white">Numero(*)</label>
                                                                        <button type="submit" class="btn btn-primary font-weight-bold">RECHERCHER</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4"></h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Reférence</th>
                                                            <th class="align-middle">Date Demande</th>
                                                            <th class="align-middle">Nom Etudiant</th>
                                                            <th class="align-middle">Prenom Etudiant</th>
                                                            <th class="align-middle">Numero Telephone</th>
                                                            <th class="align-middle">Niveau d'etude</th>
                                                            <th class="align-middle">Diplome souhaité</th>
                                                            <th class="align-middle">Forme d'etude</th>
                                                            <th class="align-middle">Etablissement</th>
                                                            <th class="align-middle">Etat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($inscriptions as $inscription)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $inscription->reference }}</a> </td>
                                                            <td>{{ $inscription->created_at }}</td>
                                                            <td>{{ $inscription->user->name }}</td>
                                                            <td>{{ $inscription->user->firstname }}</td>
                                                            <td>{{ $inscription->telephone }}</td>
                                                            <td>{{ $inscription->niveau_etude }}</td>
                                                            <td>{{ $inscription->diplome_souhait }}</td>
                                                            <td>{{ $inscription->mode_etude->nom }}</td>
                                                            <td>{{ $inscription->etablissement->nom }}</td>
                                                            <td>
                                                                @if ($inscription->etat == '1')
                                                                    <span class="badge badge-traite">Envoyé</span>
                                                                @else ($inscription->etat == '2')
                                                                    <span class="badge badge-ferme">Traité</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->

                                            
                                        </div>
                                    </div>
                                </div>
                         </div>
                    </div>
                    <!-- container-fluid -->
            <!-- end main content-->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <!-- En fin de body -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>