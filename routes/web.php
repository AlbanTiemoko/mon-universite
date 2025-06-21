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

