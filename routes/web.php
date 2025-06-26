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

/**Espace etudiant */
Route::get('/renitialiser-mot-passe', [App\Http\Controllers\AcceuilController::class, 'password_forget'])->name('password.forget');
Route::get('/nouveau-mot-passe', [App\Http\Controllers\AcceuilController::class, 'password_reset'])->name('password.reset');

/**Espace Etablissement */
Route::get('/connexion-etablissement', [App\Http\Controllers\AcceuilController::class, 'connexion_etablissement'])->name('etablissement.connexion');
Route::get('/inscription-etablissement', [App\Http\Controllers\AcceuilController::class, 'inscription_etablissement'])->name('etablissement.inscription');

/**Detail etablissement */
Route::get('/toutes-filieres-etablissement', [App\Http\Controllers\AcceuilController::class, 'filiere_school'])->name('filieres.school');
Route::get('/description-etablissement', [App\Http\Controllers\AcceuilController::class, 'description_school'])->name('description.school');
Route::middleware(['auth'])->group(function () {
    Route::get('/inscription', [App\Http\Controllers\AcceuilController::class, 'inscription'])->name('inscription');
});

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

    Route::get('/nouveau-mode', [App\Http\Controllers\DashboardController::class, 'nouveau_etude'])->name('nouveau.mode');
    Route::get('/liste-modes-etude', [App\Http\Controllers\DashboardController::class, 'liste_mode_etude'])->name('liste.mode.etude');

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

    //**Newsletters */
    Route::post('/nouvelle-demande-newsletter', [App\Http\Controllers\NewsletterController::class, 'store'])->name('store.newsletter');

    //**Filieres */
    Route::post('/nouveau-type-filiere', [App\Http\Controllers\FiliereController::class, 'store'])->name('store.type.filiere');
    Route::post('/nouveau-type-filiere/{id}', [App\Http\Controllers\FiliereController::class, 'destroy'])->name('destroy.type.filiere');
    Route::get('/type-filiere/{id}/edit', [App\Http\Controllers\FiliereController::class, 'edit'])->name('type.filiere.edit');
    Route::put('/type-filiere/{id}/edit', [App\Http\Controllers\FiliereController::class, 'update'])->name('type.filiere.update');

    //**Etablissment */
    Route::post('/nouvel-etablissement', [App\Http\Controllers\EtablissementController::class, 'store'])->name('store.etablissement');

});

