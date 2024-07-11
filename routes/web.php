<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JogoController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('sala.index');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return redirect()->route('sala.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resources(['home' => HomeController::class]);
    Route::resources(['jogo' => JogoController::class]);
    Route::resources(['sala' => SalaController::class]);
    Route::get('/sala/{salaid}/entrar',[SalaController::class,'entrar'])->name('sala.entrar');
    Route::post('/sala/{salaid}/entrar',[SalaController::class, 'conferirSenha'])->name('sala.conferirSenha');
    Route::get('/sala/{salaid}/jogando',[SalaController::class, 'jogando'])->name('sala.jogando');
    Route::post('/sala/{salaid}/jogando',[SalaController::class, 'lance'])->name('sala.lance');
    // Route::post('/sala/{idsala}/jogando',[JogoController::class, 'lance'])->name('jogo.lance');

});

require __DIR__.'/auth.php';



Route::get('/testar-dados', [SalaController::class, 'testarDados']);
