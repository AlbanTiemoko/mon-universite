<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Statistiques Abonnements</title>
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
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">ESPACE ABONNEMENTS NEWSLETTER</h4>
                                    </div>

                                    <div class="row">
                                        <!-- Abonnements mensuels -->
                                        <div class="col-xl-6 col-md-12 mb-4">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-calendar-alt me-2"></i>Abonnements mensuels
                                                    </h5>
                                                    <div class="chart-container" style="height: 300px;">
                                                        <canvas id="monthlyChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Heures d'abonnement -->
                                        <div class="col-xl-6 col-md-12 mb-4">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-clock me-2"></i>Heures d'abonnement
                                                    </h5>
                                                    <div class="chart-container" style="height: 300px;">
                                                        <canvas id="hourlyChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Évolution annuelle -->
                                        <div class="col-12 mb-4">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-chart-line me-2"></i>Évolution annuelle
                                                    </h5>
                                                    <div class="chart-container" style="height: 350px;">
                                                        <canvas id="growthChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('newsletters') }}" method="GET">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <div class="row form-group">
                                                            <div class="col mb-4">
                                                                <label for="formGroupExampleInput">Date</label>
                                                                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                                                            </div>
                                                            <div class="col mb-4">
                                                                <label for="formGroupExampleInput">Nom</label>
                                                                <input type="text" name="name" class="form-control" value="{{ request('name') }}">
                                                            </div>
                                                            <div class="col mb-4">
                                                                <label for="formGroupExampleInput">Email</label>
                                                                <input type="text" name="email" class="form-control" value="{{ request('email') }}">
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

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Listes des abonnés à la newsletter ({{ $newsletters->count() }})</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Nom & Prenom</th>
                                                            <th class="align-middle">Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($newsletters as $newsletter)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $newsletter->nom_prenom }}</a> </td>
                                                            <td>{{ $newsletter->email }}</td>
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
            const monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

            // 1. Graphique mensuel (Line)
            const monthlyLabels = Object.keys(chartData.monthly).map(m => monthNames[m-1]);
            new Chart(document.getElementById('monthlyChart'), {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Abonnements',
                        data: Object.values(chartData.monthly),
                        backgroundColor: 'rgba(58, 159, 241, 0.2)',
                        borderColor: 'rgba(58, 159, 241, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.parsed.y} abonnements`;
                                }
                            }
                        }
                    },
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

            // 2. Graphique horaire (Bar)
            const hourlyLabels = Object.keys(chartData.hourly).map(h => `${h}h`);
            new Chart(document.getElementById('hourlyChart'), {
                type: 'bar',
                data: {
                    labels: hourlyLabels,
                    datasets: [{
                        label: 'Abonnements',
                        data: Object.values(chartData.hourly),
                        backgroundColor: 'rgba(105, 108, 255, 0.7)',
                        borderColor: 'rgba(105, 108, 255, 1)',
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

            // 3. Graphique évolution annuelle (Bar)
            new Chart(document.getElementById('growthChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData.growth),
                    datasets: [{
                        label: 'Abonnements',
                        data: Object.values(chartData.growth),
                        backgroundColor: Object.keys(chartData.growth).map((year, i) => 
                            `hsl(${i * 30}, 70%, 60%)`
                        ),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
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
        });
        </script>

    </body>

</html>