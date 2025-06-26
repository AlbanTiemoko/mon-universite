<div class="col-md-2 bg-info text-dark pl-4 pt-4">
    <div class="">
        
        <a href="{{ route('admin.dashboard') }}" class="link {{ Route::is('admin.dashboard') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('admin.dashboard') ? 'text-primary' : '' }}">
                <i class="bx bx-home-circle pr-2 pb-3"></i> Tableau de bord
            </p>
        </a>

        <a href="{{ route('statistique.etablissement') }}" class="link {{ Route::is('statistique.etablissement') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('statistique.etablissement') || route::is('nouvel.etablissement') || Route::is('liste.etablissement') ? 'text-primary' : '' }}">
                <i class="bx bx-layout pr-2 pb-1"></i> Etablissements
            </p>
        </a>
        <a href="{{ route('nouvel.etablissement') }}" class="link {{ Route::is('nouvel.etablissement') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('nouvel.etablissement') ? 'text-primary' : '' }}">Nouveau</h6>
        </a>
        <a href="{{ route('liste.etablissement') }}" class="link {{ Route::is('liste.etablissement') ? 'text-primary' : '' }}">
            <h6 class="pb-3 {{ Route::is('liste.etablissement') ? 'text-primary' : '' }}">Liste</h6>
        </a>

        <a href="{{ route('liste.filiere') }}" class="link {{ Route::is('liste.filiere') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('liste.filiere') || Route::is('nouvelle.filiere') || Route::is('type.filiere.liste') || Route::is('type.filiere.nouveau') ? 'text-primary' : '' }}">
                <i class="bx bx-file pr-2 pb-1"></i> Filieres
            </p>
        </a>
        <a href="{{ route('nouvelle.filiere') }}" class="link {{ Route::is('nouvelle.filiere') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('nouvelle.filiere') ? 'text-primary' : '' }}">Nouvelle filiere</h6>
        </a>
        <a href="{{ route('liste.filiere') }}" class="link {{ Route::is('liste.filiere') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('liste.filiere') ? 'text-primary' : '' }}">Liste</h6>
        </a>
        <a href="{{ route('type.filiere.liste') }}" class="link {{ Route::is('type.filiere.liste') ? 'text-primary' : '' }}">
            <h6 class="pb-3 {{ Route::is('type.filiere.liste') ? 'text-primary' : '' }}">Tags/Type</h6>
        </a>

        <a href="{{ route('statistique.demande.inscription') }}" class="link {{ Route::is('statistique.demande.inscription') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('statistique.demande.inscription') || Route::is('liste.inscription') ? 'text-primary' : '' }}">
                <i class="bx bx-task pr-2 pb-1"></i> Inscriptions
            </p>
        </a>
        <a href="{{ route('liste.inscription') }}" class="link {{ Route::is('liste.inscription') ? 'text-primary' : '' }}">
            <h6 class="pb-3 {{ Route::is('liste.inscription') ? 'text-primary' : '' }}">Liste</h6>
        </a>

        <a href="{{ route('stats.avis') }}" class="link {{ Route::is('stats.avis') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('stats.avis') || Route::is('liste.avis') ? 'text-primary' : '' }}">
                <i class="bx bx-chat pr-2 pb-1"></i> Avis etablissements
            </p>
        </a>
        <a href="{{ route('liste.avis') }}" class="link {{ Route::is('liste.avis') ? 'text-primary' : '' }}">
            <h6 class="pb-3 {{ Route::is('liste.avis') ? 'text-primary' : '' }}">Liste</h6>
        </a>

        <a href="{{ route('newsletters') }}" class="link {{ Route::is('newsletters') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('newsletters') ? 'text-primary' : '' }}">
                <i class="bx bx-detail pr-2 pb-1"></i> Newsletters
            </p>
        </a>
        <a href="{{ route('newsletters') }}" class="link {{ Route::is('newsletters') ? 'text-primary' : '' }}">
            <h6 class="pb-3 {{ Route::is('newsletters') ? 'text-primary' : '' }}">Liste</h6>
        </a>

        <a href="{{ route('stats.users') }}" class="link {{ Route::is('stats.users') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('stats.users') || Route::is('liste.etudiants') || Route::is('liste.admin') || Route::is('nouveau.admin') ? 'text-primary' : '' }}">
                <i class="bx bxs-user-detail pr-2 pb-1"></i> Utilisateurs
            </p>
        </a>
        <a href="{{ route('liste.etudiants') }}" class="link {{ Route::is('liste.etudiants') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('liste.etudiants') ? 'text-primary' : '' }}">Liste etudiants</h6>
        </a>
        <a href="{{ route('liste.admin') }}" class="link {{ Route::is('liste.admin') ? 'text-primary' : '' }}">
            <h6 class="pb-3 {{ Route::is('liste.admin') ? 'text-primary' : '' }}">Liste administrateurs</h6>
        </a>

        <a href="{{ route('liste.commune') }}" class="link {{ Route::is('liste.commune') ? 'text-primary' : '' }}">
            <p class="font-weight-bold h6 {{ Route::is('liste.commune') || Route::is('liste.commune') || Route::is('nouvelle.ville') || Route::is('nouvelle.commune') || Route::is('liste.mode.etude') || Route::is('nouveau.mode') ? 'text-primary' : '' }}">
                <i class="bx bx-cog pr-2 pb-1"></i> Configuration
            </p>
        </a>
        <a href="{{ route('liste.ville') }}" class="link {{ Route::is('liste.ville') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('liste.ville') ? 'text-primary' : '' }}">Villes</h6>
        </a>
        <a href="{{ route('liste.commune') }}" class="link {{ Route::is('liste.commune') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('liste.commune') ? 'text-primary' : '' }}">Communes/Quartiers</h6>
        </a>
        <a href="{{ route('liste.mode.etude') }}" class="link {{ Route::is('liste.mode.etude') ? 'text-primary' : '' }}">
            <h6 class="pb-1 {{ Route::is('liste.mode.etude') ? 'text-primary' : '' }}">Mode etudes</h6>
        </a>
        <a href="#" class="link"><h6></h6></a>
        
    </div>
</div>