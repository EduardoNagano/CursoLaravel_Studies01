<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// assinatura base de uma rota
// Route::verb('uri', callback); - callback é a ação que vai ser executada quando a rota for acionada

// rota com função anônima
Route::get('/rota', function() {
    return '<h1>Olá Laravel</h1>';
});

Route::get('/injection', function(Request $request) {
    var_dump($request);
});

Route::match(['get', 'post'], '/match', function(Request $request) {
    return '<h1>Aceita GET e POST</h1>';
});

Route::any('/any', function(Request $request) {
    return '<h1>Aceita qualquer HTTP verb</h1>';
});

Route::get('/index', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);

Route::redirect('/saltar', '/index');
Route::permanentRedirect('/saltar2', '/index');

Route::view('/view', 'home');

Route::view('/view2', 'home', ['myName' => 'Eduardo Nagano']);