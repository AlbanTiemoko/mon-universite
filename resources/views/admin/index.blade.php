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

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Nombres Etudiants</p>
                                                            <h4 class="mb-0">1,235</h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center">
                                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                                <span class="avatar-title">
                                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Nombres Etablissements</p>
                                                            <h4 class="mb-0">$35, 723</h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center ">
                                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Nombres Abonnés</p>
                                                            <h4 class="mb-0">$16.2</h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center">
                                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Nombres Inscriptions</p>
                                                            <h4 class="mb-0">$16.2</h4>
                                                        </div>

                                                        <div class="flex-shrink-0 align-self-center">
                                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Espace pour graphique</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Espace pour graphique</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Espace pour graphique</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Espace pour graphique</p>
                                                        </div>
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
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Total</th>
                                                            <th class="align-middle">Payment Status</th>
                                                            <th class="align-middle">Payment Method</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                                            <td>Neal Matthews</td>
                                                            <td>
                                                                07 Oct, 2019
                                                            </td>
                                                            <td>
                                                                $400
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                            </td>
                                                            <td>
                                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                            </td>
                                                        </tr>
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
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Total</th>
                                                            <th class="align-middle">Payment Status</th>
                                                            <th class="align-middle">Payment Method</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                                            <td>Neal Matthews</td>
                                                            <td>
                                                                07 Oct, 2019
                                                            </td>
                                                            <td>
                                                                $400
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                            </td>
                                                            <td>
                                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                            </td>
                                                        </tr>
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
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Total</th>
                                                            <th class="align-middle">Payment Status</th>
                                                            <th class="align-middle">Payment Method</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                                            <td>Neal Matthews</td>
                                                            <td>
                                                                07 Oct, 2019
                                                            </td>
                                                            <td>
                                                                $400
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                            </td>
                                                            <td>
                                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                            </td>
                                                        </tr>
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
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Billing Name</th>
                                                            <th class="align-middle">Date</th>
                                                            <th class="align-middle">Total</th>
                                                            <th class="align-middle">Payment Status</th>
                                                            <th class="align-middle">Payment Method</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                                            <td>Neal Matthews</td>
                                                            <td>
                                                                07 Oct, 2019
                                                            </td>
                                                            <td>
                                                                $400
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                            </td>
                                                            <td>
                                                                <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                            </td>
                                                        </tr>
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
    </body>

</html>