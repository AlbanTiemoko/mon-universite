<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/', [App\Http\Controllers\AcceuilController::class, 'accueil'])->name('accueil');
Route::get('/filieres-industrielles', [App\Http\Controllers\AcceuilController::class, 'filiere'])->name('filieres');
Route::get('/filieres-tertiaires', [App\Http\Controllers\AcceuilController::class, 'filiere_tertiaires'])->name('filieres.tertiaire');
Route::get('/formations-qualifiantes', [App\Http\Controllers\AcceuilController::class, 'formation'])->name('formations');
Route::get('/notre-blog', [App\Http\Controllers\AcceuilController::class, 'blog'])->name('blog');

/**Espace etudiant */
Route::get('/connexion-etudiant', [App\Http\Controllers\AcceuilController::class, 'connexion_student'])->name('student.connexion');
Route::get('/renitialiser-mot-passe', [App\Http\Controllers\AcceuilController::class, 'password_forget'])->name('password.forget');
Route::get('/creation-compte-etudiant', [App\Http\Controllers\AcceuilController::class, 'inscription_etudiant'])->name('inscription.etudiant');

/**Espace Etablissement */
Route::get('/connexion-etablissement', [App\Http\Controllers\AcceuilController::class, 'connexion_etablissement'])->name('etablissement.connexion');
Route::get('/inscription-etablissement', [App\Http\Controllers\AcceuilController::class, 'inscription_etablissement'])->name('etablissement.inscription');

/**Detail etablissement */
Route::get('/toutes-filieres-etablissement', [App\Http\Controllers\AcceuilController::class, 'filiere_school'])->name('filieres.school');
Route::get('/description-etablissement', [App\Http\Controllers\AcceuilController::class, 'description_school'])->name('description.school');
Route::get('/inscription', [App\Http\Controllers\AcceuilController::class, 'inscription'])->name('inscription');

/**Tableaud de bord Admin */
Route::get('/tableau-de-bord', [App\Http\Controllers\DashboardController::class, 'accueil'])->name('dashboard');
Route::get('/connexion', [App\Http\Controllers\DashboardController::class, 'connexion'])->name('connexion');

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