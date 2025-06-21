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
