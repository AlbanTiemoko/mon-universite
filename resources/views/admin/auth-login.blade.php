<!doctype html>
<html lang="fr">
  <head>
    <title>Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Favicon-->
    <link rel="apple-touch-icon" href="FAVICON/Appl Touche 57X57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="FAVICON/Appl Touche 72X72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="FAVICON/Appl Touche 114X114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="FAVICON/Appl Touche 114X114.png">
    <link rel="icon" href="FAVICON/Appl Touche 152X152.png">
    <link rel="shortcut icon" href="/assets/FAVICON/Flaticon.ico" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="{{asset("assets/css/header-fixed.css")}}">

  </head>
  <body>

    <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-warning bg-soft">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-dark text-center p-3">
                                            <h5 class="text-dark">Bienvenue !</h5>
                                            <p>Veillez-vous connectez pour accéder au tableau de bord.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="p-4">
                                    <form class="form-horizontal" action="/panel/index.html">
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>
                
                                        <div class="form-group mb-4 text-left position-relative">
                                            <label for="exampleInputPassword1">Mot de passe</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required>
                                            <span class="toggle-password" onclick="togglePassword()" style="position:absolute; right:15px; top:38px; cursor:pointer;">
                                            👁️
                                            </span>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-warning waves-effect waves-light" type="submit">CONNEXION</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>© <script>document.write(new Date().getFullYear())</script> <a href="/index.html">MONUNIVERSITE.CI</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- JAVASCRIPT -->
     <script src="/panel/style/libs/jquery/jquery.min.js"></script>
    <script src="/panel/style/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/panel/style/libs/metismenu/metisMenu.min.js"></script>
    <script src="/panel/style/libs/simplebar/simplebar.min.js"></script>
    <script src="/panel/style/libs/node-waves/waves.min.js"></script>
        
    <!-- App js -->
    <script src="/panel/style/js/app.js"></script>

    <script>
    function togglePassword() {
        const input = document.getElementById("exampleInputPassword1");
        const type = input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
    }
    </script>
    
  </body>
</html>