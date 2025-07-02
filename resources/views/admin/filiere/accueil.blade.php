<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Liste des Filiers</title>
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
                                        <h4 class="mb-sm-0 font-size-18">ESPACE FILIERE/TYPE FILIERES</h4>
                                    </div>

                                    <div class="row mb-4">
                                        <!-- Répartition par type -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-tags me-2"></i>Répartition par type de filière
                                                    </h5>
                                                    <div class="chart-container" style="height: 300px;">
                                                        <canvas id="typeChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Top établissements -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-university me-2"></i>Top établissements
                                                    </h5>
                                                    <div class="chart-container" style="height: 300px;">
                                                        <canvas id="etablissementChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deuxième ligne -->
                                    <div class="row mb-4">
                                        <!-- Montant moyen -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-money-bill-wave me-2"></i>Montant moyen par type
                                                    </h5>
                                                    <div class="chart-container" style="height: 300px;">
                                                        <canvas id="montantChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Durée des formations -->
                                        <div class="col-xl-6 col-md-12">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-clock me-2"></i>Durée des formations
                                                    </h5>
                                                    <div class="chart-container" style="height: 300px;">
                                                        <canvas id="dureeChart"></canvas>
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
            const chartData = @json($chartData);

            // 1. Graphique par type (Pie)
            new Chart(document.getElementById('typeChart'), {
                type: 'pie',
                data: {
                    labels: Object.keys(chartData.by_type),
                    datasets: [{
                        data: Object.values(chartData.by_type),
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56', 
                            '#4BC0C0', '#9966FF', '#FF9F40'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });

            // 2. Graphique établissements (Bar)
            new Chart(document.getElementById('etablissementChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData.by_etablissement),
                    datasets: [{
                        label: 'Nombre de filières',
                        data: Object.values(chartData.by_etablissement),
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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

            // 3. Graphique montant moyen (Horizontal Bar)
            new Chart(document.getElementById('montantChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData.montant_moyen),
                    datasets: [{
                        label: 'Montant moyen (FCFA)',
                        data: Object.values(chartData.montant_moyen),
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // 4. Graphique durée (Radar)
            new Chart(document.getElementById('dureeChart'), {
                type: 'radar',
                data: {
                    labels: Object.keys(chartData.duree_distribution).map(d => `${d} ans`),
                    datasets: [{
                        label: 'Nombre de filières',
                        data: Object.values(chartData.duree_distribution),
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        pointBackgroundColor: 'rgba(255, 159, 64, 1)',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        </script>

    </body>

</html>