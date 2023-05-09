<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ContactDetailsController;
use App\Http\Controllers\GeneralInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\WebContent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', fn() => to_route('assignment.index'))->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Assignments
     */
    Route::group([
        'prefix' => 'assignments',
        'as' => 'assignment.',
        'controller' => AssignmentController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::prefix('{assignment}')->group(function () {
            Route::get('/', 'show')->name('show');
        });
    });

    /**
     * General Information
     */
    Route::group([
        'prefix' => 'generalInformation',
        'as' => 'generalInformation.',
        'controller' => GeneralInformationController::class
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->can('update', WebContent::class)->name('edit');
    });

    Route::group([
        'prefix' => 'contactDetails',
        'as' => 'contactDetails.',
        'controller' => ContactDetailsController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
    });

    Route::group([
        'prefix' => 'post',
        'as' => 'post.',
        'controller' => PostController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit', 'edit')->name('edit');
    });
});

require __DIR__ . '/auth.php';
