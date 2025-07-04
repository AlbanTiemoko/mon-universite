<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Liste Avis Etablissements</title>
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
                                        <h4 class="mb-sm-0 font-size-18">LISTE DES AVIS ETABLISSEMENTS ({{$avis->count()}})</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('liste.avis') }}" method="GET">
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Date</label>
                                                                        <input type="date" class="form-control" name="date" value="{{ request('date') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Nom</label>
                                                                        <input type="text" class="form-control" name="nom" value="{{ request('nom') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Email</label>
                                                                        <input type="text" class="form-control" name="email" value="{{ request('email') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Avis</label>
                                                                        <input type="text" class="form-control" name="avis" value="{{ request('avis') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Nom Etablissement</label>
                                                                        <input type="text" class="form-control" name="etablissement" value="{{ request('etablissement') }}">
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Etat</label>
                                                                        <select class="form-control" name="etat">
                                                                            <option value="">Tous</option>
                                                                            <option value="0" {{ request('etat') === '0' ? 'selected' : '' }}>Non Visible</option>
                                                                            <option value="1" {{ request('etat') === '1' ? 'selected' : '' }}>Visible</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="formGroupExampleInput" class="text-white">Numero(*)</label></br>
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
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Nom</th>
                                                            <th class="align-middle">Email</th>
                                                            <th class="align-middle">Avis</th>
                                                            <th class="align-middle">Note</th>
                                                            <th class="align-middle">Etablissement</th>
                                                            <th class="align-middle">Etat</th>
                                                            <th class="align-middle">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($avis as $avi)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$avi->created_at}}</a> </td>
                                                            <td>{{$avi->nom}}</td>
                                                            <td>{{$avi->email}}</td>
                                                            <td>{{$avi->avis}}</td>
                                                            <td>
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $avi->note)
                                                                        <span style="color: gold;">&#9733;</span> {{-- étoile pleine --}}
                                                                    @else
                                                                        <span style="color: #ccc;">&#9733;</span> {{-- étoile vide --}}
                                                                    @endif
                                                                @endfor
                                                            </td>
                                                            <td>{{$avi->etablissement->nom}}</td>
                                                            <td>
                                                                @if ($avi->etat == '1')
                                                                    <span class="badge badge-ouvert">Visible</span>
                                                                @else ($avi->etat == '0')
                                                                    <span class="badge badge-ferme">Non visible</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($avi->etat != 1)
                                                                <form onsubmit="return confirmerValidation({{ $avi->id }})" action="{{ route('etat.avis', ['id' => $avi->id, 'etat' => 1]) }}" method="POST">
                                                                    @csrf
                                                                    {{method_field('PUT')}}
                                                                    <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">Valider</button>
                                                                </form>
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

        <script>
        function confirmerValidation(id) {
            var confirmation = confirm("Êtes-vous sûr de vouloir valider cet avis ?");
            return confirmation;
        }
        </script>
    </body>

</html>