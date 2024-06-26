<?php

use App\Actions\Jetstream\UpdateTeamProfileInformation;
use App\Http\Controllers\Dashboard\Tournament\Details;
use App\Http\Controllers\Dashboard\Tournament\Overview;
use App\Http\Controllers\TeamDashController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', static function () {
    return Inertia::render('Main/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/news', static function () {
    return Inertia::render('Main/News', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/teams', static function () {
    return Inertia::render('Main/Teams', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/tournaments', static function () {
    return Inertia::render('Main/Tournaments', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});


Route::get('/partners', static function () {
    return Inertia::render('Main/Partners', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/about', static function () {
    return Inertia::render('Main/About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/shop', static function () {
    return Inertia::render('Main/Shop', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


//Dashboard Teams Page
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/team/overview', [TeamDashController::class, 'showOverview'])->name("dash.team.overview.show");
    Route::put('/team/overview', [UpdateTeamProfileInformation::class, 'update'])->name("dash.teams.overview.update");


    Route::get('/team/settings',[TeamDashController::class, 'showSettings']);
    Route::delete('/team/settings', [TeamDashController::class, 'deleteTeam'])->name("dash.team.delete");
    Route::get('/team/stats', [TeamDashController::class, 'showStats']);

    Route::get('/team/members', [TeamDashController::class, 'showMembers']);
});



// Dashboard Tournaments Section
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group( function() {
    Route::get('/tournaments/overview', [Overview::class, 'show']
    )->name('tournaments.overview');

    Route::get('/tournaments/details/{tournament}', [Details::Class, 'show']
    )->name('tournaments.details');
});





