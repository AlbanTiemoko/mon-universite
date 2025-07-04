<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('accueil');
    })->name('index');
});

Route::get('/', [App\Http\Controllers\AcceuilController::class, 'accueil'])->name('accueil');
Route::get('/filieres-industrielles', [App\Http\Controllers\AcceuilController::class, 'filiere'])->name('filieres');
Route::get('/filieres-tertiaires', [App\Http\Controllers\AcceuilController::class, 'filiere_tertiaires'])->name('filieres.tertiaire');
Route::get('/formations-qualifiantes', [App\Http\Controllers\AcceuilController::class, 'formation'])->name('formations');
Route::get('/notre-blog', [App\Http\Controllers\AcceuilController::class, 'blog'])->name('blog');
Route::get('/recherche-filiere', [App\Http\Controllers\AcceuilController::class, 'search'])->name('search');

/**Espace etudiant */
Route::get('/renitialiser-mot-passe', [App\Http\Controllers\AcceuilController::class, 'password_forget'])->name('password.forget');
Route::get('/nouveau-mot-passe', [App\Http\Controllers\AcceuilController::class, 'password_reset'])->name('password.reset');

/**Espace Etablissement */
Route::get('/connexion-etablissement', [App\Http\Controllers\AcceuilController::class, 'connexion_etablissement'])->name('etablissement.connexion');
Route::get('/inscription-etablissement', [App\Http\Controllers\AcceuilController::class, 'inscription_etablissement'])->name('etablissement.inscription');

/**Detail etablissement */
Route::get('/etablissement/{slug}/filieres', [App\Http\Controllers\AcceuilController::class, 'filiere_school'])->name('filieres.school');
Route::get('/etablissement/{slug}/details', [App\Http\Controllers\AcceuilController::class, 'description_school'])->name('description.school');
Route::middleware(['auth'])->group(function () {
    Route::get('/inscription', [App\Http\Controllers\AcceuilController::class, 'inscription'])->name('inscription');
});

//**Detail Article */
Route::get('/article/{slug}/details', [App\Http\Controllers\AcceuilController::class, 'description_article'])->name('description.article');


/**Tableaud de bord Admin */
// Routes Admin
Route::prefix('admin')->group(function () {
    // Routes publiques
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // Routes protégées
    Route::middleware(['auth:admin', 'prevent.web.user'])->group(function () {
        Route::get('/tableau-de-bord', [AdminAuthController::class, 'dashboard'])
             ->name('admin.dashboard');
    });
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // Toutes les routes admin protégées
    Route::get('/statistiques-etablissements', [App\Http\Controllers\DashboardController::class, 'accueil_etablissement'])->name('statistique.etablissement');
    Route::get('/nouvel-etablissement', [App\Http\Controllers\DashboardController::class, 'nouveau_etablissement'])->name('nouvel.etablissement');
    Route::get('/liste-etablissements', [App\Http\Controllers\DashboardController::class, 'liste_etablissement'])->name('liste.etablissement');
    Route::get('/liste-des-demandes-apparitions', [App\Http\Controllers\DashboardController::class, 'liste_demande'])->name('liste.demandes');

    Route::get('/statistiques-filieres', [App\Http\Controllers\DashboardController::class, 'accueil_filiere'])->name('statistique.filiere');
    Route::get('/liste-filieres', [App\Http\Controllers\DashboardController::class, 'liste_filiere'])->name('liste.filiere');
    Route::get('/nouvelle-filiere', [App\Http\Controllers\DashboardController::class, 'nouvelle_filiere'])->name('nouvelle.filiere');

    Route::get('/liste-type-filiere', [App\Http\Controllers\DashboardController::class, 'type_filiere_liste'])->name('type.filiere.liste');
    Route::get('/nouveau-type-filiere', [App\Http\Controllers\DashboardController::class, 'type_filiere_nouveau'])->name('type.filiere.nouveau');

    Route::get('/statistiques-demandes-inscription', [App\Http\Controllers\DashboardController::class, 'accueil_inscription'])->name('statistique.demande.inscription');
    Route::get('/liste-demandes-inscription', [App\Http\Controllers\DashboardController::class, 'liste_inscription'])->name('liste.inscription');

    Route::get('/statistiques-avis-etablissements', [App\Http\Controllers\DashboardController::class, 'accueil_avis'])->name('stats.avis');
    Route::get('/liste-avis-etablissements', [App\Http\Controllers\DashboardController::class, 'liste_avis'])->name('liste.avis');

    Route::get('/statistiques-abonnements-newsletters', [App\Http\Controllers\DashboardController::class, 'accueil_newsletter'])->name('newsletters');

    Route::get('/statistiques-utilisateurs', [App\Http\Controllers\DashboardController::class, 'accueil_users'])->name('stats.users');
    Route::get('/liste-etudiants', [App\Http\Controllers\DashboardController::class, 'liste_etudiants'])->name('liste.etudiants');
    Route::get('/liste-administrateurs', [App\Http\Controllers\DashboardController::class, 'liste_admin'])->name('liste.admin');
    Route::get('/nouveau-administrateur', [App\Http\Controllers\DashboardController::class, 'nouveau_admin'])->name('nouveau.admin');

    Route::get('/nouvelle-ville', [App\Http\Controllers\DashboardController::class, 'nouvelle_ville'])->name('nouvelle.ville');
    Route::get('/liste-villes', [App\Http\Controllers\DashboardController::class, 'liste_ville'])->name('liste.ville');

    Route::get('/nouvelle-commune', [App\Http\Controllers\DashboardController::class, 'nouvelle_commune'])->name('nouvelle.commune');
    Route::get('/liste-communes', [App\Http\Controllers\DashboardController::class, 'liste_commune'])->name('liste.commune');
    Route::get('/statistiques-configuration', [App\Http\Controllers\DashboardController::class, 'accueil_configuration'])->name('statistique.configuration');

    Route::get('/nouveau-mode', [App\Http\Controllers\DashboardController::class, 'nouveau_etude'])->name('nouveau.mode');
    Route::get('/liste-modes-etude', [App\Http\Controllers\DashboardController::class, 'liste_mode_etude'])->name('liste.mode.etude');

    Route::get('/nouvel-article', [App\Http\Controllers\DashboardController::class, 'nouvel_article'])->name('nouvel.article');
    Route::get('/liste-articles', [App\Http\Controllers\DashboardController::class, 'liste_articles'])->name('liste.article');

    //**Configuration */
    Route::post('/nouveau-mode', [App\Http\Controllers\ConfigurationController::class, 'store'])->name('store.mode.etude');
    Route::post('/mode-etude/{id}', [App\Http\Controllers\ConfigurationController::class, 'destroy'])->name('destroy.mode.etude');
    Route::get('/mode-etude/{id}/edit', [App\Http\Controllers\ConfigurationController::class, 'edit'])->name('mode.etude.edit');
    Route::put('/mode-etude/{id}/edit', [App\Http\Controllers\ConfigurationController::class, 'update'])->name('mode.etude.update');

    Route::post('/nouvelle-ville', [App\Http\Controllers\ConfigurationController::class, 'store_ville'])->name('store.ville');
    Route::post('/ville/{id}', [App\Http\Controllers\ConfigurationController::class, 'destroy_ville'])->name('destroy.ville');
    Route::get('/ville/{id}/edit', [App\Http\Controllers\ConfigurationController::class, 'edit_ville'])->name('ville.edit');
    Route::put('/ville/{id}/edit', [App\Http\Controllers\ConfigurationController::class, 'update_ville'])->name('ville.update');

    Route::post('/nouvelle-commune', [App\Http\Controllers\ConfigurationController::class, 'store_commune'])->name('store.commune');
    Route::post('/commune/{id}', [App\Http\Controllers\ConfigurationController::class, 'destroy_commune'])->name('destroy.commune');
    Route::get('/commune/{id}/edit', [App\Http\Controllers\ConfigurationController::class, 'edit_commune'])->name('commune.edit');
    Route::put('/commune/{id}/edit', [App\Http\Controllers\ConfigurationController::class, 'update_commune'])->name('commune.update');

    //**Filieres */
    Route::post('/nouveau-type-filiere', [App\Http\Controllers\FiliereController::class, 'store'])->name('store.type.filiere');
    Route::post('/nouveau-type-filiere/{id}', [App\Http\Controllers\FiliereController::class, 'destroy'])->name('destroy.type.filiere');
    Route::get('/type-filiere/{id}/edit', [App\Http\Controllers\FiliereController::class, 'edit'])->name('type.filiere.edit');
    Route::put('/type-filiere/{id}/edit', [App\Http\Controllers\FiliereController::class, 'update'])->name('type.filiere.update');

    Route::post('/nouvelle-filiere', [App\Http\Controllers\FiliereController::class, 'store_filiere'])->name('store.filiere');
    Route::post('/filiere/{id}', [App\Http\Controllers\FiliereController::class, 'destroy_filiere'])->name('destroy.filiere');
    Route::get('/filiere/{id}/edit', [App\Http\Controllers\FiliereController::class, 'edit_filiere'])->name('filiere.edit');
    Route::put('/filiere/{id}/edit', [App\Http\Controllers\FiliereController::class, 'update_filiere'])->name('filiere.update');

    //**Etablissment */
    Route::post('/nouvel-etablissement', [App\Http\Controllers\EtablissementController::class, 'store'])->name('store.etablissement');
    Route::post('/etablissement/{id}', [App\Http\Controllers\EtablissementController::class, 'destroy'])->name('destroy.etablissement');
    Route::get('/etablissement/{id}/edit', [App\Http\Controllers\EtablissementController::class, 'edit'])->name('etablissement.edit');
    Route::put('/etablissement/{id}/edit', [App\Http\Controllers\EtablissementController::class, 'update'])->name('etablissement.update');

    Route::post('/demande-apparition/{id}', [App\Http\Controllers\EtablissementController::class, 'destroy_demandes'])->name('destroy.demande');

    //**Articles */
    Route::post('/nouvel-article', [App\Http\Controllers\BlogController::class, 'store'])->name('store.article');
    Route::post('/article/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('destroy.article');
    Route::get('/article/{id}/edit', [App\Http\Controllers\BlogController::class, 'edit'])->name('article.edit');
    Route::put('/article/{id}/edit', [App\Http\Controllers\BlogController::class, 'update'])->name('article.update');
    
});

//**Avis */
Route::post('/nouvel-avis', [App\Http\Controllers\AvisController::class, 'store'])->name('store.avis');
Route::put('/avis/{id}/{etat}', [App\Http\Controllers\AvisController::class, 'etat'])->name('etat.avis');
Route::post('/avis/{id}', [App\Http\Controllers\AvisController::class, 'destroy'])->name('destroy.avis');

//**Inscription */
Route::post('/demande-inscription', [App\Http\Controllers\InscriptionController::class, 'store'])->name('store.inscription');

//**Newsletters */
Route::post('/nouvelle-demande-newsletter', [App\Http\Controllers\NewsletterController::class, 'store'])->name('store.newsletter');

Route::get('/test-email', function() {
    try {
        Mail::raw('Ceci est un test', function ($message) {
            $message->to('alban.tiemoko.diallo@gmail.com')
                    ->subject('Test SMTP');
        });
        return "Email envoyé ! Vérifiez votre boîte de réception.";
    } catch (\Exception $e) {
        return "Erreur : " . $e->getMessage();
    }
});

//**Demandes apparitions */
Route::post('/nouvel-demande', [App\Http\Controllers\EtablissementController::class, 'store_demande'])->name('store.demande');
