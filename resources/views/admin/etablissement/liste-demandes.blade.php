<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Liste Demandes Apparition</title>
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

                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                            <button class="close font-weight-normal" data-dismiss="alert">x</button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <p class="bg-danger p-3 text-white">{{ session('error') }}</p>
                                    @endif

                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">LISTE DEMANDES APPARITIONS ({{ $demandes->count() }})</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('liste.demandes') }}" method="GET">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <div class="row form-group">
                                                                    <div class="col-md-3 mb-4">
                                                                        <label for="formGroupExampleInput">Date</label>
                                                                        <input type="date" name="created_at" class="form-control" value="{{ request('created_at') }}">
                                                                    </div>
                                                                    <div class="col-md-3 mb-4">
                                                                        <label for="formGroupExampleInput">Nom etablissement</label>
                                                                        <input type="text" name="nom" class="form-control" value="{{ request('nom') }}">
                                                                    </div>
                                                                    <div class="col-md-3 mb-4">
                                                                        <label for="formGroupExampleInput">Numero etablissement</label>
                                                                        <input type="text" name="numero" class="form-control" value="{{ request('numero') }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="formGroupExampleInput" class="text-white">.</label></br>
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
                                            <h4 class="card-title mb-4">
                                            </h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Reférence</th>
                                                            <th class="align-middle">Nom Etablissement</th>
                                                            <th class="align-middle">Numero</th>
                                                            <th class="align-middle">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($demandes as $demande)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$demande->created_at}}</a> </td>
                                                            <td>{{$demande->reference}}</td>
                                                            <td>{{$demande->nom}}</td>
                                                            <td>{{$demande->numero}}</td>
                                                            <td class="d-flex">
                                                                <form onsubmit="return confirmerSuppression({{ $demande->id }})" action="{{ route('destroy.demande', $demande->id) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></button>
                                                                </form>
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

        <script>
            function confirmerSuppression(id) {
                var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette demande ?");
                return confirmation;
            }
        </script>
    </body>

</html>