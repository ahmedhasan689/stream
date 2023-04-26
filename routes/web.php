<?php

use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\ActorController;
use App\Http\Controllers\Web\BlogsController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\EpisodeController;
use App\Http\Controllers\Web\EpisodeLikeController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MovieController;
use App\Http\Controllers\Web\MovieLikeController;
use App\Http\Controllers\Web\MoviePlaylistController;
use App\Http\Controllers\Web\PagesController;
use App\Http\Controllers\Web\EpisodePlaylistController;
use App\Http\Controllers\Web\SearchController;
use App\Http\Controllers\Web\SerialLikeController;
use App\Http\Controllers\Web\SerialsController;
use App\Http\Controllers\Web\SettingsController;
use App\Http\Controllers\Web\TagsController;
use App\Http\Controllers\Web\WatchListController;
use Illuminate\Support\Facades\Route;

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
//    return view('web.home');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'email_verified'])->group(function() {

    // Start Home Route
    Route::get('/', [HomeController::class, 'index'])->name('home')->withoutMiddleware(['auth', 'email_verified']);
    // End Home Route

    // Start Account Route
    Route::controller(AccountController::class)
        ->prefix('account')
        ->as('account.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::put('/{id}', 'update')->name('update');
        });
    // End Account Route

    // Start Pages Route
    Route::controller(PagesController::class)
        ->prefix('stream-it')
        ->as('page.')
        ->withoutMiddleware(['auth', 'email_verified'])
        ->group(function() {
            Route::get('/about-us', 'aboutUs')->name('about-us');
            Route::get('/contact-us', 'contactUs')->name('contact-us');
            Route::get('/faq', 'faq')->name('faq');
            Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
            Route::get('/pricing', 'pricing')->name('pricing');
            Route::get('/tag', 'tag')->name('tag');
        });
    // End Pages Route

    // Start Tag Route
    Route::controller(TagsController::class)
        ->prefix('tags')
        ->as('tag.')
        ->group(function() {
            Route::get('/{slug}', 'show')->name('show');
        });
    // End Tag Route

    // Start Category Route
    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->as('category.')
        ->group(function() {
            Route::get('/', 'index')->name('index')->withoutMiddleware(['auth', 'email_verified']);
            Route::get('/{slug}', 'show')->name('show');
        });
    // End Category Route

    // Start Blog Route
    Route::controller(BlogsController::class)
        ->prefix('blogs')
        ->as('blog.')
        ->group(function() {
            Route::get('/', 'index')->name('index')->withoutMiddleware(['auth', 'email_verified']);
            Route::get('/{slug}', 'show')->name('show');
        });
    // End Blog Route

    // Start Movie Route
    Route::controller(MovieController::class)
        ->prefix('movies')
        ->as('movie.')
        ->group(function() {
            Route::get('/', 'index')->name('index')->withoutMiddleware(['auth', 'email_verified']);
            Route::get('/{slug}', 'show')->name('show');
            Route::post('/save_played_time/{id}', 'playedTime')->name('playedTime');
            Route::get('/view_all/{type}', 'viewAll')->name('viewAll');
        });
    // End Movie Route

    // Start Serials Route
    Route::controller(SerialsController::class)
        ->prefix('serials')
        ->as('serial.')
        ->group(function() {
            Route::get('/', 'index')->name('index')->withoutMiddleware(['auth', 'email_verified']);
            Route::get('/{slug}', 'show')->name('show');
            Route::get('view_all/{type}', 'viewAll')->name('viewAll');
        });
    // End Serials Route

    // Start Episode Route
    Route::controller(EpisodeController::class)
        ->prefix('episodes')
        ->as('episode.')
        ->group(function() {
            Route::get('/{slug}', 'show')->name('show');
            Route::post('/save_played_time/{id}', 'playedTime')->name('playedTime');
            Route::get('view_all/{type}', 'viewAll')->name('viewAll');
        });
    // End Episode Route

    // Start Episode Playlist Route
    Route::controller(EpisodePlaylistController::class)
        ->prefix('episode_playlist')
        ->as('episode_playlist.')
        ->group(function() {
            Route::get('/add', 'store')->name('store');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Episode Playlist Route

    // Start Movie Playlist Route
    Route::controller(MoviePlaylistController::class)
        ->prefix('movie_playlist')
        ->as('movie_playlist.')
        ->group(function() {
            Route::get('/add', 'store')->name('store');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Movie Playlist Route

    // Start Movie Like Route
    Route::controller(MovieLikeController::class)
        ->prefix('movie_like')
        ->as('movie_like.')
        ->group(function() {
            Route::get('/delete', 'destroy')->name('delete');
            Route::get('/add', 'store')->name('store');
        });
    // End Movie Like Route

    // Start Serial Like Route
    Route::controller(SerialLikeController::class)
        ->prefix('serial_like')
        ->as('serial_like.')
        ->group(function() {
            Route::get('/delete', 'destroy')->name('delete');
            Route::get('/add', 'store')->name('store');
        });
    // End Serial Like Route

    // Start Episode Like Route
    Route::controller(EpisodeLikeController::class)
        ->prefix('episode_like')
        ->as('episode_like.')
        ->group(function() {
            Route::get('/add', 'store')->name('store');
            Route::get('/delete', 'destroy')->name('delete');
        });
    // End Episode Like Route

    // Start Route Setting
    Route::controller(SettingsController::class)
        ->prefix('settings')
        ->as('setting.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/update', 'update')->name('update');
        });
    // End Route Setting

    // Start Watch List Route
    Route::controller(WatchListController::class)
        ->prefix('watch_list')
        ->as('watch_list.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
        });
    // End Watch List Route

    // Start Tag Controller
    Route::controller(TagsController::class)
        ->prefix('tags')
        ->as('tag.')
        ->group(function() {
            Route::get('/{slug}', 'show')->name('show');
        });
    // Start End Controller

    // Start Actor Controller
    Route::controller(ActorController::class)
        ->prefix('actors')
        ->as('actor.')
        ->group(function() {
            Route::get('/{id}', 'show')->name('show');
        });
    // Start Actor Controller

    // Start Search Route
    Route::post('/search', [SearchController::class, 'search'])->name('search');
    // End Search Route

});
