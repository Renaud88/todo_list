<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TacheController;


// Affiche le formulaire pour créer un utilisateur
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Liste tous les utilisateurs 
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');

// Affiche les détails d'un utilisateur 
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('auth');

// Affiche le formulaire pour modifier un utilisateur 
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');

// Met à jour les informations d'un utilisateur 
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');

// Enregistre un nouvel utilisateur dans la base de données
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Supprime un utilisateur 
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');


// Affiche le formulaire de connexion
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

// Déconnecte l'utilisateur 
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Gère la tentative de connexion via le formulaire
Route::post('/login', [AuthController::class, 'doLogin']);


// Affiche la liste des tâches 
Route::get('/', [TacheController::class, 'index'])->name('blog.index');

// Affiche également la liste des tâches 
Route::get('/blog', [TacheController::class, 'index'])->name('blog.index');

// Affiche le formulaire pour créer une nouvelle tâche 
Route::get('/tache/create', [TacheController::class, 'create'])->name('tache.create')->middleware('auth');

// Enregistre une nouvelle tâche dans la base de données
Route::post('/tache', [TacheController::class, 'store'])->name('tache.store')->middleware('auth');

// Affiche les détails d'une tâche 
Route::get('/tache/{id}', [TacheController::class, 'show'])->name('taches.show')->middleware('auth');

// Affiche le formulaire pour modifier une tâche 
Route::get('/tache/{id}/edit', [TacheController::class, 'edit'])->name('blog.edit')->middleware('auth');

// Met à jour les informations d'une tâche 
Route::put('/tache/{id}', [TacheController::class, 'update'])->name('blog.update')->middleware('auth');

// Supprime une tâche  de la base de données 
Route::delete('/tache/{id}', [TacheController::class, 'destroy'])->name('blog.destroy')->middleware('auth');

// Met à jour uniquement le statut d'une tâche 
Route::get('/taches/{id}/update-status', [TacheController::class, 'updateStatus'])->name('blog.updateStatus')->middleware('auth');
