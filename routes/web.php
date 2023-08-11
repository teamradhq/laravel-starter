<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\JsonResponse;
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

$item = 'Hello World!';

Route::get('/', static fn () => view('welcome'));

Route::get('/dashboard', static fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('/profile')->group(static function (): void {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

if (config('app.env') !== 'local') {
    return;
}

Route::get('/style-guide', static fn () => view('style-guide.index'))->name('style-guide');

// Scribe API Documentation
$prefix = config('scribe.laravel.docs_url', '/docs');
$middleware = config('scribe.laravel.middleware', []);

Route::middleware($middleware)->group(function () use ($prefix): void {
    Route::view($prefix, 'scribe.index')->name('scribe');

    Route::get(
        "{$prefix}.postman",
        static fn () => new JsonResponse(Storage::disk('local')->get('scribe/collection.json'), json: true),
    )->name('scribe.postman');

    Route::get(
        "{$prefix}.openapi",
        static fn () => response()->file(Storage::disk('local')->path('scribe/openapi.yaml'))
    )->name('scribe.openapi');
});
