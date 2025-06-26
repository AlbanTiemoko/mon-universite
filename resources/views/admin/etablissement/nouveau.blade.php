<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Nouvel Etablissement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" charset="utf-8"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/assets/libs/@chenfengyuan/datepicker/datepicker.min.css">

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
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">ENREGISTREMENT ETABLISSEMENT</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <form method="POST" action="{{ route('store.etablissement') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Reference Etablissement(*)</label>
                                                                        <input type="text" class="form-control" name="reference" placeholder="Groupe EDHEC" required>
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Non Etablissement(*)</label>
                                                                        <input type="text" class="form-control" name="nom" placeholder="Nom etablissement" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Numero Telephone(s)(*)</label>
                                                                        <input type="text" class="form-control" name="numero" placeholder="Numero telephone" required>
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Deuxime Numero Telephone(*)</label>
                                                                        <input type="text" class="form-control" name="deuxieme_numero" placeholder="Deuxieme numero etablissement" required>
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Email(*)</label>
                                                                        <input type="text" class="form-control" name="email" placeholder="Adresse email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Logo(*)</label>
                                                                        <input type="file" class="form-control" name="logo" required>
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Image de Couverture(*)</label>
                                                                        <input type="file" class="form-control" name="cover" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Longitude(*)</label>
                                                                        <input type="text" class="form-control" name="longitude" placeholder="-123456778" required>
                                                                    </div>
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Lagitude(*)</label>
                                                                        <input type="text" class="form-control" name="latitude" placeholder="-123456778" required>
                                                                    </div>
                                                                </div>
                                                                <div id="localisation-group">
                                                                    <div class="location-row row mb-3">
                                                                        <div class="col">
                                                                            <label>Ville</label>
                                                                            <select name="ville_id[]" class="form-control" required>
                                                                                @foreach($villes as $ville)
                                                                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label>Commune</label>
                                                                            <select name="commune_id[]" class="form-control">
                                                                                <option value="">Aucune</option>
                                                                                @foreach($communes as $commune)
                                                                                    <option value="{{ $commune->id }}">{{ $commune->nom }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label>Rue</label>
                                                                            <input type="text" name="rue[]" class="form-control" placeholder="Ex: Paris Village" required>
                                                                        </div>
                                                                        <div class="col-auto d-flex align-items-end">
                                                                            <button type="button" class="btn btn-danger remove-location">✖</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="button" id="add-location" class="btn btn-sm btn-primary">Ajouter un emplacement</button>

                                                                <div class="row form-group">
                                                                    <div class="col my-4">
                                                                        <label for="formGroupExampleInput">URL Spot Publicitaire(Optionnel)</label>
                                                                        <input type="website" class="form-control" name="url_spot" placeholder="https://www.youtube.com/watch?v=9gAoG5juqTE&t=1455s" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col mb-4">
                                                                        <label for="formGroupExampleInput">Description Etablissement(*)</label>
                                                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col mb-4 text-center">
                                                                        <input type="hidden" name="etat" value="1">
                                                                        <button type="submit" class="btn btn-primary font-weight-bold w-25">ENREGISTRER L'ETABLISSEMENT</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>

                                </div>
                         </div>
                    </div>
                    <!-- container-fluid -->
            <!-- end main content-->

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <script src="/assets/libs/select2/js/select2.min.js"></script>
        <script src="/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="/assets/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>

        <!-- form advanced init -->
        <script src="/assets/js/pages/form-advanced.init.js"></script>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- apexcharts -->
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="/assets/js/pages/dashboard.init.js"></script>

        <script src="/assets/js/app.js"></script>
        <!-- En fin de body -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        document.getElementById('add-location').addEventListener('click', function () {
            let group = document.querySelector('.location-row');
            let clone = group.cloneNode(true);
            
            // Vider les champs
            clone.querySelectorAll('input, select').forEach(input => input.value = '');
            document.getElementById('localisation-group').appendChild(clone);
        });

        // Suppression d’un bloc
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-location')) {
                const rows = document.querySelectorAll('.location-row');
                if (rows.length > 1) {
                    e.target.closest('.location-row').remove();
                }
            }
        });
        </script>


    </body>

</html>