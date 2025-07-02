<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Statistiques Avis sur Etablissements</title>
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
                                        <h4 class="mb-sm-0 font-size-18">ESPACE AVIS ETABLISSEMENTS</h4>
                                    </div>

                                    <div class="row">
                                        <!-- Statut des avis -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Statut des avis</h5>
                                                    <div class="chart-container" style="height: 220px;">
                                                        <canvas id="statusChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Évolution mensuelle -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Avis par mois</h5>
                                                    <div class="chart-container" style="height: 220px;">
                                                        <canvas id="monthlyChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Répartition des notes -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Répartition des notes</h5>
                                                    <div class="chart-container" style="height: 220px;">
                                                        <canvas id="ratingChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Listes des avis visibles ({{$avis_visible->count()}})</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Prenom</th>
                                                            <th class="align-middle">Email</th>
                                                            <th class="align-middle">Avis</th>
                                                            <th class="align-middle">Note</th>
                                                            <th class="align-middle">Etablissement</th>
                                                            <th class="align-middle">Etat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($avis_visible as $avi)
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
                                            <h4 class="card-title mb-4">Liste des avis à valider ({{$avis_non_visible->count()}})</h4>
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
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($avis_non_visible as $avi)
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
        document.addEventListener('DOMContentLoaded', function() {
            // Données passées depuis le contrôleur
            const chartData = @json($chartData);
            const monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

            // 1. Graphique statut (Doughnut)
            new Chart(document.getElementById('statusChart'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(chartData.status),
                    datasets: [{
                        data: Object.values(chartData.status),
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
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
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.raw} avis`;
                                }
                            }
                        }
                    }
                }
            });

            // 2. Graphique mensuel (Bar)
            const monthlyLabels = Object.keys(chartData.monthly).map(m => monthNames[m-1]);
            new Chart(document.getElementById('monthlyChart'), {
                type: 'bar',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Nombre d\'avis',
                        data: Object.values(chartData.monthly),
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

            // 3. Graphique notes (Radar)
            const ratingLabels = Object.keys(chartData.ratings).map(n => `${n} étoile(s)`);
            new Chart(document.getElementById('ratingChart'), {
                type: 'radar',
                data: {
                    labels: ratingLabels,
                    datasets: [{
                        label: 'Nombre d\'avis',
                        data: Object.values(chartData.ratings),
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        pointBackgroundColor: 'rgba(255, 206, 86, 1)',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
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