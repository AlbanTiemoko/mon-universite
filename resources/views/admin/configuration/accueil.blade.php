<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Espace Configuration</title>
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
                                        <h4 class="mb-sm-0 font-size-18">ESPACE CONFIGURATION</h4>
                                    </div>

                                    <div class="row mb-4">
                                        <!-- Statistiques Villes -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-city me-2"></i> Statistiques des Villes
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="stat-card bg-primary text-white p-3 rounded mb-3">
                                                                <h6>Total Villes</h6>
                                                                <h3>{{ $villeStats['total'] }}</h3>
                                                                <small>Dont {{ $villeStats['recent'] }} ce mois-ci</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="chart-container" style="height: 200px;">
                                                                <canvas id="villeChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Statistiques Communes -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-map-marked-alt me-2"></i> Statistiques des Communes
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="stat-card bg-success text-white p-3 rounded mb-3">
                                                                <h6>Total Communes</h6>
                                                                <h3>{{ $communeStats['total'] }}</h3>
                                                                <small>Dont {{ $communeStats['with_ville'] }} avec ville</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="chart-container" style="height: 200px;">
                                                                <canvas id="communeChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deuxième ligne -->
                                    <div class="row mb-4">
                                        <!-- Modes d'étude -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3 text-dark"> <!-- Changement de couleur -->
                                                        <i class="fas fa-graduation-cap me-2 text-primary"></i> Modes d'Étude
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="stat-card border border-primary p-3 rounded mb-3 bg-white"> <!-- Fond blanc -->
                                                                <h6 class="text-muted">Total Modes</h6>
                                                                <h3 class="text-dark">{{ $modeEtudeStats['total'] }}</h3> <!-- Texte foncé -->
                                                                <small class="text-muted">Dont {{ $modeEtudeStats['recent'] }} récents</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="chart-container" style="height: 200px;">
                                                                <canvas id="modeEtudeChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Statistiques combinées -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-chart-pie me-2"></i> Vue d'Ensemble
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="combinedChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
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
            function confirmerSuppression(id) {
                var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette filiere ?");
                return confirmation;
            }
        </script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const villeStats = @json($villeStats);
            const communeStats = @json($communeStats);
            const modeEtudeStats = @json($modeEtudeStats);
            const monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

            // 1. Graphique villes (Line)
            const villeLabels = Object.keys(villeStats.by_month).map(m => monthNames[m-1]);
            new Chart(document.getElementById('villeChart'), {
                type: 'line',
                data: {
                    labels: villeLabels,
                    datasets: [{
                        label: 'Nouvelles villes',
                        data: Object.values(villeStats.by_month),
                        borderColor: '#4e73df',
                        backgroundColor: 'rgba(78, 115, 223, 0.1)',
                        tension: 0.3,
                        fill: true
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

            // 2. Graphique communes (Bar)
            new Chart(document.getElementById('communeChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(communeStats.by_ville),
                    datasets: [{
                        label: 'Communes par ville',
                        data: Object.values(communeStats.by_ville),
                        backgroundColor: '#1cc88a',
                        borderColor: '#1cc88a'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });

            // 3. Graphique modes d'étude (Doughnut)
            new Chart(document.getElementById('modeEtudeChart'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(modeEtudeStats.popular),
                    datasets: [{
                        data: Object.values(modeEtudeStats.popular),
                        backgroundColor: ['#36b9cc', '#1cc88a', '#f6c23e'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%'
                }
            });

            // 4. Graphique combiné (Bar)
            new Chart(document.getElementById('combinedChart'), {
                type: 'bar',
                data: {
                    labels: ['Villes', 'Communes', 'Modes d\'étude'],
                    datasets: [{
                        label: 'Total',
                        data: [
                            villeStats.total,
                            communeStats.total,
                            modeEtudeStats.total
                        ],
                        backgroundColor: '#4e73df'
                    }, {
                        label: 'Récent (30j)',
                        data: [
                            villeStats.recent,
                            communeStats.recent || 0,
                            modeEtudeStats.recent
                        ],
                        backgroundColor: '#f6c23e'
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