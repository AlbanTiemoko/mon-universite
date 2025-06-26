<div class="bg-warning">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar">
                            <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/assets/images/LOGO FOND BLANC_Plan de travail 1.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="/assets/images/LOGO FOND BLANC_Plan de travail 1.png" alt="" height="50">
                                </span>
                            </a>

                            <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/assets/images/LOGO FOND BLANC_Plan de travail 1.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="/assets/images/LOGO FOND BLANC_Plan de travail 1.png" alt="" height="50">
                                </span>
                            </a>
                        </div>

            <!--Debut hamburger menu-->
                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
            <!--Fin menu hamburger-->

                    </div>
                    <div class="d-flex align-items-center">
                        <h3 class="text-center text-white text-uppercase me-2">BIENVENUE SUR VOTRE TABLEAU DE BORD</h3>
                        <div class="text-wrap text-white" style="width: 6rem;"></div>
                    </div>
                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect dropdown-toggle"
                                    id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false">
                                <img class="rounded-circle header-profile-user" 
                                    src="{{ asset('assets/Images/avatar.png') }}" 
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ms-1">
                                    {{ Auth::guard('admin')->user()->name }}
                                </span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user font-size-16 align-middle me-1"></i> 
                                    Profil ({{ Auth::guard('admin')->user()->email }})
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                    Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="notificationPanel" aria-labelledby="notificationPanelLabel">
    <div class="offcanvas-header">
      <h4 id="notificationPanelLabel" class="text-secondary"><i class="bx bx-notification pr-2 pb-3 text-warning"></i> Liste des notifications</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="col-lg-12 mb-1">
            <div class="card">
                <div class="card-body border border-warning mb-2">
                    <blockquote class="card-blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer mt-0 font-size-12">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-1">
            <div class="card">
                <div class="card-body border border-warning mb-2">
                    <blockquote class="card-blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer mt-0 font-size-12">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border border-warning mb-2">
                    <blockquote class="card-blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer mt-0 font-size-12">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border border-warning mb-2">
                    <blockquote class="card-blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer mt-0 font-size-12">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>