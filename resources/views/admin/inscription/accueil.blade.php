<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Liste des demandes d'inscriptions</title>
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
                                        <h4 class="mb-sm-0 font-size-18">ESPACE DEMANDES D'INSCRIPTION</h4>
                                    </div>

                                    <div class="row">
                                        <!-- Statut des inscriptions -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Statut des inscriptions</h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="statusChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Évolution mensuelle -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Évolution mensuelle</h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="monthlyChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Top établissements -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Top établissements</h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="etablissementChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Listes des demandes d'inscription envoyé pour validation ({{ $inscriptions->count() }})</h4>
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

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Liste des demandes d'inscription traitée ({{ $inscription_traite->count() }})</h4>
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
                                                        @foreach ($inscription_traite as $inscription)
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
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
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

            // 2. Graphique mensuel (Line)
            const monthlyLabels = Object.keys(chartData.monthly).map(m => monthNames[m-1]);
            new Chart(document.getElementById('monthlyChart'), {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Inscriptions',
                        data: Object.values(chartData.monthly),
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

            // 3. Graphique établissements (Bar)
            new Chart(document.getElementById('etablissementChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData.by_etablissement),
                    datasets: [{
                        label: 'Inscriptions traitées',
                        data: Object.values(chartData.by_etablissement),
                        backgroundColor: 'rgba(255, 159, 64, 0.7)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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
        });
        </script>

    </body>

</html>