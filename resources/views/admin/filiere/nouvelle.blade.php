<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Nouvel Filiere</title>
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
                                        <h4 class="mb-sm-0 font-size-18">ENREGISTREMENT FILIERE</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <form action="" method="post">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <div class="row form-group">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Etablissement(*)</label>
                                                                        <select class="form-control " required>
                                                                            <option>Selectionnez un etablissement</option>
                                                                            @foreach($etablissements as $etablissement)
                                                                            <option value="{{ $etablissement->id }}">{{ $etablissement->nom }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Nom Filiere(s)(*)</label>
                                                                        <input type="text" class="form-control" placeholder="informatique developpeur d'application" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Diplome Final(*)</label>
                                                                        <input type="text" class="form-control" placeholder="licence professionnelle" required>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Diplome Requis(*)</label>
                                                                        <input type="text" class="form-control" placeholder="BTS" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Durée(*)</label>
                                                                        <input type="text" class="form-control" placeholder="01 ans" required>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Montant par An(*)</label>
                                                                        <input type="text" class="form-control" placeholder="200 000" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Mode d'etude(*)</label>
                                                                        <select class="form-control " required>
                                                                            <option></option>
                                                                            @foreach($mode_etudes as $mode_etude)
                                                                            <option value="{{ $mode_etude->id }}">{{ $mode_etude->nom }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <label for="formGroupExampleInput">Prise en charge(*)</label>
                                                                        <input type="text" class="form-control" placeholder="25%" required>
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Type de filiere(*)</label>
                                                                        <select class="form-control " required>
                                                                            <option></option>
                                                                            @foreach($type_filieres as $type_filiere)
                                                                            <option value="{{ $type_filiere->id }}">{{ $type_filiere->nom }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col mb-4 text-center">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold w-25">ENREGISTRER LA FILIERE</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
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