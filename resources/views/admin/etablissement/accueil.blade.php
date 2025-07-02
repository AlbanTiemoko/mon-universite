<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Statistiques Etablissements</title>
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                                        <h4 class="mb-sm-0 font-size-18">ESPACE ETABLISSEMENTS</h4>
                                    </div>

                                    <div class="row">
                                        <!-- Graphique de visibilité -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Statut de visibilité</h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="visibilityChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Graphique par ville -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Top 5 des villes</h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="villeChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Graphique tendance création -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Création par année</h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="creationChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Listes des etablissements visibles ({{ $etablissement_visible->count() }})</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Reférence</th>
                                                            <th class="align-middle">Nom Etablissement</th>
                                                            <th class="align-middle">Adresse</th>
                                                            <th class="align-middle">Contacts</th>
                                                            <th class="align-middle">Email</th>
                                                            <th class="align-middle">Etat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($etablissement_visible as $etablissement)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$etablissement->reference}}</a> </td>
                                                            <td>{{$etablissement->nom}}</td>
                                                            <td>{{ $etablissement->adresse_complete }}</td>
                                                            <td>{{ $etablissement->contacts }}</td>
                                                            <td>{{$etablissement->email}}</td>
                                                            <td>
                                                                @if ($etablissement->etat == '1')
                                                                    <span class="badge badge-ouvert">Visible</span>
                                                                @else ($etablissement->etat == '0')
                                                                    <span class="badge badge-ferme">Non visible</span>
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

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Liste des etablissements à valider ({{ $etablissement_non_visible->count() }})</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Reférence</th>
                                                            <th class="align-middle">Nom Etablissement</th>
                                                            <th class="align-middle">Adresse</th>
                                                            <th class="align-middle">Contacts</th>
                                                            <th class="align-middle">Email</th>
                                                            <th class="align-middle">Etat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($etablissement_non_visible as $etablissement)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$etablissement->reference}}</a> </td>
                                                            <td>{{$etablissement->nom}}</td>
                                                            <td>{{ $etablissement->adresse_complete }}</td>
                                                            <td>{{$etablissement->numero}}</td>
                                                            <td>{{$etablissement->email}}</td>
                                                            <td>
                                                                @if ($etablissement->etat == '1')
                                                                    <span class="badge badge-ouvert">Visible</span>
                                                                @else ($etablissement->etat == '0')
                                                                    <span class="badge badge-ferme">Non visible</span>
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

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Données passées depuis le contrôleur
            const chartData = @json($chartData);

            // 1. Graphique de visibilité (Doughnut)
            new Chart(document.getElementById('visibilityChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Visible', 'Non visible'],
                    datasets: [{
                        data: Object.values(chartData.visibility),
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // 2. Graphique par ville (Bar)
            new Chart(document.getElementById('villeChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData.by_ville),
                    datasets: [{
                        label: "Nombre d'établissements",
                        data: Object.values(chartData.by_ville),
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });

            // 3. Graphique tendance (Line)
            new Chart(document.getElementById('creationChart'), {
                type: 'line',
                data: {
                    labels: Object.keys(chartData.creation_trend),
                    datasets: [{
                        label: "Établissements créés",
                        data: Object.values(chartData.creation_trend),
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        </script>

    </body>

</html>