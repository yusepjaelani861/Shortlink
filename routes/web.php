<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/{slug}', [PublicController::class, 'post'])->name('view.post');
Route::get('/{slug}', [PublicController::class, 'view'])->name('view');
Route::post('/{slug}', [PublicController::class, 'post2'])->name('view.post2');
Route::post('/shortlink/create', [PublicController::class, 'createShortlink'])->name('create.shortlink');
Route::post('/shortlink/password', [PublicController::class, 'passwordShortlink'])->name('password.shortlink');
Route::post('/shortlink/redirect', [PublicController::class, 'redirectShortlink'])->name('redirect.shortlink');


// Route::get('/{slug}', function () {
//     return view('view', [
//         'link' => json_encode([
//             'password' => '',
//         ])
//     ]);
// });

// Route::get('/{slug}', function () {
//     return view('page', [
//         'link' => json_encode([
//             'password' => '123456',
//         ])
//     ]);
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
