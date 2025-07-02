<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Tableau de bord | Mon Université</title>
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

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
            
            @include('components.header-top')
            
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                    <div class="container-fluid">

                        <div class="row">
                            @include('components.sidebar')
                            <!-- start page title -->
                                <div class="col-md-10 mt-4">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">TABLEAU DE BORD</h4>
                                    </div>

                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                            <button class="close font-weight-normal" data-dismiss="alert">x</button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <p class="bg-danger p-3 text-white">{{ session('error') }}</p>
                                    @endif

                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card card-chart">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary mb-4">
                                                        <i class="fas fa-users me-2"></i>Étudiants inscrits par mois
                                                    </h5>
                                                    <div class="chart-container">
                                                        <canvas id="studentsChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ligne Établissements -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card card-chart">
                                                <div class="card-body">
                                                    <h5 class="card-title text-success mb-4">
                                                        <i class="fas fa-school me-2"></i>Établissements créés par mois
                                                    </h5>
                                                    <div class="chart-container">
                                                        <canvas id="establishmentsChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ligne Newsletters -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card card-chart">
                                                <div class="card-body">
                                                    <h5 class="card-title text-info mb-4">
                                                        <i class="fas fa-envelope me-2"></i>Abonnements newsletters par mois
                                                    </h5>
                                                    <div class="chart-container">
                                                        <canvas id="newslettersChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ligne Inscriptions (2 colonnes) -->
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <div class="card card-chart">
                                                <div class="card-body">
                                                    <h5 class="card-title text-warning mb-4">
                                                        <i class="fas fa-file-upload me-2"></i>Inscriptions envoyées
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="sentRegistrationsChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card card-chart">
                                                <div class="card-body">
                                                    <h5 class="card-title text-danger mb-4">
                                                        <i class="fas fa-check-circle me-2"></i>Inscriptions traitées
                                                    </h5>
                                                    <div class="chart-container" style="height: 250px;">
                                                        <canvas id="processedRegistrationsChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Listes des etudiant</h4>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-nowrap mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle">Nom</th>
                                                            <th class="align-middle">Prenom</th>
                                                            <th class="align-middle">Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($etudiants as $etudiant)
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$etudiant->name}}</a> </td>
                                                            <td>{{$etudiant->firstname}}</td>
                                                            <td>{{$etudiant->email}}</td>
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
                                            <h4 class="card-title mb-4">Liste des etablissements</h4>
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
                                                        @foreach($etablissements as $etablissement)
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
                                            <h4 class="card-title mb-4">Liste des abonnés à la newsletter</h4>
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

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Liste des demandes d'inscription</h4>
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
                                </div>
                         </div>
                    </div>
                    <!-- container-fluid -->
            <!-- end main content-->
        <!-- END layout-wrapper -->

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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Configuration commune
            const chartConfig = {
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
            };

            // 1. Graphique Étudiants
            createChart(
                'studentsChart',
                'bar',
                @json(array_keys($studentData)),
                @json(array_values($studentData)),
                'rgba(54, 162, 235, 0.7)',
                'Nombre d\'étudiants'
            );

            // 2. Graphique Établissements
            createChart(
                'establishmentsChart',
                'line',
                @json(array_keys($establishmentData)),
                @json(array_values($establishmentData)),
                'rgba(75, 192, 192, 0.7)',
                'Nombre d\'établissements'
            );

            // 3. Graphique Newsletters
            createChart(
                'newslettersChart',
                'bar',
                @json(array_keys($newsletterData)),
                @json(array_values($newsletterData)),
                'rgba(153, 102, 255, 0.7)',
                'Abonnements newsletters'
            );

            // 4. Graphiques Inscriptions
            createChart(
                'sentRegistrationsChart',
                'doughnut',
                @json(array_keys($sentRegistrations)),
                @json(array_values($sentRegistrations)),
                'rgba(255, 159, 64, 0.7)',
                'Inscriptions envoyées'
            );

            createChart(
                'processedRegistrationsChart',
                'doughnut',
                @json(array_keys($processedRegistrations)),
                @json(array_values($processedRegistrations)),
                'rgba(255, 99, 132, 0.7)',
                'Inscriptions traitées'
            );

            // Fonction de création de graphique
            function createChart(elementId, type, labels, data, bgColor, label) {
                const ctx = document.getElementById(elementId).getContext('2d');
                new Chart(ctx, {
                    type: type,
                    data: {
                        labels: labels,
                        datasets: [{
                            label: label,
                            data: data,
                            backgroundColor: bgColor,
                            borderColor: bgColor.replace('0.7', '1'),
                            borderWidth: 1
                        }]
                    },
                    options: chartConfig
                });
            }
        });
        </script>

    </body>

</html>