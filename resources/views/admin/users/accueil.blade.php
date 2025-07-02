<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Statistiques Utilisateurs</title>
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
                                        <h4 class="mb-sm-0 font-size-18">ESPACE UTILISATEURS</h4>
                                    </div>

                                    <div class="row mb-4">
                                        <!-- Répartition des types d'utilisateurs -->
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-users-cog me-2"></i>Répartition des utilisateurs
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="userTypesChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Statut de vérification email -->
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-envelope me-2"></i>Vérification email
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="verificationChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deuxième ligne de graphiques -->
                                    <div class="row mb-4">
                                        <!-- Utilisateurs vérifiés -->
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-user-check me-2"></i>Utilisateurs vérifiés
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="verifiedUsersChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Inscriptions mensuelles -->
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">
                                                        <i class="fas fa-chart-line me-2"></i>Inscriptions par mois
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="registrationChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Listes des etudiants</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Nom</th>
                                                            <th class="align-middle">Prenom</th>
                                                            <th class="align-middle">Email</th>
                                                            <th class="align-middle">Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($etudiants as $etudiant)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$etudiant->name}}</a> </td>
                                                            <td>{{$etudiant->firstname}}</td>
                                                            <td>{{$etudiant->email}}</td>
                                                            <td>{{$etudiant->created_at}}</td>
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
                                            <h4 class="card-title mb-4">Liste des administrateur</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Nom</th>
                                                            <th class="align-middle">Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($admins as $admin)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$admin->name}}</a> </td>
                                                            <td>{{$admin->email}}</td>
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
            const chartData = @json($chartData);
            const monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

            // 1. Graphique types d'utilisateurs
            new Chart(document.getElementById('userTypesChart'), {
                type: 'pie',
                data: {
                    labels: Object.keys(chartData.user_types),
                    datasets: [{
                        data: Object.values(chartData.user_types),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.raw} (${context.percentage.toFixed(1)}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // 2. Graphique statut de vérification
            new Chart(document.getElementById('verificationChart'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(chartData.verification_status),
                    datasets: [{
                        data: Object.values(chartData.verification_status),
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 206, 86, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%'
                }
            });

            // 3. Graphique utilisateurs vérifiés
            new Chart(document.getElementById('verifiedUsersChart'), {
                type: 'bar',
                data: {
                    labels: ['Administrateurs', 'Étudiants'],
                    datasets: [{
                        label: 'Vérifiés',
                        data: Object.values(chartData.verified_users),
                        backgroundColor: 'rgba(153, 102, 255, 0.7)',
                        borderColor: 'rgba(153, 102, 255, 1)',
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

            // 4. Graphique inscriptions mensuelles
            const monthlyLabels = Object.keys(chartData.registration_trend.admins).map(m => monthNames[m-1]);
            new Chart(document.getElementById('registrationChart'), {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [
                        {
                            label: 'Administrateurs',
                            data: Object.values(chartData.registration_trend.admins),
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Étudiants',
                            data: Object.values(chartData.registration_trend.etudiants),
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.1)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
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
        });
        </script>

    </body>

</html>