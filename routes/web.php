<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

Route::get('/dashboard', function () {
    $membersCount = User::count();

    return view('dashboard', compact('membersCount'));
})->name('dashboard');

Route::get('/members', [MemberController::class, 'index'])
    ->name('members.index');

    // ==========================
    // Projets archivés (قبل resource)
    // ==========================

    Route::get('/projects/archived', [ProjectController::class, 'archived'])
        ->name('projects.archived');

    Route::patch('/projects/{id}/restore', [ProjectController::class, 'restore'])
        ->name('projects.restore');

    // ==========================
    // Clôturer un projet
    // ==========================

    Route::patch('/projects/{project}/close', [ProjectController::class, 'close'])
        ->name('projects.close');

    // ==========================
    // Gestion des membres
    // ==========================

    Route::post('/projects/{project}/members', [ProjectController::class, 'addMember'])
        ->name('projects.members.add');

    Route::delete('/projects/{project}/members/{user}', [ProjectController::class, 'removeMember'])
        ->name('projects.members.remove');

    Route::patch('/projects/{project}/progress', [ProjectController::class, 'updateProgress'])
        ->name('projects.progress.update');

    // ==========================
    // CRUD Projet (خاص يكون فالآخر)
    // ==========================

    Route::resource('projects', ProjectController::class);

    // ==========================
    // Profil
    // ==========================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';